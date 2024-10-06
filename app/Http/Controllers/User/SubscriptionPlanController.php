<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use App\Models\userSubscription;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class SubscriptionPlanController extends Controller
{
    public function index()
    {
        $subscriptionPlans = SubscriptionPlan::all();
        return inertia('User/Dashboard/SubscriptionPlan/Index', [
            'subscriptionPlans' => subscriptionPlan::all(), // Mengirim data ke Inertia
        ]);
    }

    public function userSubscribe(Request $request, SubscriptionPlan $subscriptionPlan)
    {
        // [
        //     'user_id',
        //     'subscription_plan_id',
        //     'price',
        //     'expired_date',
        //     'payment_status',
        //     'snapToken',
        // ];
        $data = [
            'user_id' => Auth::id(),
            'subscription_plan_id' => $subscriptionPlan->id,
            'price' => $subscriptionPlan->price,
            'expired_date' => Carbon::now()->addMonths($subscriptionPlan->active_period_in_moths),
            'payment_status' => 'success',
    
        ];

        $userSubcription = UserSubscription::create($data);

        return redirect(route('user.dashboard.index'));
    }
}
