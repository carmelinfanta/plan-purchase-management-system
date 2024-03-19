<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\users;
use App\Models\PlanAdded;
use App\Models\PurchaseInfo;
use App\Models\transaction;



class StripeController extends Controller
{
    public function checkoutSession(Request $request)
    {
        if (Session::has('loginId')) {
            $data = users::where('id', '=', Session::get('loginId'))->first();
            $request->validate([
                'address' => 'required',
                'city' => 'required',
                'country' => 'required',
                'postalCode' => 'required',
            ]);
            $purchase = new PurchaseInfo();
            $purchase->name = $data->name;
            $purchase->email = $data->email;
            $purchase->address = $request->address;
            $purchase->city = $request->city;
            $purchase->country = $request->country;
            $purchase->postalCode = $request->postalCode;

            $purchase->save();

            \Stripe\Stripe::setApiKey('sk_test_51OuhwPSAfFhqfzub1MWUHdCsZurZoD79lrbhseatCfOXOq2optgmSJReNgdFgKYMv2nNmAAvYTrBAre7b3bPUfYD005W8kIX2c');
            $purchasedPlans = PlanAdded::all();
            $lineItems = [];

            foreach ($purchasedPlans as $purchasedPlan) {
                $lineItems[] = [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $purchasedPlan->plan_name,
                            'description' => $purchasedPlan->plan_description,
                        ],
                        'unit_amount' => $purchasedPlan->plan_price * 100,
                    ],
                    'quantity' => 1,
                ]];
            };
            $session = \Stripe\Checkout\Session::create([
                'line_items' => $lineItems,
                'customer_email' => $data->email,
                'mode' => 'payment',
                'success_url' => 'http://localhost:8000/paymentSuccess',
                'cancel_url' => 'http://localhost:8000/cancel',
            ]);


            return redirect($session->url);
        }
    }

    public function webhook(Request $request)
    {
        $endpoint_secret = 'whsec_8a0a0ff7197018de2c8012ab8fb1659b5ce494d8fa98da62bc4f7de9c548e691';

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('', status: 400);
            exit();
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('', status: 400);
            exit();
        }

        // Handle the event
        switch ($event->type) {
            case 'charge.succeeded':
                $charge = $event->data->object;

                $transaction = new transaction();
                $transaction->name = $charge->billing_details->name;
                $transaction->email = $charge->billing_details->email;
                $transaction->price = $charge->amount/100;
                $transaction->reference_id = $charge->payment_intent;
                $transaction->save();

                $purchasedPlans = PlanAdded::all();
                $purchasedPlans->each->delete();

                // ... handle other event types
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('');
    }
}
