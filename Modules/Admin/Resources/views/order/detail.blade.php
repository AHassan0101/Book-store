@extends('admin::layouts.master')
@section('content')
    <div class="content-body">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Invoice Detail</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Detail
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="card">
            <div id="invoice-template" class="card-body">
                <div id="invoice-items-details" class="pt-2">
                    <div class="row">
                        <div class="table-responsive col-sm-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item & Description</th>
                                    <th class="text-right">Quantity</th>
                                    <th class="text-right">Sale Price</th>
                                    <th class="text-right">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->items as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <p>{{ $item->book_name }}</p>
                                        </td>
                                        <td class="text-right">{{ $item->qty }}</td>
                                        <td class="text-right">
                                             {{ number_format ($item->unit_price) }}</td>
                                        <td class="text-right">
                                             {{ number_format ($item->unit_price * $item->qty) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 col-sm-12 text-center text-md-left">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-sm">
                                            <tbody>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <p class="lead">Bill details</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td class="text-bold-800">Total</td>
                                        <td class="text-bold-800 text-right">
                                             {{ number_format ($order->total) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold-800">Payable</td>
                                        <td class="text-bold-800 text-right">
                                             {{ number_format ($order->total) }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
