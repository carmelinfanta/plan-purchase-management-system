<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Models\PlanAdded;
use App\Models\users;
use App\Models\transaction;




class StripeController extends Controller
{


    public function stripe()
    {
        if (Session::has('loginId')) {
            $data = users::where('id', '=', Session::get('loginId'))->first();
            $purchasedPlans = PlanAdded::all();
            return view('stripe', compact('purchasedPlans', 'data'));
        }
    }

    public function stripePost(Request $request)
    {
        if (Session::has('loginId')) {
            $data = users::where('id', '=', Session::get('loginId'))->first();
            $planUser = PlanAdded::where('name', $data->name)->get();
            $total =  PlanAdded::where('name', $data->name)->sum('plan_price');
            Stripe\Stripe::setApiKey('sk_test_51OuhwPSAfFhqfzub1MWUHdCsZurZoD79lrbhseatCfOXOq2optgmSJReNgdFgKYMv2nNmAAvYTrBAre7b3bPUfYD005W8kIX2c');
            Stripe\PaymentIntent::create([
                "amount" => $total,
                "currency" => "usd",
                'automatic_payment_methods' => ['enabled' => true],
                "description" => "This payment is tested purpose"
            ]);

            $transaction = new transaction();
            $transaction->name = $data->name;
            $transaction->email = $data->email;
            $transaction->price = $total;
            $transaction->reference_id = $request->stripeToken;
            $transaction->save();




            Session::flash('success', 'Payment successful!');



            $planUser->each->delete();
        }


        return redirect('/paymentSuccess');
    }
}
