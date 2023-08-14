<?php

namespace App\Repository;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ProductCategoryRepository
{

    private ProductCategory $productCategory;
    public function __construct()
    {
        $this->productCategory = app(ProductCategory::class);
    }


    /**
     * get data from the product category
     * @return LengthAwarePaginator
     */
    public function get()
    {
        return $this->productCategory->query()->paginate(15);
    }

    public function all()
    {
        return $this->productCategory->query()->get();
    }

    /**
     * create a new product category
     * @param $request
     * @return mixed
     */
    public function create($request)
    {
       return $this->productCategory->create($request);
    }

    /**
     * @param $productCategory
     * @return mixed
     */
    public function remove($productCategory)
    {
        return $this->productCategory->where('id', $productCategory->id)->delete();
    }

    /**
     * get product category
     * @return Product Product
     * @return Builder[]|Collection
     */
    public function getCategory()
    {
        return $this->productCategory->query()->get();
    }


}
