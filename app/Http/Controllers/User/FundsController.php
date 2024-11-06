<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Client;
use App\Notifications\AddFundsNotification;
use App\Notifications\WithdrawFundsNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class FundsController extends Controller
{
    public $currency_symbol = "£";

    public function add_funds(Request $request)
    {
        if ($request->has('amount')) {
            $request->validate([
                'amount' => 'required|gt:0'
            ]);

            $admin = Client::where('is_admin', 1)->first();

            $data = [
                'amount' => $request->amount,
                'currency_symbol' => $this->currency_symbol,
                'email' => Auth::user()->email,
                'full_name' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
            ];

            Notification::send($admin, new AddFundsNotification($data));

            $notification = array(
                'message' => 'Request sent successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('add-funds')->with($notification);
        } else {

            return view('user.add_funds');
        }
    }


    public function withdraw_funds(Request $request)
    {
        if ($request->has('amount')) {
            $request->validate([
                'amount' => 'required|gt:0'
            ]);

            $admin = Client::where('is_admin', 1)->first();

            //   $data = [
            //       'amount' => $request->amount,
            //       'reason' => $request->reason,
            //       'email' => Auth::user()->email,
            //       'full_name' =>Auth::user()->first_name.' '.Auth::user()->last_name,
            //   ];
            $data = [
                'amount' => $request->amount,
                'reason' => $request->reason,
                'currency_symbol' => $this->currency_symbol,
                'email' => Auth::user()->email,
                'full_name' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
            ];

            Notification::send($admin, new WithdrawFundsNotification($data));

            $notification = array(
                'message' => 'Withdrawal request sent successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('withdraw-funds')->with($notification);
        } else {

            return view('user.withdraw_funds');
        }
    }
}
