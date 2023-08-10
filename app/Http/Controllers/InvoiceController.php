<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use App\Repository\InvoiceRepository;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    private InvoiceRepository $invoiceRepository;

    public function __construct()
    {
        $this->invoiceRepository = app()->make(InvoiceRepository::class);
    }

    public function getInvoice()
    {
        $user = checkUserLogin();
        $orders = $this->invoiceRepository->getInvoices($user->id);

        return view('clients.user-order')->with(['user' => checkUserLogin(), 'orders' => $orders]);
    }

    public function getSingleInvoice(Invoice $invoice)
    {
        return view('clients.single-order-user')
            ->with(['order' => $invoice, 'user' => checkUserLogin()]);
    }

    public function update(Request $request)
    {
        $invoice = Invoice::query()->where('id', $request->input('invoice_id'))->first();
        $invoice->update(['status' => $request->input('status')]);
    }
}
