<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repository\BlogRepository;
use App\Repository\ProductCategoryRepository;
use App\Repository\ProductRepository;
use App\Repository\SliderRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    private SliderRepository $sliderRepository;
    private ProductRepository $productRepository;
    private BlogRepository $blogRepository;
    /**
     * @var ProductCategoryRepository|(ProductCategoryRepository&\Illuminate\Contracts\Foundation\Application)|\Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|mixed
     */
    private ProductCategoryRepository $productCategoryRepository;

    public function __construct()
    {
        $this->sliderRepository = app(SliderRepository::class);
        $this->productRepository = app(ProductRepository::class);
        $this->blogRepository = app(BlogRepository::class);
        $this->productCategoryRepository = app(ProductCategoryRepository::class);
    }

    public function index()
    {
        $slider = $this->sliderRepository->get();
        $special_offers = $this->productRepository->getSpecialOff();
        $most_sold_products = $this->productRepository->getMostSoldProducts();
        $blogs = $this->blogRepository->all();
        $categories = $this->productCategoryRepository->all();

        return view('home',
            [
                'slider' => $slider,
                'special_offers' => $special_offers,
                'most_sold_products' => $most_sold_products,
                'blogs' => $blogs,
                'categories' => $categories,
            ]);
    }

}
