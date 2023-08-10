<?php

namespace App\Observers;

use App\Models\invoice;
use App\Models\Order;
use App\Repository\CartRepository;

class InvoiceObserve
{
    /**
     * Handle the invoice "created" event.
     */
    public function created(invoice $invoice): void
    {
        //
    }

    /**
     * Handle the invoice "updated" event.
     */
    public function updated(invoice $invoice): void
    {

        if ($invoice->isDirty('status')){
            $this->closeAllCarts($invoice->user_id);
        }

        if ($invoice->isDirty('status') && $invoice->status == 'paid'){
            Order::create([
                'invoice_id' => $invoice->id,
                'user_id' => $invoice->user_id,
                'status' => 'new',
            ]);

            app('SmsService')->sendSmsMessage('09152931003', 'پرداخت جدید انام شده چک کن و خوشحال باش حمال');
        }
    }

    /**
     * Handle the invoice "deleted" event.
     */
    public function deleted(invoice $invoice): void
    {
        //
    }

    /**
     * Handle the invoice "restored" event.
     */
    public function restored(invoice $invoice): void
    {
        //
    }

    /**
     * Handle the invoice "force deleted" event.
     */
    public function forceDeleted(invoice $invoice): void
    {
        //
    }

    private function closeAllCarts($user_id)
    {
        $cartRepository = new CartRepository();
        $cartRepository->deleteAll($user_id);
    }
}
