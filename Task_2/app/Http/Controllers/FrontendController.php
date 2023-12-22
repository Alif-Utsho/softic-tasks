<?php

namespace App\Http\Controllers;

use App\Models\Payment;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function paymentform(){
        return view('frontend.paymentform');
    }

    public function paymentList(){
        $payments = Payment::orderBy('id', 'DESC')->get();
        return view('frontend.payment-list', compact('payments'));
    }
    
}
