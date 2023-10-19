<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\InvoiceItem;
use App\Models\Payment;
use App\Repository\CartRepository;
use App\Repository\InvoiceRepository;
use App\Repository\PaymentRepository;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{

    private CartRepository $cartRepository;
    private PaymentRepository $paymentRepository;
    /**
     * @var InvoiceRepository|(InvoiceRepository&\Illuminate\Contracts\Foundation\Application)|\Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|mixed
     */
    private mixed $invoiceRepository;
    /**
     * @var UserRepository|(UserRepository&\Illuminate\Contracts\Foundation\Application)|\Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|mixed
     */
    private mixed $userRepository;

    public function __construct()
    {
        $this->cartRepository = app(CartRepository::class);
        $this->paymentRepository = app(PaymentRepository::class);
        $this->invoiceRepository = app(InvoiceRepository::class);
        $this->userRepository = app(UserRepository::class);
    }

    public function pay($total)
    {
        $carts = $this->cartRepository->getCarts(checkUserLogin()->id);
        $user = $this->userRepository->getUser(checkUserLogin()->id);

        if (!isset($user->addresses[0]->address) || !isset($user->addresses[0]->postal_code)) {
            return back()->with('error', 'لطفا اطلاعات خود را در پروفایل کاربری خود کامل کنید');
        }

        $response = zarinpal()
            ->merchantId(env('ZARINPAL_MERCHANT_ID'))
            ->amount($total.'0')
            ->request()
            ->description(env('TRANSACTION_INFO'))
            ->callbackUrl(route('callback'))
            ->send();

        if (!$response->success()) {
            return $response->error()->message();
        }


        $data = [
            'user_id' => checkUserLogin()->id,
            'code_payment' => $response->authority(),
            'total_price' => $total,
            'status' => 'pending',
        ];

        $invoice = $this->invoiceRepository->create($data);

        collect($carts->items())->each(function ($item) use ($invoice) {

            InvoiceItem::query()->create([
                'invoice_id' => $invoice->id,
                'product_item_id' => $item->product_item_id,
                'count' => $item->count,
            ]);
        });

        return $response->redirect();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('paid', ['data' => $this->callback()]);
    }

    public function callback()
    {
        $authority = request()->query('Authority');
        $invoice = $this->invoiceRepository->getAmount($authority);

        $response = zarinpal()
            ->merchantId(env('ZARINPAL_MERCHANT_ID'))
            ->amount($invoice->total_price.'0')
            ->verification()
            ->authority($authority)
            ->send();

        if (!$response->success()) {

            $this->invoiceRepository->updateInvoiceStatus($invoice->id, 'canceled');

            return [
                'error' => $response->error()->message(),
                'success' => false,
            ];
        }

        $this->invoiceRepository->updateInvoiceStatus($invoice->id, 'paid');

        return [
            'reference_id' => $response->referenceId(),
            'invoice' => $invoice,
            'success' => true,
        ];
    }


}
