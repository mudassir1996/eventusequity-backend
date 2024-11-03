<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Admin\Client;
use App\Models\Admin\Trade;
use App\Models\Admin\Transaction;
use App\Notifications\AddClientNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::with('trades')->where('users.is_admin', 0)
            ->orderBy('users.created_at', 'desc')->get();

        // dd($clients);
        return view('admin.clients.clients', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.add_client');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {

        if ($request->hasFile('profile_img')) {
            //getting the image name
            $image_full_name = $request->profile_img->getClientOriginalName();
            $image_name_arr = explode('.', $image_full_name);
            $image_name = $image_name_arr[0] . time() . '.' . $image_name_arr[1];

            //storing image at public/storage/products/$image_name
            $request->profile_img->storeAs('users', $image_name, 'public');
        } else {
            $image_name = 'user-placeholder.jpg';
        }



        $client = Client::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'profile_img' => $image_name,
            'password' => Crypt::encrypt($request->password),
            'is_admin' => 0,
        ]);

        //setting up success message
        if ($client) {

            $data = $client;

            $client_data = [
                'first_name' => $client->first_name,
                'email' => $client->email,
                'password' => Crypt::decrypt($client->password),
            ];
            // dd($client_data);

            Notification::send($data, new AddClientNotification($client_data));
            $notification = array(
                'message' => 'Client added successfully!',
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

        return redirect()->route('clients.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $client = Client::where('users.id', $id)
            ->where('users.is_admin', 0)
            ->first();

        $trades = Trade::join('events', 'events.id', 'trades.event_id')
            ->where('trades.event_type', 'football')
            ->join('teams as t1', 't1.id', 'trades.team_one_id')
            ->join('teams as t2', 't2.id', 'trades.team_two_id')
            ->orderBy('trades.created_at', 'desc')
            ->where('trades.user_id', $id)
            ->select('trades.*', 't1.team_name as t1_name', 't2.team_name as t2_name', 't1.team_img as t1_img', 't2.team_img as t2_img', 'events.event_name', 'events.event_img')
            ->get();

        $motoTrades = Trade::join('events', 'events.id', 'trades.event_id')
            ->where('trades.event_type', 'motorsports')
            ->join('users', 'users.id', 'trades.user_id')
            ->join('teams as t1', 't1.id', 'trades.team_one_id')
            ->orderBy('trades.created_at', 'desc')
            ->where('trades.user_id', $id)
            ->select('trades.*', 't1.team_name as t1_name', 't1.team_img as t1_img', 'events.event_name', 'events.event_img', 'users.first_name', 'users.last_name')
            ->get();

        $nrl_trades = Trade::join('events', 'events.id', 'trades.event_id')
            ->where('trades.event_type', 'nrl')
            ->join('teams as t1', 't1.id', 'trades.team_one_id')
            ->join('teams as t2', 't2.id', 'trades.team_two_id')
            ->orderBy('trades.created_at', 'desc')
            ->where('trades.user_id', $id)
            ->select('trades.*', 't1.team_name as t1_name', 't2.team_name as t2_name', 't1.team_img as t1_img', 't2.team_img as t2_img', 'events.event_name', 'events.event_img')
            ->get();
        $nfl_trades = Trade::join('events', 'events.id', 'trades.event_id')
            ->where('trades.event_type', 'nfl')
            ->join('teams as t1', 't1.id', 'trades.team_one_id')
            ->join('teams as t2', 't2.id', 'trades.team_two_id')
            ->orderBy('trades.created_at', 'desc')
            ->where('trades.user_id', $id)
            ->select('trades.*', 't1.team_name as t1_name', 't2.team_name as t2_name', 't1.team_img as t1_img', 't2.team_img as t2_img', 'events.event_name', 'events.event_img')
            ->get();
        $nba_trades = Trade::join('events', 'events.id', 'trades.event_id')
            ->where('trades.event_type', 'nba')
            ->join('teams as t1', 't1.id', 'trades.team_one_id')
            ->join('teams as t2', 't2.id', 'trades.team_two_id')
            ->orderBy('trades.created_at', 'desc')
            ->where('trades.user_id', $id)
            ->select('trades.*', 't1.team_name as t1_name', 't2.team_name as t2_name', 't1.team_img as t1_img', 't2.team_img as t2_img', 'events.event_name', 'events.event_img')
            ->get();

        $table_tennis_trades = Trade::join('events', 'events.id', 'trades.event_id')
            ->where('trades.event_type', 'table_tennis')
            ->join('teams as t1', 't1.id', 'trades.team_one_id')
            ->join('teams as t2', 't2.id', 'trades.team_two_id')
            ->orderBy('trades.created_at', 'desc')
            ->where('trades.user_id', $id)
            ->select('trades.*', 't1.team_name as t1_name', 't2.team_name as t2_name', 't1.team_img as t1_img', 't2.team_img as t2_img', 'events.event_name', 'events.event_img')
            ->get();

        $tennis_trades = Trade::join('events', 'events.id', 'trades.event_id')
            ->where('trades.event_type', 'tennis')
            ->join('teams as t1', 't1.id', 'trades.team_one_id')
            ->join('teams as t2', 't2.id', 'trades.team_two_id')
            ->orderBy('trades.created_at', 'desc')
            ->where('trades.user_id', $id)
            ->select('trades.*', 't1.team_name as t1_name', 't2.team_name as t2_name', 't1.team_img as t1_img', 't2.team_img as t2_img', 'events.event_name', 'events.event_img')
            ->get();

        $transactions = Transaction::join('users', 'users.id', 'transactions.user_id')
            ->orderBy('transactions.created_at', 'desc')
            ->where('transactions.user_id', $id)
            ->select('transactions.*')
            ->get();


        return view('admin.clients.client_view', compact('client', 'trades', 'transactions', 'motoTrades', 'nrl_trades', 'nfl_trades', 'nba_trades', 'table_tennis_trades', 'tennis_trades'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $id = Crypt::decrypt($id);
        $client = Client::find($id);
        return view('admin.clients.edit_client', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, $id)
    {
        $id = Crypt::decrypt($id);

        $client = Client::find($id);
        if ($request->hasFile('profile_img')) {

            //deleting the previous Image
            Storage::disk('public')->delete('users/' . $client->profile_img);
            //getting the image name
            $image_full_name = $request->profile_img->getClientOriginalName();
            $image_name_arr = explode('.', $image_full_name);
            $image_name = $image_name_arr[0] . time() . '.' . $image_name_arr[1];

            //storing image at public/storage/products/$image_name
            $request->profile_img->storeAs('users', $image_name, 'public');
        } else {
            $image_name = 'user-placeholder.jpg';
        }



        // dd($request->is_secure);
        $client->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'profile_img' => $image_name,
            'password' => Crypt::encrypt($request->password),
            'is_admin' => 0,
            'email_verified_at' => $request->is_verified ? Carbon::now() : NULL,
            'status' => $request->status,
            'is_secure' => $request->is_secure ?? 0,
        ]);

        // dd($client);

        //setting up success message
        if ($client) {
            $notification = array(
                'message' => 'Client Updated',
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

        return redirect()->route('clients.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $id = Crypt::decrypt($id);
        $client = Client::find($id);
        $transaction = Transaction::where('user_id', $id);
        $trade = Trade::where('user_id', $id);


        //deleting the image from the storage
        Storage::disk('public')->delete('users/' . $client->profile_img);

        if ($client->delete()) {
            if ($transaction) {
                $transaction->delete();
            }
            if ($trade) {
                $trade->delete();
            }
            //setting up success message
            $notification = array(
                'message' => 'Client Deleted',
                'alert-type' => 'success'
            );
        } else {
            //setting up error message
            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error'
            );
        }

        //redirecting to the page with notification message
        return redirect()->route('clients.index')->with($notification);
    }
}
