<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Payment;

use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\PaymentIntent;

class StripepaymentController extends Controller
{
    public function paymentSubmit(Request $request){
        Stripe::setApiKey(config('services.stripe.secret'));
        
        $payment = new Payment();
        $payment->transaction_id = rand(1111, 9999);
        $payment->user_id = $request->user_id;
        $payment->amount = $request->amount;
        $payment->status = 'PENDING';
        $payment->save();

        $productName = 'TNX' . $payment->transaction_id;
        $amount = $request->amount * 100;
        $currency = $request->currency;

        $session = Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => $currency,
                        'product_data' => [
                            'name' => $productName
                        ],
                        'unit_amount' => $amount
                    ],
                    'quantity' => 1
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('success', ['tansaction_id'=>$payment->id]),
            'cancel_url' => route('cancel', ['tansaction_id'=>$payment->id])
        ]);


        return redirect()->away($session->url);

    }

    public function paymentSuccess($transaction_id){
        $payment = Payment::find($transaction_id);
        $payment->status = "SUCCESS";
        $payment->save();
        return redirect()->route('payment.list');
    }

    public function paymentCancel($transaction_id){
        $payment = Payment::find($transaction_id);
        $payment->status = "CANCELLED";
        $payment->save();
        return redirect()->route('payment.list');
    }
}
