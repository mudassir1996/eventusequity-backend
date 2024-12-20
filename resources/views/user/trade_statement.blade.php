@extends('layouts.app')
@section('styles')
    <style>
        .c-table h1 {
            text-transform: capitalize;
            font-size: 30px;
            font-weight: 600 !important;
        }

        .c-table table {
            border-spacing: 0 6px !important;
        }

        .c-table table tr td:first-child,
        table tr th:first-child {
            border-radius: 0px !important;
        }

        .c-table table thead th {
            border: 0px !important;
        }

        .c-table p {
            font-size: 14px;
        }

        .compare-table th {
            color: black;
            font-weight: 500;
            font-size: 14px;
            border: none;
        }

        .compare-table td {
            font-size: 14px;
        }

        .card {
            border: 0px;
            margin-bottom: 30px;
            border-radius: 15px;
            box-shadow: -1px 0px 20px 0px rgba(55, 55, 89, 0.08);
            background: #fff;
        }
    </style>
    <style>
        .c-table h1 {
            text-transform: capitalize;
            font-size: 30px;
            font-weight: 600 !important;
        }

        .c-table table {
            border-spacing: 0 6px !important;
        }

        .c-table table tr td:first-child,
        table tr th:first-child {
            border-radius: 0px !important;
        }

        .c-table table thead th {
            border: 0px !important;
        }

        .c-table p {
            font-size: 14px;
        }

        .compare-table th {
            color: black;
            font-weight: 500;
            font-size: 14px;
            border: none;
        }

        .compare-table td {
            font-size: 14px;
        }

        /* .card {
            border: 0px;
            margin-bottom: 30px;
            border-radius: 15px;
            box-shadow: -1px 0px 20px 0px rgba(55, 55, 89, 0.08);
            background: #fff;
        } */
    </style>
