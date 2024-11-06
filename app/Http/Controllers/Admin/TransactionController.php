<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Client;
use App\Models\Admin\Transaction;
use App\Notifications\AddTransactionNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\MessageBag;
use Symfony\Component\Console\Input\Input;

class TransactionController extends Controller
{
    public $currency_symbol = "£";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {

            $transaction = new Transaction($request->all());
            // $transaction->user_id = Crypt::decrypt($request->user_id);
            $transaction->transaction_date = date('Y-m-d', strtotime($request->transaction_date));



            $client_balance = Client::where('id', $transaction->user_id)->pluck('client_balance')->first();
            $client_balance = $client_balance ?? 0;


            if ($request->transaction_type == 'withdraw') {

                if ($request->transaction_amount > $client_balance) {
                    $errors = new MessageBag();

                    $errors->add('transaction_amount', 'You don\'t currently have enough funds');

                    return redirect()->back()->withInput($request->all())->withErrors($errors);
                }

                $new_client_balance = $client_balance - $request->transaction_amount;
            } else {
                $new_client_balance = $client_balance + $request->transaction_amount;
            }

            $transaction->save();

            Client::where('id', $transaction->user_id)->update(['client_balance' => $new_client_balance]);
            $client = Client::find($transaction->user_id);

            $transaction_data = [
                'full_name' => $client->first_name . ' ' . $client->last_name,
                'transaction_type' => $transaction->transaction_type,
                'transaction_amount' => $transaction->transaction_amount,
                'currency_symbol' => $this->currency_symbol,

            ];
            // dd($client_data);

            Notification::send($client, new AddTransactionNotification($transaction_data));
        });
        //setting up success message
        if (DB::transactionLevel() == 0) {
            $notification = array(
                'message' => 'Transaction added successfully!',
                'alert-type' => 'success'
            );
        }
        //setting up error message
        else {
            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
        }

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
