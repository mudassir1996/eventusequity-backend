<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Trade;
use App\Models\Admin\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TradeStatementController extends Controller
{

    public function index()
    {

        $trades = Trade::join('events', 'events.id', 'trades.event_id')
            ->where('trades.event_type', 'football')
            ->join('users', 'users.id', 'trades.user_id')
            ->join('teams as t1', 't1.id', 'trades.team_one_id')
            ->join('teams as t2', 't2.id', 'trades.team_two_id')
            ->where('trades.user_id', auth()->user()->id)
            ->orderBy('trades.created_at', 'desc')
            ->select('trades.*', 't1.team_name as t1_name', 't2.team_name as t2_name', 't1.team_img as t1_img', 't2.team_img as t2_img', 'events.event_name', 'events.event_img', 'users.first_name', 'users.last_name')
            ->get();

        $nrl_trades = Trade::join('events', 'events.id', 'trades.event_id')
            ->where('trades.event_type', 'nrl')
            ->join('users', 'users.id', 'trades.user_id')
            ->join('teams as t1', 't1.id', 'trades.team_one_id')
            ->join('teams as t2', 't2.id', 'trades.team_two_id')
            ->where('trades.user_id', auth()->user()->id)
            ->orderBy('trades.created_at', 'desc')
            ->select('trades.*', 't1.team_name as t1_name', 't2.team_name as t2_name', 't1.team_img as t1_img', 't2.team_img as t2_img', 'events.event_name', 'events.event_img', 'users.first_name', 'users.last_name')
            ->get();

        $nfl_trades = Trade::join('events', 'events.id', 'trades.event_id')
            ->where('trades.event_type', 'nfl')
            ->join('users', 'users.id', 'trades.user_id')
            ->join('teams as t1', 't1.id', 'trades.team_one_id')
            ->join('teams as t2', 't2.id', 'trades.team_two_id')
            ->where('trades.user_id', auth()->user()->id)
            ->orderBy('trades.created_at', 'desc')
            ->select('trades.*', 't1.team_name as t1_name', 't2.team_name as t2_name', 't1.team_img as t1_img', 't2.team_img as t2_img', 'events.event_name', 'events.event_img', 'users.first_name', 'users.last_name')
            ->get();
        $nba_trades = Trade::join('events', 'events.id', 'trades.event_id')
            ->where('trades.event_type', 'nba')
            ->join('users', 'users.id', 'trades.user_id')
            ->join('teams as t1', 't1.id', 'trades.team_one_id')
            ->join('teams as t2', 't2.id', 'trades.team_two_id')
            ->where('trades.user_id', auth()->user()->id)
            ->orderBy('trades.created_at', 'desc')
            ->select('trades.*', 't1.team_name as t1_name', 't2.team_name as t2_name', 't1.team_img as t1_img', 't2.team_img as t2_img', 'events.event_name', 'events.event_img', 'users.first_name', 'users.last_name')
            ->get();

        $motoTrades = Trade::join('events', 'events.id', 'trades.event_id')
            ->where('trades.event_type', 'motorsports')
            ->join('users', 'users.id', 'trades.user_id')
            ->join('teams as t1', 't1.id', 'trades.team_one_id')
            ->where('trades.user_id', auth()->user()->id)
            ->orderBy('trades.created_at', 'desc')
            ->select('trades.*', 't1.team_name as t1_name', 't1.team_img as t1_img', 'events.event_name', 'events.event_img', 'users.first_name', 'users.last_name')
            ->get();

        $table_tennis_trades = Trade::join('events', 'events.id', 'trades.event_id')
            ->where('trades.event_type', 'table_tennis')
            ->join('users', 'users.id', 'trades.user_id')
            ->join('teams as t1', 't1.id', 'trades.team_one_id')
            ->join('teams as t2', 't2.id', 'trades.team_two_id')
            ->where('trades.user_id', auth()->user()->id)
            ->orderBy('trades.created_at', 'desc')
            ->select('trades.*', 't1.team_name as t1_name', 't2.team_name as t2_name', 't1.team_img as t1_img', 't2.team_img as t2_img', 'events.event_name', 'events.event_img', 'users.first_name', 'users.last_name')
            ->get();

        $tennis_trades = Trade::join('events', 'events.id', 'trades.event_id')
            ->where('trades.event_type', 'tennis')
            ->join('users', 'users.id', 'trades.user_id')
            ->join('teams as t1', 't1.id', 'trades.team_one_id')
            ->join('teams as t2', 't2.id', 'trades.team_two_id')
            ->where('trades.user_id', auth()->user()->id)
            ->orderBy('trades.created_at', 'desc')
            ->select('trades.*', 't1.team_name as t1_name', 't2.team_name as t2_name', 't1.team_img as t1_img', 't2.team_img as t2_img', 'events.event_name', 'events.event_img', 'users.first_name', 'users.last_name')
            ->get();

        $transactions = Transaction::join('users', 'users.id', 'transactions.user_id')
            ->orderBy('transactions.created_at', 'desc')
            ->where('transactions.user_id', auth()->user()->id)
            ->select('transactions.*')
            ->get();



        $total_deposit = $transactions->where('transaction_type', 'deposit')->sum('transaction_amount');
        $total_withdraw = $transactions->where('transaction_type', 'withdraw')->sum('transaction_amount');

        $total_balance = Auth::user()->client_balance + $total_withdraw;

        $profit = 0;
        $loss = 0;
        if ($total_balance > $total_deposit) {
            $profit = $total_balance - $total_deposit;
        } else if ($total_balance < $total_deposit) {
            $loss = $total_deposit - $total_balance;
        }
        $profit_percentage = 0;
        if ($total_deposit > 0) {
            $profit_percentage = $profit / $total_deposit * 100;
        }


        // dd($profit_percentage);
        return view('user.trade_statement', compact('trades', 'transactions', 'total_deposit', 'total_withdraw', 'profit', 'loss', 'profit_percentage', 'motoTrades', 'nrl_trades', 'nfl_trades', 'nba_trades', 'table_tennis_trades', 'tennis_trades'));
    }
}
