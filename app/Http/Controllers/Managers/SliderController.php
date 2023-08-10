<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Repository\SliderRepository;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    private SliderRepository $sliderRepository;
    public function __construct()
    {
        $this->sliderRepository = app(SliderRepository::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('manager.slider', ['slider' => $this->sliderRepository->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $this->sliderRepository->create($request);

        return back()->with('success', 'عملیات با موفقیت انجام شد .');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slider)
    {

        $this->sliderRepository->delete($slider);

        return back()->with('success', 'عملیات با موفقیت انجام شد .');

    }
}
