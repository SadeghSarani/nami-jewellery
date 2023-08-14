<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repository\ProductCategoryRepository;
use App\Repository\ProductGroupRepository;
use App\Repository\ProductItemRepository;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private ProductRepository $productRepository;
    private ProductItemRepository $productItemRepository;
    private  ProductCategoryRepository $productCategoryRepository;
    private ProductGroupRepository $productGroupRepository;
    public function __construct()
    {
        $this->productRepository = app()->make(ProductRepository::class);
        $this->productItemRepository = app()->make(ProductItemRepository::class);
        $this->productCategoryRepository = app()->make(ProductCategoryRepository::class);
        $this->productGroupRepository = app()->make(ProductGroupRepository::class);
    }

    public function getPrice(Request $request)
    {
        $color = $request->input('data')['color'];
        $productId = $request->input('data')['product_id'];

        return $this->productItemRepository->getPrice($productId, $color);
    }

    public function allProducts(Request $request)
    {
        $category      = $this->productCategoryRepository->get();
        $productGroups = $this->productGroupRepository->get();
        $products      = $this->productRepository->all($request);

        return view('clients.products', ['products' => $products, 'category' => $category, 'productGroups' => $productGroups]);
    }

    public function getProductWithCategory($category_id)
    {
        $category      = $this->productCategoryRepository->get();
        $productGroups = $this->productGroupRepository->get();
        $products      = $this->productRepository->getProductWithCategory($category_id);
        return view('clients.products', ['products' => $products, 'category' => $category, 'productGroups' => $productGroups]);
    }

    public function getProductWithProductGroup($category_id, $product_group_id)
    {
        $category      = $this->productCategoryRepository->get();
        $productGroups = $this->productGroupRepository->get();
        $products      = $this->productRepository->getProductWithProductGroup($category_id, $product_group_id);

        return view('clients.products', ['products' => $products, 'category' => $category, 'productGroups' => $productGroups]);
    }

    public function getFilter(Request $request)
    {
        $category      = $this->productCategoryRepository->get();
        $productGroups = $this->productGroupRepository->get();
        $products =  $this->productRepository->getFitter($request);

        return view('clients.products', ['products' => $products, 'category' => $category, 'productGroups' => $productGroups]);
    }

    public function getSearch(Request $request)
    {
        $category      = $this->productCategoryRepository->get();
        $productGroups = $this->productGroupRepository->get();
        $products =  $this->productRepository->getProductWithName($request->product_name);
        return view('clients.products', ['products' => $products, 'category' => $category, 'productGroups' => $productGroups]);
    }
}
