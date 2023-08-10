<?php

namespace App\Repository;

use App\Models\ProductItem;

class ProductItemRepository
{
    private ProductItem $productItem;

    public function __construct()
    {
        $this->productItem = app()->make(ProductItem::class);
    }


    public function create($data, $id)
    {
        $data['product_id'] = $id;
        $this->productItem->query()->create($data);
    }

    public function getPrice($productId, $color)
    {
        return $this->productItem->query()
            ->where('product_id', $productId)
            ->where('color', $color)
            ->first();
    }

    public function delete($productId)
    {
        $this->productItem->query()->where('product_id', $productId)->delete();
    }

    public function deleteItem($id)
    {
        $this->productItem->query()->where('id', $id)->delete();
    }
    public function getCount($productItemId)
    {
       return $this->productItem->query()->where('id', $productItemId)->first();
    }
}
