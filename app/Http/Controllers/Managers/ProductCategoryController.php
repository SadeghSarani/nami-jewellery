<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Repository\ProductCategoryRepository;
use Illuminate\Http\Request;
use function Symfony\Component\String\b;

class ProductCategoryController extends Controller
{

    private ProductCategoryRepository $productCategoryRepository;

    public function __construct()
    {
        $this->productCategoryRepository = app(ProductCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->productCategoryRepository->get();

        return view('manager.products.product-category', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->productCategoryRepository->create($request->all());

        return back()->with('success', 'عملیات با موفقیت انجام شد .');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        $this->productCategoryRepository->remove($productCategory);

        return back()->with('success', 'عملیات با موفقیت انجام شد .');
    }
}
