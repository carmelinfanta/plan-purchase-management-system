<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\users;
use App\Models\plans;
use App\Models\PlanAdded;
use App\Models\PurchaseInfo;
use App\Models\transaction;




class PlanController extends Controller
{
    public function checkout(Request $request, $id)
    {
        if (Session::has('loginId')) {
            $data = users::where('id', '=', Session::get('loginId'))->first();
            $plan = plans::find($id);
            $planAdded = new PlanAdded;

            $planAdded->name = $data->name;
            $planAdded->email = $data->email;
            $planAdded->plan_name = $plan->plan_name;
            $planAdded->plan_price = $plan->plan_price;
            $planAdded->plan_description = $plan->plan_description;

            $planAdded->save();

            return redirect('/purchasedPlans');
        }
    }

    public function purchasedPlans()
    {
        if (Session::has('loginId')) {
            $data = users::where('id', '=', Session::get('loginId'))->first();
            $purchasedPlans = PlanAdded::all();
            return view('purchasedPlans', compact('purchasedPlans', 'data'));
        }
    }

    public function paymentSuccess()

    {


        $plan = PlanAdded::all();
        $results = transaction::latest('created_at')->first();
        $ref_id = $results->reference_id;

        return view('/paymentSuccess', compact('plan', 'ref_id'));
    }

    public function transaction()
    {
        if (Session::has('loginId')) {
            $data = users::where('id', '=', Session::get('loginId'))->first();
            $transactions = transaction::where('email', $data->email)->get();
            return view('transaction', compact('transactions'));
        }
    }

    public function profile()
    {
        if (Session::has('loginId')) {
            $data = users::where('id', '=', Session::get('loginId'))->first();
            $transactionsNo = transaction::where('email', $data->email)->count();
        }

        return view('profile', compact('data', 'transactionsNo'));
    }
}
