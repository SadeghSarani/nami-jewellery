<?php

namespace App\Repository;

use App\Models\ProductGroup;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class ProductGroupRepository
{

    private ProductGroup $productGroup;
    public function __construct()
    {
        $this->productGroup = app(ProductGroup::class);
    }

    /** get product group list
     * @return LengthAwarePaginator
     */
    public function get()
    {
        return $this->productGroup->query()->get();
    }

    /**
     * create a new productGroup object
     * @param $request
     * @return mixed
     */
    public function create($request)
    {
       return $this->productGroup->query()->create($request);
    }

    /**
     *  delete a productGroup object
     * @param $productGroup
     * @return mixed
     */
    public function delete($productGroup)
    {
       return $this->productGroup->query()->where('id', $productGroup->id)->delete();
    }


    /**
     * get product group information
     * @return Builder[]|Collection
     */
    public function getProductGroup()
    {
        return $this->productGroup->query()->get();
    }

}
