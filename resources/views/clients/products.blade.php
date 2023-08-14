@extends('clients.layouts.master')

@section('content')
    <main class="main-content dt-sl mt-4 mb-3">
        <div class="container main-container">

            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 sticky-sidebar">
                    <div class="dt-sn mb-3">
                        <form action="{{ route('get-filter') }}" method="GET" id="products-filter-form">
                            <div class="col-12">
                                <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide">
                                    <h2>فیلتر محصولات</h2>
                                </div>
                            </div>

                            <div class="col-12 filter-product mb-3">
                                <div class="accordion" id="accordionExample">


                                    <div class="card">
                                        <div class="card-header" id="heading-0">
                                            <h2 class="mb-0">
                                                <button class="btn btn-block text-right collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapse-0"
                                                        aria-expanded="false" aria-controls="collapse-0">
                                                    دسته بندی
                                                    <i class="bi bi-chevron-compact-down"></i>
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapse-0" class="collapse " aria-labelledby="heading-0">
                                            <div class="card-body">
                                                @foreach($category as $item)
                                                    <div class="custom-control custom-checkbox">

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="productCategory[]" value="{{ $item->id }}"
                                                                   id="flexCheckDefault">
                                                            <label class="form-check-label"
                                                                   for="flexCheckDefault">{{ $item->name }}</label>
                                                        </div>

                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="heading-2">
                                            <h2 class="mb-0">
                                                <button class="btn btn-block text-right collapsed" type="button"
                                                        data-toggle="collapse" data-target="#collapse-2"
                                                        aria-expanded="false" aria-controls="collapse-2">
                                                    گروه محصولات
                                                    <i class="bi bi-chevron-compact-down"></i>
                                                </button>
                                            </h2>
                                        </div>

                                        <div id="collapse-2" class="collapse " aria-labelledby="heading-2">
                                            <div class="card-body">
                                                @foreach($productGroups as $item)
                                                    <div class="custom-control custom-checkbox">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="productGroup[]" value="{{ $item->id }}"
                                                                   id="flexCheckDefault">
                                                            <label class="form-check-label"
                                                                   for="flexCheckDefault">{{ $item->name }}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-info btn-block" type="submit">
                                    فیلتر
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="category-products-div"
                     data-action=""
                     class="col-lg-9 col-md-12 col-sm-12">
                    <div class="dt-sl dt-sn px-0 search-amazing-tab">
                        <div class="row mb-3 mx-0 px-res-0">
                            @foreach($products as $product)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0 category-product-div">
                                    <div class="product-card mb-2 mx-res-0">
                                        <div class="product-head">

                                            <div class="rating-stars">
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                                <i class="mdi mdi-star active"></i>
                                            </div>
                                        </div>
                                        <a class="product-thumb" href="{{ route('singleProduct', $product) }}">
                                            <img src="{{$product->base_image ?  asset('storage/'. $product->base_image) : asset('storage/'. collect($product->images)->first()) }}"
                                                 alt="{{ $product->fa_name }}">
                                        </a>
                                        <div class="product-card-body">

                                            <h5 class="product-title">
                                                <a href="{{ route('singleProduct', $product) }}">{{ $product->fa_name . " ( " . $product->en_name . " ) "}}</a>
                                            </h5>

                                            <a class="product-meta"
                                               href="{{ route('singleProduct', $product) }}">{{ $product->productGroup->name }}</a>

                                            <div class="product-prices-div">

                                                @if( in_array($product->productItem->first()->discount_percent, [null, 0, false]))
                                                    <span class="product-price pt-5">
                                                     {{ number_format($product->productItem->first()->price) }} تومان
                                                </span>
                                                @else
                                                    <div class="px-1 radius-large d-flex ai-center jc-center bg-p-700" style="background: red;border-radius: 32px;width: 43px;font-weight: bold;">
                                                        <span class="text-body2-strong" style="color: white">{{$product->productItem->first()->discount_percent}}%</span>
                                                    </div>
                                                    <del class="pt-3" id="price-discount" style="color: red">{{number_format($product->productItem->first()->price)}} تومان </del>
                                                    <span class="product-price">
                                                     {{ number_format($product->productItem->first()->price - (($product->productItem->first()->discount_percent * $product->productItem->first()->price) / 100)) }} تومان
                                                    </span>
                                                @endif

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {!! $products->links() !!}

                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection
