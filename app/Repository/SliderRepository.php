<?php

namespace App\Repository;

use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SliderRepository
{
    private Slider $slider;

    public function __construct()
    {
        $this->slider = app(Slider::class);
    }

    public function get()
    {
        return $this->slider->query()->paginate(15);
    }

    public function create($request)
    {
        $fileName = Str::random() . $request->image->getClientOriginalName();
        $filePath = "slider/images/$fileName";
        $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->image));

        if ($isFileUploaded) {
            $this->slider->query()->create(['image' => $filePath]);
        }
    }

    public function delete($slider)
    {
        $sliderData = $this->slider->query()->where('id', $slider)->first();
        Storage::delete($sliderData->image);
        $sliderData->delete();
    }

}
