<?php

namespace App\Repository;

use App\Models\Invoice;

class InvoiceRepository
{

    private Invoice $invoice;

    public function __construct()
    {
        $this->invoice = app()->make(Invoice::class);
    }


    public function getInvoices($userId)
    {
        return $this->invoice->query()
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

    }

    public function getInvoiceDetails($invoiceId)
    {
        return $this->invoice->query()->where('id', $invoiceId)->with(['invoiceItems.productItem.product', 'user.addresses'])->first();

    }

    public function create($data)
    {
        return $this->invoice->query()->create($data);
    }

    public function getAmount($key)
    {
        return $this->invoice->query()->where('code_payment', 'like', '%' . $key . '%')->first();
    }

    public function updateInvoiceStatus($invoiceId, $status)
    {
        $invoice = $this->invoice->query()->where('id', $invoiceId)->first();

        $invoice->update([
            'status' => $status
        ]);

        return $invoice;
    }
}
