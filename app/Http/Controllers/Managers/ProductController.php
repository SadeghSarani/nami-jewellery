<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductItem;
use App\Repository\CustomFieldsRepository;
use App\Repository\ProductCategoryRepository;
use App\Repository\ProductGroupRepository;
use App\Repository\ProductItemRepository;
use App\Repository\ProductRepository;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ProductController extends Controller
{

    private ProductRepository $productRepository;
    private ProductCategoryRepository $productCategoryRepository;
    private ProductItemRepository $productItemRepository;
    private ProductGroupRepository $productGroupRepository;
    private CustomFieldsRepository $customFieldsRepository;

    public function __construct()
    {
        $this->productRepository         = app(ProductRepository::class);
        $this->productItemRepository     = app(ProductItemRepository::class);
        $this->productCategoryRepository = app(ProductCategoryRepository::class);
        $this->productGroupRepository    = app(ProductGroupRepository::class);
        $this->customFieldsRepository    = app(CustomFieldsRepository::class);
    }

    public function index()
    {
        $products = $this->productRepository->getProductManager();
        return view('manager.products.products', ['products' => $products]);
    }

    public function productCreateTemplateIndex()
    {
        $category = $this->productCategoryRepository->getCategory();
        $product_group = $this->productGroupRepository->getProductGroup();

        return view('manager.products.product-create', ['category' => $category, 'product_group' => $product_group]);
    }

    /**
     * create a new product
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request)
    {
        $result = $this->productRepository->create($request);

        for ($i = 0; $i < 100; $i++) {

            if ($request->input('product' . $i) == null) {
                break;
            }

            $this->productItemRepository->create($request->input('product' . $i), $result->id);
        }

        for ($i = 0; $i < 100; $i++) {

            if ($request->input('technical_specifications' . $i) == null) {
                break;
            }

            $this->customFieldsRepository->create($request->input('technical_specifications' . $i), $result->id);
        }

        return redirect()->route('products.list')->with('success', 'عملیات با موفقیا انجام شد .');
    }

    public function update(Request $request, Product $product)
    {
        $result = $this->productRepository->update($request, $product);
        $this->productItemRepository->delete($product->id);
        $this->customFieldsRepository->delete($product->id);

        for ($i = 1; $i < 100; $i++) {

            if ($request->input('product' . $i) == null) {
                break;
            }
            $this->productItemRepository->create($request->input('product' . $i), $product->id);
        }

        for ($i = 1; $i < 100; $i++) {

            if ($request->input('technical_specifications' . $i) == null) {
                break;
            }

            $this->customFieldsRepository->create($request->input('technical_specifications' . $i), $product->id);
        }

        return redirect()->route('products.list')->with('success', 'عملیات با موفقیت انجام شد .');

    }
    public function getProduct($product)
    {
        return view('clients.single-view-product')->with('product', $this->productRepository->get($product));
    }


    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function updateTemplate(Product $product)
    {
        $product = $this->productRepository->get($product->id);
        $category = $this->productCategoryRepository->getCategory();
        $product_group = $this->productGroupRepository->getProductGroup();

        return view('manager.products.product-edit',
            ['product' => $product, 'category' => $category, 'product_group' => $product_group]);
    }

    public function deleteImage($id, $key)
    {
        $this->productRepository->deleteImage($id, $key);

        return back();
    }

    public function delete(Product $productId)
    {
        $this->productRepository->delete($productId);

        return back()->with('success', 'عملیات با موفقیت انجام شد .');
    }

    public function deleteProductItem(Request $request)
    {
        $productItem = Json::decode($request->productItem);
        $this->productItemRepository->deleteItem($productItem['id']);

        return response()->json([
            'status' => 200,
        ]);

    }

    public function deleteCustomFailed(Request $request) {
        $customFailed = Json::decode($request->CustomFailed);
        $this->customFieldsRepository->remove($customFailed['id']);

        return response()->json([
            'status' => 200,
        ]);

    }
}
