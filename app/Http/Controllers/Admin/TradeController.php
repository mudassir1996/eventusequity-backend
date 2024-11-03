<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MotoTradeRequest;
use App\Http\Requests\TradeRequest;
use App\Models\Admin\Client;
use App\Models\Admin\Event;
use App\Models\Admin\Trade;
use App\Models\User;
use Illuminate\Support\MessageBag;


class TradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trades = Trade::join('events', 'events.id', 'trades.event_id')
            ->where('trades.event_type', 'football')
            ->join('teams as t1', 't1.id', 'trades.team_one_id')
            ->join('teams as t2', 't2.id', 'trades.team_two_id')
            ->orderBy('trades.created_at', 'desc')
            ->select('trades.*', 't1.team_name as t1_name', 't2.team_name as t2_name', 't1.team_img as t1_img', 't2.team_img as t2_img', 'events.event_name', 'events.event_img')
            ->get();

        // dd($trades);

        $motoTrades = Trade::join('events', 'events.id', 'trades.event_id')
            ->where('trades.event_type', 'motorsports')
            ->join('teams as t1', 't1.id', 'trades.team_one_id')
            ->orderBy('trades.created_at', 'desc')
            ->select('trades.*', 't1.team_name as t1_name', 't1.team_img as t1_img', 'events.event_name', 'events.event_img')
            ->get();

        // dd($motoTrades);

        return view('admin.trades.trade_list', compact('trades', 'motoTrades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::latest()->pluck('event_name', 'id');
        $clients = User::where('is_admin', 0)->latest()->select('first_name', 'last_name', 'id')->get();
        return view('admin.trades.add_trade', compact('events', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_moto_trade()
    {

        $events = Event::latest()->pluck('event_name', 'id');
        $clients = User::where('is_admin', 0)->latest()->select('first_name', 'last_name', 'id')->get();
        return view('admin.trades.add_moto_trade', compact('events', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_moto_trade(MotoTradeRequest $request)
    {
        $trade = new Trade($request->all());
        $trade->event_type = 'motorsports';
        $trade->team_two_id = 0;
        $trade->team_two_score = 0;
        $balance = Client::where('id', $trade->user_id)->where('is_admin', 0)->latest()->pluck('client_balance')->first();

        if ($balance <= 0) {
            $balanceError = new MessageBag();
            $balanceError->add('balance', 'The client has not enough balance');
            // dd($balance);
            return redirect()->back()->withInput($request->all())->withErrors($balanceError);
        } else {
            $running_total = $trade->reward / 100 * $balance;

            if ($trade->result == 'lose') {
                $new_balance = $balance - $running_total;
            } else {
                $new_balance = $balance + $running_total;
            }

            $trade->trade_date = date('Y-m-d', strtotime($request->trade_date));
            $trade->running_total = $running_total;
            Client::where('id', $trade->user_id)->update(['client_balance' => $new_balance]);



            //setting up success message
            if ($trade->save()) {
                $notification = array(
                    'message' => 'Trade added successfully!',
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

            return redirect()->route('trades.index')->with($notification);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TradeRequest $request)
    {
        // dd($request->all());
        $trade = new Trade($request->all());
        $trade->event_type = 'football';
        $balance = Client::where('id', $trade->user_id)->where('is_admin', 0)->latest()->pluck('client_balance')->first();

        if ($balance <= 0) {
            $balanceError = new MessageBag();
            $balanceError->add('balance', 'The client has not enough balance');
            // dd($balance);
            return redirect()->back()->withInput($request->all())->withErrors($balanceError);
        } else {
            $running_total = $trade->reward / 100 * $balance;

            if ($trade->result == 'lose') {
                $new_balance = $balance - $running_total;
            } else {
                $new_balance = $balance + $running_total;
            }

            $trade->trade_date = date('Y-m-d', strtotime($request->trade_date));
            $trade->running_total = $running_total;
            Client::where('id', $trade->user_id)->update(['client_balance' => $new_balance]);


            // dd($trade);
            //setting up success message
            if ($trade->save()) {
                $notification = array(
                    'message' => 'Trade added successfully!',
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

            return redirect()->route('trades.index')->with($notification);
        }
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
        $events = Event::latest()->pluck('event_name', 'id');
        $trade = Trade::find($id);
        $clients = User::where('is_admin', 0)->latest()->select('first_name', 'last_name', 'id')->get();
        return view('admin.trades.edit_trade', compact('events', 'trade', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TradeRequest $request, $id)
    {
        $trade = Trade::find($id);
        $balance = Client::where('id', $trade->user_id)->where('is_admin', 0)->latest()->pluck('client_balance')->first();

        if ($balance <= 0) {
            $balanceError = new MessageBag();
            $balanceError->add('balance', 'The client has not enough balance');
            // dd($balance);
            return redirect()->back()->withInput($request->all())->withErrors($balanceError);
        } else {
            $old_balance = $balance - $trade->running_total;

            $running_total = $trade->reward / 100 * $old_balance;


            if ($trade->result == 'lose') {
                $new_balance = $old_balance - $running_total;
            } else {
                $new_balance = $old_balance + $running_total;
                // dd($old_balance);
            }

            $trade->trade_date = date('Y-m-d', strtotime($request->trade_date));
            $trade->event_id = $request->event_id;
            $trade->team_one_id = $request->team_one_id;
            $trade->team_one_score = $request->team_one_score;
            $trade->team_two_id = $request->team_two_id;
            $trade->team_two_score = $request->team_two_score;
            $trade->result = $request->result;
            $trade->reward = $request->reward;
            $trade->running_total = $running_total;
            $trade->user_id = $request->user_id;
            $trade->notes = $request->notes;



            // $trade->trade_date = date('Y-m-d', strtotime($request->trade_date));
            // $trade->running_total = $running_total;
            Client::where('id', $trade->user_id)->update(['client_balance' => $new_balance]);


            // dd($trade);
            //setting up success message
            if ($trade->save()) {
                $notification = array(
                    'message' => 'Trade added successfully!',
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

            return redirect()->route('trades.index')->with($notification);
        }









        //setting up success message
        if ($trade->save()) {
            $notification = array(
                'message' => 'Trade updated successfully!',
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

        return redirect()->route('trades.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_moto_trade($id)
    {
        $events = Event::latest()->pluck('event_name', 'id');
        $trade = Trade::find($id);
        $clients = User::where('is_admin', 0)->latest()->select('first_name', 'last_name', 'id')->get();
        return view('admin.trades.edit_moto_trade', compact('events', 'trade', 'clients'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_moto_trade(MotoTradeRequest $request, $id)
    {
        $trade = Trade::find($id);
        $trade->update($request->all());
        $trade->trade_date = date('Y-m-d', strtotime($request->trade_date));

        //setting up success message
        if ($trade) {
            $notification = array(
                'message' => 'Trade updated successfully!',
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

        return redirect()->route('trades.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trade = Trade::find($id);



        if ($trade->delete()) {
            //setting up success message
            $notification = array(
                'message' => 'Trade Deleted',
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
        return redirect()->route('trades.index')->with($notification);
    }
}
