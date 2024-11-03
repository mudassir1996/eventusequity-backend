@extends('layouts.app')
@section('content')
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')

    <div class="page_title">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="page_title-content">
                        <p class="mb-0">
                            <a href="{{ route('clients.index') }}">Client </a>
                            <span>/</span>
                            <span>{{ $client->first_name . ' ' . $client->last_name }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <div class="container">
            <div class="row">

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Account Transaction</h4>
                            {{-- <a href="{{route('teams.create')}}">
                            <button  class="btn btn-primary btn-sm"> Add New Team</button>
                        </a> --}}
                        </div>
                        <div class="card-body">

                            <form method="post" action="{{ route('transactions.store') }}" name="myform"
                                class="personal_validate" novalidate="novalidate">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-xl-6">
                                        <label class="mr-sm-2">Date</label>
                                        <input type="text" class="form-control" placeholder="Select date" id="datepicker"
                                            autocomplete="off" value="{{ old('transaction_date') }}" readonly required
                                            name="transaction_date">
                                        @error('transaction_date')
                                            <label id="transaction_date-error" class="error"
                                                for="transaction_date">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group col-xl-6">
                                        <label class="mr-sm-2">Amount</label>
                                        <input type="number" class="form-control" required placeholder="10000"
                                            value="{{ old('transaction_amount') }}" name="transaction_amount">
                                        @error('transaction_amount')
                                            <label id="transaction_amount-error" class="error"
                                                for="transaction_amount  ">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group col-xl-6">
                                        <label class="mr-sm-2">Transaction Type</label>
                                        <select name="transaction_type" class="form-control" required>
                                            <option value="">--choose transaction type--</option>
                                            <option value="withdraw"
                                                {{ old('transaction_type') == 'withdraw' ? 'selected' : '' }}>Withdraw
                                            </option>
                                            <option value="deposit"
                                                {{ old('transaction_type') == 'deposit' ? 'selected' : '' }}>
                                                Deposit</option>
                                        </select>
                                        @error('email')
                                            <label id="email-error" class="error"
                                                for="email">{{ $message }}</label>
                                        @enderror
                                    </div>

                                    <div class="form-group col-xl-6">
                                        <label class="mr-sm-2">Authorised By</label>
                                        <input type="text" class="form-control" required placeholder="John Doe"
                                            value="{{ old('authorised_by') }}" name="authorised_by">
                                        @error('authorised_by')
                                            <label id="authorised_by-error" class="error"
                                                for="authorised_by">{{ $message }}</label>
                                        @enderror

                                    </div>
                                    <input type="hidden" name="user_id" value="{{ $client->id }}">
                                    <div class="form-group text-right col-12">
                                        <button class="btn btn-primary pl-5 pr-5">Save Transaction</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <h4 class="card-title">Transactions</h4>
                        </div>
                        <div class="card-body pt-0">

                            <div class="transaction-table">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-responsive-trade">
                                        <thead class="bg-dark text-light">
                                            <th>Date</th>
                                            <th>Transaction Amount</th>
                                            <th>Transaction Type</th>
                                            <th>Authorised By</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($transactions as $transaction)
                                                <tr>
                                                    <td>
                                                        {{ date('d-m-Y', strtotime($transaction->transaction_date)) }}
                                                    </td>

                                                    <td>
                                                        {{ '£' . $transaction->transaction_amount }}
                                                    </td>
                                                    <td>
                                                        @if ($transaction->transaction_type == 'deposit')
                                                            <span
                                                                class="badge badge-success">{{ ucfirst($transaction->transaction_type) }}</span>
                                                        @else
                                                            <span
                                                                class="badge badge-danger text-light">{{ ucfirst($transaction->transaction_type) }}</span>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        {{ $transaction->authorised_by }}
                                                    </td>

                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="9" class="text-center">No record</td>
                                                </tr>
                                            @endforelse


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (!$trades->isEmpty())
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <h4 class="card-title">Football Trades</h4>
                                {{-- <a href="{{route('teams.create')}}">
                            <button  class="btn btn-primary btn-sm"> Add New Team</button>
                        </a> --}}
                            </div>
                            <div class="card-body pt-0">

                                <div class="transaction-table">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-responsive-trade-list">
                                            <thead class="bg-dark text-light">
                                                <th>Date</th>
                                                <th>Event</th>
                                                <th>Team 1</th>
                                                <th>Team 2</th>
                                                <th>Reward</th>
                                                <th>Result</th>
                                                <th>Trade</th>
                                                {{-- <th>Action</th> --}}
                                            </thead>
                                            <tbody>
                                                @forelse ($trades as $trade)
                                                    <tr>
                                                        <td>
                                                            {{ date('d-m-Y', strtotime($trade->trade_date)) }}
                                                        </td>

                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('events/' . $trade->event_img)? ($image = asset('storage/events/' . $trade->event_img)): ($image = asset('images/' . $trade->event_img)) }}"
                                                                        height="30" alt="">
                                                                    <span
                                                                        class="ml-2">{{ $trade->event_name }}</span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t1_img)? ($image = asset('storage/teams/' . $trade->t1_img)): ($image = asset('images/' . $trade->t1_img)) }}"
                                                                        height="30" alt="">
                                                                    <span class="ml-2">{{ $trade->t1_name }}
                                                                        <b>({{ $trade->team_one_score }})</b></span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t2_img)? ($image = asset('storage/teams/' . $trade->t2_img)): ($image = asset('images/' . $trade->t2_img)) }}"
                                                                        height="30" alt="">
                                                                    <span class="ml-2">{{ $trade->t2_name }}
                                                                        <b>({{ $trade->team_two_score }})</b></span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>{{ $trade->reward . '%' }}</td>
                                                        <td>
                                                            @if ($trade->result == 'win')
                                                                <span
                                                                    class="badge badge-success">{{ ucfirst($trade->result) }}</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-danger text-light">{{ ucfirst($trade->result) }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($trade->notes != '')
                                                                <a class="round-btn notes-popover" role="button"
                                                                    data-toggle="popover" data-trigger="focus"
                                                                    data-content="{{ $trade->notes }}"
                                                                    href="javascript:void(0)"><i
                                                                        class="mdi mdi-eye"></i></a>
                                                            @endif
                                                        </td>
                                                        {{-- <td>
                                                <a class="round-btn" href="{{route('trades.edit', $trade->id)}}"><i class="mdi mdi-pen"></i></a>
                                                <a class="round-btn" href="#" onclick="delete_row('myForm{{$trade->id}}')"><i class="mdi mdi-delete"></i></a>
                                                <form action="{{route('trades.destroy',$trade->id)}}" id="myForm{{$trade->id}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td> --}}
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="9" class="text-center">No record</td>
                                                    </tr>
                                                @endforelse


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (!$motoTrades->isEmpty())
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <h4 class="card-title">Motorsport Trades</h4>
                            </div>
                            <div class="card-body pt-0">
                                <div class="transaction-table">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-responsive-trade">
                                            <thead class="bg-dark text-light">
                                                <th>Date</th>
                                                <th>Event</th>
                                                <th>Driver</th>
                                                <th>Position</th>
                                                <th>Reward</th>
                                                <th>Result</th>
                                                <th>Trade</th>
                                                {{-- <th>Action</th> --}}
                                            </thead>
                                            <tbody>
                                                @forelse ($motoTrades as $motoTrade)
                                                    <tr>
                                                        <td>
                                                            {{ date('d-m-Y', strtotime($motoTrade->trade_date)) }}
                                                        </td>

                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('events/' . $motoTrade->event_img)? ($image = asset('storage/events/' . $motoTrade->event_img)): ($image = asset('images/' . $motoTrade->event_img)) }}"
                                                                        height="30" alt="">
                                                                    <span
                                                                        class="ml-2">{{ $motoTrade->event_name }}</span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('teams/' . $motoTrade->t1_img)? ($image = asset('storage/teams/' . $motoTrade->t1_img)): ($image = asset('images/' . $motoTrade->t1_img)) }}"
                                                                        height="30" alt="">
                                                                    <span
                                                                        class="ml-2">{{ $motoTrade->t1_name }}</span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ $motoTrade->team_one_score }}
                                                        </td>

                                                        <td>{{ $motoTrade->reward . '%' }}</td>
                                                        <td>
                                                            @if ($motoTrade->result == 'winner')
                                                                <span
                                                                    class="badge badge-success">{{ ucfirst($motoTrade->result) }}</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-danger text-light">{{ ucfirst($motoTrade->result) }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($motoTrade->notes != '')
                                                                <a class="round-btn notes-popover" role="button"
                                                                    data-toggle="popover" data-trigger="focus"
                                                                    data-content="{{ $motoTrade->notes }}"
                                                                    href="javascript:void(0)"><i
                                                                        class="mdi mdi-eye"></i></a>
                                                            @endif
                                                        </td>
                                                        {{-- <td>
                                                    <a class="round-btn" href="{{route('moto-trades.edit', $motoTrade->id)}}"><i class="mdi mdi-pen"></i></a>
                                                    <a class="round-btn" href="#" onclick="delete_row('myForm{{$motoTrade->id}}')"><i class="mdi mdi-delete"></i></a>
                                                    <form action="{{route('trades.destroy',$motoTrade->id)}}" id="myForm{{$motoTrade->id}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td> --}}
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="text-center" colspan="8">No record</td>
                                                    </tr>
                                                @endforelse


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (!$nrl_trades->isEmpty())
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <h4 class="card-title">Latest Rugby Trades</h4>
                            </div>
                            <div class="card-body pt-0">
                                <div class="transaction-table">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-responsive-trade">
                                            <thead class="bg-dark text-light">
                                                <th>Date</th>
                                                <th>Event</th>
                                                <th>Team 1</th>
                                                <th>Team 2</th>
                                                <th>Reward</th>
                                                <th>Result</th>
                                                <th>Trade</th>

                                            </thead>
                                            <tbody>
                                                @forelse ($nrl_trades as $trade)
                                                    <tr>
                                                        <td>
                                                            {{ date('d-m-Y', strtotime($trade->trade_date)) }}
                                                        </td>

                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('events/' . $trade->event_img)? ($image = asset('storage/events/' . $trade->event_img)): ($image = asset('images/' . $trade->event_img)) }}"
                                                                        height="30" alt="">
                                                                    <span
                                                                        class="ml-2">{{ $trade->event_name }}</span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t1_img)? ($image = asset('storage/teams/' . $trade->t1_img)): ($image = asset('images/' . $trade->t1_img)) }}"
                                                                        height="30" alt="">
                                                                    <span class="ml-2">{{ $trade->t1_name }}
                                                                        <b>({{ $trade->team_one_score }})</b></span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t2_img)? ($image = asset('storage/teams/' . $trade->t2_img)): ($image = asset('images/' . $trade->t2_img)) }}"
                                                                        height="30" alt="">
                                                                    <span class="ml-2">{{ $trade->t2_name }}
                                                                        <b>({{ $trade->team_two_score }})</b></span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>{{ $trade->reward . '%' }}</td>
                                                        <td>
                                                            @if ($trade->result == 'win')
                                                                <span
                                                                    class="badge badge-success">{{ ucfirst($trade->result) }}</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-danger text-light">{{ ucfirst($trade->result) }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($trade->notes != '')
                                                                <a class="round-btn notes-popover client-notes"
                                                                    role="button" data-toggle="popover" data-trigger="focus"
                                                                    data-content="{{ $trade->notes }}"
                                                                    href="javascript:void(0)"><i
                                                                        class="mdi mdi-eye"></i></a>
                                                            @endif
                                                        </td>

                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="text-center" colspan="8">No record</td>
                                                    </tr>
                                                @endforelse


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (!$nfl_trades->isEmpty())
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <h4 class="card-title">Latest NFL Trades</h4>
                            </div>
                            <div class="card-body pt-0">
                                <div class="transaction-table">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-responsive-trade">
                                            <thead class="bg-dark text-light">
                                                <th>Date</th>
                                                <th>Event</th>
                                                <th>Team 1</th>
                                                <th>Team 2</th>
                                                <th>Reward</th>
                                                <th>Result</th>
                                                <th>Trade</th>

                                            </thead>
                                            <tbody>
                                                @forelse ($nfl_trades as $trade)
                                                    <tr>
                                                        <td>
                                                            {{ date('d-m-Y', strtotime($trade->trade_date)) }}
                                                        </td>

                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('events/' . $trade->event_img)? ($image = asset('storage/events/' . $trade->event_img)): ($image = asset('images/' . $trade->event_img)) }}"
                                                                        height="30" alt="">
                                                                    <span
                                                                        class="ml-2">{{ $trade->event_name }}</span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t1_img)? ($image = asset('storage/teams/' . $trade->t1_img)): ($image = asset('images/' . $trade->t1_img)) }}"
                                                                        height="30" alt="">
                                                                    <span class="ml-2">{{ $trade->t1_name }}
                                                                        <b>({{ $trade->team_one_score }})</b></span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t2_img)? ($image = asset('storage/teams/' . $trade->t2_img)): ($image = asset('images/' . $trade->t2_img)) }}"
                                                                        height="30" alt="">
                                                                    <span class="ml-2">{{ $trade->t2_name }}
                                                                        <b>({{ $trade->team_two_score }})</b></span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>{{ $trade->reward . '%' }}</td>
                                                        <td>
                                                            @if ($trade->result == 'win')
                                                                <span
                                                                    class="badge badge-success">{{ ucfirst($trade->result) }}</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-danger text-light">{{ ucfirst($trade->result) }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($trade->notes != '')
                                                                <a class="round-btn notes-popover client-notes"
                                                                    role="button" data-toggle="popover" data-trigger="focus"
                                                                    data-content="{{ $trade->notes }}"
                                                                    href="javascript:void(0)"><i
                                                                        class="mdi mdi-eye"></i></a>
                                                            @endif
                                                        </td>

                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="text-center" colspan="8">No record</td>
                                                    </tr>
                                                @endforelse


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (!$nba_trades->isEmpty())
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <h4 class="card-title">Latest NBA Trades</h4>
                            </div>
                            <div class="card-body pt-0">
                                <div class="transaction-table">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-responsive-trade">
                                            <thead class="bg-dark text-light">
                                                <th>Date</th>
                                                <th>Event</th>
                                                <th>Team 1</th>
                                                <th>Team 2</th>
                                                <th>Reward</th>
                                                <th>Result</th>
                                                <th>Trade</th>

                                            </thead>
                                            <tbody>
                                                @forelse ($nba_trades as $trade)
                                                    <tr>
                                                        <td>
                                                            {{ date('d-m-Y', strtotime($trade->trade_date)) }}
                                                        </td>

                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('events/' . $trade->event_img)? ($image = asset('storage/events/' . $trade->event_img)): ($image = asset('images/' . $trade->event_img)) }}"
                                                                        height="30" alt="">
                                                                    <span
                                                                        class="ml-2">{{ $trade->event_name }}</span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t1_img)? ($image = asset('storage/teams/' . $trade->t1_img)): ($image = asset('images/' . $trade->t1_img)) }}"
                                                                        height="30" alt="">
                                                                    <span class="ml-2">{{ $trade->t1_name }}
                                                                        <b>({{ $trade->team_one_score }})</b></span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t2_img)? ($image = asset('storage/teams/' . $trade->t2_img)): ($image = asset('images/' . $trade->t2_img)) }}"
                                                                        height="30" alt="">
                                                                    <span class="ml-2">{{ $trade->t2_name }}
                                                                        <b>({{ $trade->team_two_score }})</b></span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>{{ $trade->reward . '%' }}</td>
                                                        <td>
                                                            @if ($trade->result == 'win')
                                                                <span
                                                                    class="badge badge-success">{{ ucfirst($trade->result) }}</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-danger text-light">{{ ucfirst($trade->result) }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($trade->notes != '')
                                                                <a class="round-btn notes-popover client-notes"
                                                                    role="button" data-toggle="popover" data-trigger="focus"
                                                                    data-content="{{ $trade->notes }}"
                                                                    href="javascript:void(0)"><i
                                                                        class="mdi mdi-eye"></i></a>
                                                            @endif
                                                        </td>

                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="text-center" colspan="8">No record</td>
                                                    </tr>
                                                @endforelse


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (!$table_tennis_trades->isEmpty())
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <h4 class="card-title">Table Tennis Trades</h4>
                            </div>
                            <div class="card-body pt-0">
                                <div class="transaction-table">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-responsive-trade">
                                            <thead class="bg-dark text-light">
                                                <th>Date</th>
                                                <th>Event</th>
                                                <th>Player 1</th>
                                                <th>Player 2</th>
                                                <th>Reward</th>
                                                <th>Result</th>
                                                <th>Trade</th>

                                            </thead>
                                            <tbody>
                                                @forelse ($table_tennis_trades as $trade)
                                                    <tr>
                                                        <td>
                                                            {{ date('d-m-Y', strtotime($trade->trade_date)) }}
                                                        </td>

                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('events/' . $trade->event_img)? ($image = asset('storage/events/' . $trade->event_img)): ($image = asset('images/' . $trade->event_img)) }}"
                                                                        height="30" alt="">
                                                                    <span
                                                                        class="ml-2">{{ $trade->event_name }}</span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t1_img)? ($image = asset('storage/teams/' . $trade->t1_img)): ($image = asset('images/' . $trade->t1_img)) }}"
                                                                        height="30" alt="">
                                                                    <span class="ml-2">{{ $trade->t1_name }}
                                                                        <b>({{ $trade->team_one_score }})</b></span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t2_img)? ($image = asset('storage/teams/' . $trade->t2_img)): ($image = asset('images/' . $trade->t2_img)) }}"
                                                                        height="30" alt="">
                                                                    <span class="ml-2">{{ $trade->t2_name }}
                                                                        <b>({{ $trade->team_two_score }})</b></span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>{{ $trade->reward . '%' }}</td>
                                                        <td>
                                                            @if ($trade->result == 'win')
                                                                <span
                                                                    class="badge badge-success">{{ ucfirst($trade->result) }}</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-danger text-light">{{ ucfirst($trade->result) }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($trade->notes != '')
                                                                <a class="round-btn notes-popover client-notes"
                                                                    role="button" data-toggle="popover" data-trigger="focus"
                                                                    data-content="{{ $trade->notes }}"
                                                                    href="javascript:void(0)"><i
                                                                        class="mdi mdi-eye"></i></a>
                                                            @endif
                                                        </td>

                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="text-center" colspan="8">No record</td>
                                                    </tr>
                                                @endforelse


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (!$tennis_trades->isEmpty())
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <h4 class="card-title">Table Tennis Trades</h4>
                            </div>
                            <div class="card-body pt-0">
                                <div class="transaction-table">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-responsive-trade">
                                            <thead class="bg-dark text-light">
                                                <th>Date</th>
                                                <th>Event</th>
                                                <th>Player 1</th>
                                                <th>Player 2</th>
                                                <th>Reward</th>
                                                <th>Result</th>
                                                <th>Trade</th>

                                            </thead>
                                            <tbody>
                                                @forelse ($tennis_trades as $trade)
                                                    <tr>
                                                        <td>
                                                            {{ date('d-m-Y', strtotime($trade->trade_date)) }}
                                                        </td>

                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('events/' . $trade->event_img)? ($image = asset('storage/events/' . $trade->event_img)): ($image = asset('images/' . $trade->event_img)) }}"
                                                                        height="30" alt="">
                                                                    <span
                                                                        class="ml-2">{{ $trade->event_name }}</span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t1_img)? ($image = asset('storage/teams/' . $trade->t1_img)): ($image = asset('images/' . $trade->t1_img)) }}"
                                                                        height="30" alt="">
                                                                    <span class="ml-2">{{ $trade->t1_name }}
                                                                        <b>({{ $trade->team_one_score }})</b></span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="media">
                                                                <span class="justify-content-center">
                                                                    <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t2_img)? ($image = asset('storage/teams/' . $trade->t2_img)): ($image = asset('images/' . $trade->t2_img)) }}"
                                                                        height="30" alt="">
                                                                    <span class="ml-2">{{ $trade->t2_name }}
                                                                        <b>({{ $trade->team_two_score }})</b></span>
                                                                </span>

                                                            </div>
                                                        </td>
                                                        <td>{{ $trade->reward . '%' }}</td>
                                                        <td>
                                                            @if ($trade->result == 'win')
                                                                <span
                                                                    class="badge badge-success">{{ ucfirst($trade->result) }}</span>
                                                            @else
                                                                <span
                                                                    class="badge badge-danger text-light">{{ ucfirst($trade->result) }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($trade->notes != '')
                                                                <a class="round-btn notes-popover client-notes"
                                                                    role="button" data-toggle="popover" data-trigger="focus"
                                                                    data-content="{{ $trade->notes }}"
                                                                    href="javascript:void(0)"><i
                                                                        class="mdi mdi-eye"></i></a>
                                                            @endif
                                                        </td>

                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="text-center" colspan="8">No record</td>
                                                    </tr>
                                                @endforelse


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(function() {
            $('.notes-popover').popover({
                container: 'body'
            });
        });
    </script>
    <script>
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
    <script src="{{ asset('vendor/validator/jquery.validate.js') }}"></script>
    <script src="{{ asset('vendor/validator/validator-init.js') }}"></script>
@endsection
