<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\StripePaymentController;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripe(){
        return view('stripe');
    }
    public function stripePost(Request $request){
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            'amount' =>100*100,
            'currency' =>"usd",
            'source' => $request->stripe->token,
            'description' =>'test payment'
        ]);
        session::flash('success','payment has been success');
        return back();
    }
}
