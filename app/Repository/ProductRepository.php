<?php

namespace App\Repository;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductRepository
{
    private Product $product;
    private ProductItemRepository $productItemRepository;

    private CustomFieldsRepository $customFieldsRepository;

    public function __construct()
    {
        $this->product = app(Product::class);
        $this->productItemRepository = app(ProductItemRepository::class);
        $this->customFieldsRepository = app(CustomFieldsRepository::class);
    }

    /** create a new product item repository
     * @param $request
     * @return Builder|Model
     */
    public function create($request)
    {
        $fileName = Str::random() . $request->base_image->getClientOriginalName();
        $filePath = "product/images/$fileName";
         Storage::disk('public')->put($filePath, file_get_contents($request->base_image));

        $images = $this->uploadImage($request->file('images'));
        $data = $request->all();
        $data['images'] = $images;
        $data['base_image'] = $filePath;
        return $this->product->query()->create($data);
    }

    public function update($request, $product)
    {
        $data = $request->all();
        $productUpdate = $this->product->find($product->id);
        $productUpdate->fill($data);

        if (isset($data['images'])) {
            $images = $this->uploadImage($request->file('images'));
            $data['images'] = $images;
            $productUpdate->images = array_merge($product->images, $data['images']);
        }

        if (isset($data['base_image'])) {

            $fileName = Str::random() . $request->base_image->getClientOriginalName();
            $filePath = "product/images/$fileName";
            Storage::disk('public')->put($filePath, file_get_contents($request->base_image));
            $productUpdate->base_image = $filePath;
        }

        array_map(function ($item) use ($productUpdate, $data){

            (isset($data[$item])) ? $productUpdate->$item = $data[$item] : $productUpdate->$item = 'false';
        }, ['most_sold_products', 'special_offers', 'active']);

        return $productUpdate->save();
    }

    public function get($id)
    {
        return $this->product->query()
            ->where('id', $id)
            ->with('productItem', 'customField')
            ->first();
    }

    public function getProductManager()
    {
        return $this->product->query()->paginate(15);
    }

    /**
     * update product images
     * @param $file
     * @return mixed[]
     */
    public function uploadImage($file)
    {

        return collect($file)->map(function ($item) {

            $fileName = Str::random() . $item->getClientOriginalName();
            $filePath = "product/images/$fileName";
            $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($item));

            if ($isFileUploaded) {
                return $filePath;
            }
        })->toArray();

    }

    public function deleteImage($id, $key)
    {
        $product = $this->product->find($id);
        $images = $product->images;


        Storage::delete($images[$key]);
        unset($images[$key]);

        $product->images = $images;
        $product->save();
    }

    public function delete($productId)
    {
        $this->product->query()->where('id', $productId->id)->delete();
        $this->productItemRepository->delete($productId->id);
        $this->customFieldsRepository->delete($productId->id);
    }

    public function all($request)
    {
        $query = $this->product->query();

        if ($request->filled('category_id')) {
            $query->where('product_category_id', $request->input('category_id'));
        }

        if ($request->filled('product_group_id')) {
            $query->where('product_group_id', $request->input('product_group_id'));
        }

        if ($request->filled('special')){
            $query->where('special_offers', true);
        }

        if ($request->filled('most_sold')){
            $query->where('most_sold_products', true);
        }

        return $query->orderBy('created_at', 'desc')->paginate(16);
    }

    public function getProductWithCategory($category_id)
    {
        return $this->product->query()->where('product_category_id', $category_id)
                                    ->orderBy('created_at', 'desc')->paginate(16);
    }

    public function getProductWithProductGroup($product_category_id, $product_group_id)
    {
        return $this->product->query()->where('product_category_id', $product_category_id)
                                    ->where('product_group_id', $product_group_id)
                                    ->orderBy('created_at', 'desc')->paginate(16);
    }

    public function getSpecialOff()
    {
        return $this->product->query()->where('special_offers', 'true')->get();
    }

    public function getMostSoldProducts()
    {
        return $this->product->query()->where('most_sold_products', 'true')->get();
    }

    public function getFitter($request)
    {
        $query = $this->product->query()->where('active', 'true');

        if ($request->filled('productCategory')) {
            $query->whereIn('product_category_id', $request->productCategory);
        }

        if ($request->filled('productGroup')) {
            $query->whereIn('product_group_id', $request->productGroup);
        }

        return $query->paginate(16);
    }

    public function getProductWithName($name)
    {
        return $this->product->query()
            ->where('fa_name', 'like', '%'. $name. '%')
            ->Orwhere('en_name', 'like', '%'. $name. '%')
            ->paginate(16);
    }
}
