<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactUs = ContactUs::query()->paginate(20);

        return view('manager.contact-us', ['contactUs' => $contactUs]);
    }
}
