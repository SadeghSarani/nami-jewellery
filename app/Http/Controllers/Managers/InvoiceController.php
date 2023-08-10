<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Repository\InvoiceRepository;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    private InvoiceRepository $invoiceRepository;

    public function __construct()
    {
        $this->invoiceRepository = app()->make(InvoiceRepository::class);
    }

    public function getInvoiceDetails(Request $request, $invoice)
    {
        return view('manager.orderDetails', ['invoice' => $this->invoiceRepository->getInvoiceDetails($invoice)]);
    }
}
