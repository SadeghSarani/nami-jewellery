<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductGroup;
use App\Repository\ProductGroupRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ProductGroupController extends Controller
{
    private ProductGroupRepository $productGroupRepository;
    public function __construct()
    {
        $this->productGroupRepository = app(ProductGroupRepository::class);
    }

    /**
     *  display the product group information
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index()
    {
        $category = ProductCategory::all();
        $productGroup = $this->productGroupRepository->get();

        return view('manager.products.product-groups', ['category' => $category, 'productGroup' => $productGroup]);
    }

    /**
     *  create a new product group
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request)
    {

        if ($request->filled('file') && $request->file == null){
            return back()->with('error', 'لطفا یک عکس انتخا نمایید');
        }

        $fileName = Str::random() . $request->file->getClientOriginalName();
        $filePath = "product/images/$fileName";
        Storage::disk('public')->put($filePath, file_get_contents($request->file));
        $request->merge(['base_image' => $filePath]);
        $this->productGroupRepository->create($request->all());

        return back()->with('success', 'عملیات با موفقیت انجام شد .');
    }


    /**
     * destroy product group repository
     * @param ProductGroup $productGroup
     * @return RedirectResponse
     */
    public function destroy(ProductGroup $productGroup)
    {
        $this->productGroupRepository->delete($productGroup);

        return back()->with('success', 'عملیات با موفقیت انجام شد .');
    }
}