@endsection
@section('content')
    @include('layouts.partials.header')
    @include('layouts.partials.sidebar')

    <div class="page_title">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="page_title-content">
                        <p>
                            <span>{{ ucwords(strtolower(Auth::user()->first_name)) }}
                                {{ ucwords(strtolower(Auth::user()->last_name)) }}</span>
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
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="widget-card" style="min-height: 150px">
                                <div class="widget-title mb-3">
                                    <h4 class="text-primary">Your Balance</h4>
                                    {{-- <p class="text-success">Withdrawn £{{number_format(Auth::user()->client_balance, 2,'.')}}</p> --}}
                                </div>
                                <div class="widget-info">
                                    <h3>£{{ number_format(Auth::user()->client_balance, 2) }}</h3>
                                    <p>GBP</p>
                                </div>
                                <p class="text-muted mb-0">Withdrawn £{{ number_format($total_withdraw, 2) }}</p>

                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="widget-card" style="min-height: 150px">
                                <div class="widget-title mb-3">
                                    <h4>Total Deposit</h4>
                                    {{-- <p class="text-success">133% <span><i class="las la-arrow-up"></i></span></p> --}}
                                </div>
                                <div class="widget-info">
                                    <h3>£{{ number_format($total_deposit, 2) }}</h3>
                                    <p>GBP</p>
                                </div>
                                @if (!$transactions->isEmpty())
                                    <p class="text-muted mb-0">Updated
                                        {{ date('d/m/Y', strtotime($transactions->first()->transaction_date)) }}</p>
                                @endif

                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="widget-card" style="min-height: 150px">
                                <div class="widget-title {{ $profit <= 0 ? 'mb-3' : '' }}">
                                    <h4 class="text-info">Total Profit</h4>
                                    @if ($profit > 0)
                                        <p class="text-success">{{ number_format($profit_percentage, 2) }}% <span><i
                                                    class="las la-arrow-up"></i></span></p>
                                    @endif
                                </div>
                                <div class="widget-info">
                                    <h3>£{{ number_format($profit, 2) }}</h3>
                                    <p>GBP</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6">
                            <div class="widget-card" style="min-height: 150px">
                                <div class="widget-title">
                                    <h4 class="text-danger mb-3">Total Loss</h4>
                                    {{-- <p class="text-danger">133% <span><i class="las la-arrow-down"></i></span></p> --}}
                                </div>
                                <div class="widget-info">
                                    <h3>£{{ number_format($loss, 2) }}</h3>
                                    <p>GBP</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card ">
                                 <div class="card-header border-0">
                                    <h4 class="card-title">Our Funds</h4>
                                </div>
                                <section class="c-table">
                                    <div class="container-fluid">
                                        {{-- <h1 class="text-start">How the Funds Compare?</h1> --}}
                                        {{-- <p class="text-start">
                                            No matter what your goals are, we have a fund that will help you reach them. Our
                                            team of experts
                                            will help you choose the fund that's right for you, and our online tools make
                                            managing your account
                                            easy.
                                        </p> --}}
                                        <div class="table-responsive">
                                            <table class="table compare-table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">Premier League</th>
                                                        <th scope="col">Champions League</th>
                                                        <th scope="col">World Cup</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Hands Off</i>
                                                        </td>
                                                        <td>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="#40165d" class="bi bi-check"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                                            </svg>
                                                        </td>
                                                        <td>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="#40165d" class="bi bi-check"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                                            </svg>
                                                        </td>
                                                        <td>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="#40165d" class="bi bi-check"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                                            </svg>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>24/7 Support</i>
                                                        </td>
                                                        <td>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="#40165d" class="bi bi-check"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                                            </svg>
                                                        </td>
                                                        <td>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="#40165d" class="bi bi-check"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                                            </svg>
                                                        </td>
                                                        <td>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="#40165d" class="bi bi-check"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                                            </svg>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Flexible Term</i>
                                                        </td>
                                                        <td>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="#40165d" class="bi bi-check"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                                            </svg>
                                                        </td>
                                                        <td>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="#40165d" class="bi bi-check"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                                            </svg>
                                                        </td>
                                                        <td>
                                                    </tr>
                                                    <tr>
                                                        <td>Regulated Brokerage</i>
                                                        </td>
                                                        <td>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="#40165d" class="bi bi-check"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                                            </svg>
                                                        </td>
                                                        <td>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="#40165d" class="bi bi-check"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                                            </svg>
                                                        </td>
                                                        <td>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="#40165d" class="bi bi-check"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z" />
                                                            </svg>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Monthly Interest</i>
                                                        </td>
                                                        <td>
                                                            2% Guaranteed
                                                        </td>
                                                        <td>
                                                            2% - 6% *
                                                        </td>
                                                        <td>
                                                            6%+
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Minimum Investment</td>
                                                        <td>
                                                            £10.00
                                                        </td>
                                                        <td>
                                                            £5,000.00
                                                        </td>
                                                        <td>
                                                            £50,000.00
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </section>
                            </div>
                        </div>
                        @if (!$trades->isEmpty())
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <h4 class="card-title">Latest Football Trades</h4>
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
                                                        <th>PPT</th>
                                                        <th>Result</th>
                                                        <th>Trade</th>

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
                                                                            <img src="{{ Storage::disk('public')->exists('events/' . $trade->event_img) ? ($image = asset('storage/events/' . $trade->event_img)) : ($image = asset('images/' . $trade->event_img)) }}"
                                                                                height="30" alt="">
                                                                            <span
                                                                                class="ml-2">{{ $trade->event_name }}</span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="media">
                                                                        <span class="justify-content-center">
                                                                            <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t1_img) ? ($image = asset('storage/teams/' . $trade->t1_img)) : ($image = asset('images/' . $trade->t1_img)) }}"
                                                                                height="30" alt="">
                                                                            <span class="ml-2">{{ $trade->t1_name }}
                                                                                <b>({{ $trade->team_one_score }})</b></span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="media">
                                                                        <span class="justify-content-center">
                                                                            <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t2_img) ? ($image = asset('storage/teams/' . $trade->t2_img)) : ($image = asset('images/' . $trade->t2_img)) }}"
                                                                                height="30" alt="">
                                                                            <span class="ml-2">{{ $trade->t2_name }}
                                                                                <b>({{ $trade->team_two_score }})</b></span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    {{ '£' . number_format($trade->running_total, 2) }}
                                                                </td>
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
                                                                            tabindex="0" role="button"
                                                                            data-toggle="popover" data-trigger="focus"
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
                        @if (!$motoTrades->isEmpty())
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <h4 class="card-title">Latest Motorsport Trades</h4>
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
                                                        <th>PPT</th>
                                                        <th>Result</th>
                                                        <th>Trade</th>

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
                                                                            <img src="{{ Storage::disk('public')->exists('events/' . $motoTrade->event_img) ? ($image = asset('storage/events/' . $motoTrade->event_img)) : ($image = asset('images/' . $motoTrade->event_img)) }}"
                                                                                height="30" alt="">
                                                                            <span
                                                                                class="ml-2">{{ $motoTrade->event_name }}</span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="media">
                                                                        <span class="justify-content-center">
                                                                            <img src="{{ Storage::disk('public')->exists('teams/' . $motoTrade->t1_img) ? ($image = asset('storage/teams/' . $motoTrade->t1_img)) : ($image = asset('images/' . $motoTrade->t1_img)) }}"
                                                                                height="30" alt="">
                                                                            <span
                                                                                class="ml-2">{{ $motoTrade->t1_name }}</span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    {{ $motoTrade->team_one_score }}
                                                                </td>

                                                                <td>
                                                                    {{ '£' . number_format($motoTrade->running_total, 2) }}
                                                                </td>
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
                                                                        <a class="round-btn notes-popover client-notes"
                                                                            tabindex="0" role="button"
                                                                            data-toggle="popover" data-trigger="focus"
                                                                            data-content="{{ $motoTrade->notes }}"
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
                                                        <th>PPT</th>
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
                                                                            <img src="{{ Storage::disk('public')->exists('events/' . $trade->event_img) ? ($image = asset('storage/events/' . $trade->event_img)) : ($image = asset('images/' . $trade->event_img)) }}"
                                                                                height="30" alt="">
                                                                            <span
                                                                                class="ml-2">{{ $trade->event_name }}</span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="media">
                                                                        <span class="justify-content-center">
                                                                            <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t1_img) ? ($image = asset('storage/teams/' . $trade->t1_img)) : ($image = asset('images/' . $trade->t1_img)) }}"
                                                                                height="30" alt="">
                                                                            <span class="ml-2">{{ $trade->t1_name }}
                                                                                <b>({{ $trade->team_one_score }})</b></span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="media">
                                                                        <span class="justify-content-center">
                                                                            <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t2_img) ? ($image = asset('storage/teams/' . $trade->t2_img)) : ($image = asset('images/' . $trade->t2_img)) }}"
                                                                                height="30" alt="">
                                                                            <span class="ml-2">{{ $trade->t2_name }}
                                                                                <b>({{ $trade->team_two_score }})</b></span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    {{ '£' . number_format($trade->running_total, 2) }}
                                                                </td>
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
                                                                            tabindex="0" role="button"
                                                                            data-toggle="popover" data-trigger="focus"
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
                                                        <th>PPT</th>
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
                                                                            <img src="{{ Storage::disk('public')->exists('events/' . $trade->event_img) ? ($image = asset('storage/events/' . $trade->event_img)) : ($image = asset('images/' . $trade->event_img)) }}"
                                                                                height="30" alt="">
                                                                            <span
                                                                                class="ml-2">{{ $trade->event_name }}</span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="media">
                                                                        <span class="justify-content-center">
                                                                            <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t1_img) ? ($image = asset('storage/teams/' . $trade->t1_img)) : ($image = asset('images/' . $trade->t1_img)) }}"
                                                                                height="30" alt="">
                                                                            <span class="ml-2">{{ $trade->t1_name }}
                                                                                <b>({{ $trade->team_one_score }})</b></span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="media">
                                                                        <span class="justify-content-center">
                                                                            <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t2_img) ? ($image = asset('storage/teams/' . $trade->t2_img)) : ($image = asset('images/' . $trade->t2_img)) }}"
                                                                                height="30" alt="">
                                                                            <span class="ml-2">{{ $trade->t2_name }}
                                                                                <b>({{ $trade->team_two_score }})</b></span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    {{ '£' . number_format($trade->running_total, 2) }}
                                                                </td>
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
                                                                            tabindex="0" role="button"
                                                                            data-toggle="popover" data-trigger="focus"
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
                                                        <th>PPT</th>
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
                                                                            <img src="{{ Storage::disk('public')->exists('events/' . $trade->event_img) ? ($image = asset('storage/events/' . $trade->event_img)) : ($image = asset('images/' . $trade->event_img)) }}"
                                                                                height="30" alt="">
                                                                            <span
                                                                                class="ml-2">{{ $trade->event_name }}</span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="media">
                                                                        <span class="justify-content-center">
                                                                            <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t1_img) ? ($image = asset('storage/teams/' . $trade->t1_img)) : ($image = asset('images/' . $trade->t1_img)) }}"
                                                                                height="30" alt="">
                                                                            <span class="ml-2">{{ $trade->t1_name }}
                                                                                <b>({{ $trade->team_one_score }})</b></span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="media">
                                                                        <span class="justify-content-center">
                                                                            <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t2_img) ? ($image = asset('storage/teams/' . $trade->t2_img)) : ($image = asset('images/' . $trade->t2_img)) }}"
                                                                                height="30" alt="">
                                                                            <span class="ml-2">{{ $trade->t2_name }}
                                                                                <b>({{ $trade->team_two_score }})</b></span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    {{ '£' . number_format($trade->running_total, 2) }}
                                                                </td>
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
                                                                            tabindex="0" role="button"
                                                                            data-toggle="popover" data-trigger="focus"
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
                                        <h4 class="card-title">Latest Table Tennis Trades</h4>
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
                                                        <th>PPT</th>
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
                                                                            <img src="{{ Storage::disk('public')->exists('events/' . $trade->event_img) ? ($image = asset('storage/events/' . $trade->event_img)) : ($image = asset('images/' . $trade->event_img)) }}"
                                                                                height="30" alt="">
                                                                            <span
                                                                                class="ml-2">{{ $trade->event_name }}</span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="media">
                                                                        <span class="justify-content-center">
                                                                            <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t1_img) ? ($image = asset('storage/teams/' . $trade->t1_img)) : ($image = asset('images/' . $trade->t1_img)) }}"
                                                                                height="30" alt="">
                                                                            <span class="ml-2">{{ $trade->t1_name }}
                                                                                <b>({{ $trade->team_one_score }})</b></span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="media">
                                                                        <span class="justify-content-center">
                                                                            <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t2_img) ? ($image = asset('storage/teams/' . $trade->t2_img)) : ($image = asset('images/' . $trade->t2_img)) }}"
                                                                                height="30" alt="">
                                                                            <span class="ml-2">{{ $trade->t2_name }}
                                                                                <b>({{ $trade->team_two_score }})</b></span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    {{ '£' . number_format($trade->running_total, 2) }}
                                                                </td>
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
                                                                            tabindex="0" role="button"
                                                                            data-toggle="popover" data-trigger="focus"
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
                                        <h4 class="card-title">Latest Tennis Trades</h4>
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
                                                        <th>PPT</th>
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
                                                                            <img src="{{ Storage::disk('public')->exists('events/' . $trade->event_img) ? ($image = asset('storage/events/' . $trade->event_img)) : ($image = asset('images/' . $trade->event_img)) }}"
                                                                                height="30" alt="">
                                                                            <span
                                                                                class="ml-2">{{ $trade->event_name }}</span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="media">
                                                                        <span class="justify-content-center">
                                                                            <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t1_img) ? ($image = asset('storage/teams/' . $trade->t1_img)) : ($image = asset('images/' . $trade->t1_img)) }}"
                                                                                height="30" alt="">
                                                                            <span class="ml-2">{{ $trade->t1_name }}
                                                                                <b>({{ $trade->team_one_score }})</b></span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="media">
                                                                        <span class="justify-content-center">
                                                                            <img src="{{ Storage::disk('public')->exists('teams/' . $trade->t2_img) ? ($image = asset('storage/teams/' . $trade->t2_img)) : ($image = asset('images/' . $trade->t2_img)) }}"
                                                                                height="30" alt="">
                                                                            <span class="ml-2">{{ $trade->t2_name }}
                                                                                <b>({{ $trade->team_two_score }})</b></span>
                                                                        </span>

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    {{ '£' . number_format($trade->running_total, 2) }}
                                                                </td>
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
                                                                            tabindex="0" role="button"
                                                                            data-toggle="popover" data-trigger="focus"
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
                                                                {{ '£' . number_format($transaction->transaction_amount) }}
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="module" src="https://widgets.api-sports.io/football/1.1.8/widget.js"></script>
    <script>
        $(function() {
            $('.notes-popover').popover({
                container: 'body'
            })
        })
    </script>
@endsection
