@extends('sites.master')
@section('content')
@include('sites._sections.header')
<main class="main login" role="main">
    <!--wrap-->
    <div class="wrap clearfix" id="blog">
        <!--breadcrumbs-->
        <nav class="breadcrumbs">
            <ul>
                <li>
                    <a href="{{ asset('/') }}">
                        {{trans('sites.home') }}
                    </a>
                </li>
                <li>
                    {{ trans('sites.blog') }}
                </li>
            </ul>
        </nav>
        <!--//breadcrumbs-->
        <!--row-->
        <div class="container">
     @if(!empty($invoice))
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>{{ trans('sites.invoice') }}</h2>
                @if($invoice->status == 1)
                    <h3 class="pull-right text-success">{{ trans('sites.success') }}</h3>
                @elseif($invoice->status == 0)
                    <h3 class="pull-right text-warning">{{ trans('sites.pending') }}</h3>
                @else
                    <h3 class="pull-right text-warning">{{ trans('sites.something_wrong_problem') }}</h3>
                @endif
                <h3 class="pull-right ">{{ trans('sites.status') }}: </h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                    <strong>{{ trans('sites.invoice_infomation') }}:</strong><br>
                        {{ trans('sites.name') . ': ' .$invoice->name }}<br>
                        {{  trans('sites.email') . ': ' .$invoice->email }}<br>
                        {{  trans('sites.phone') . ': ' .$invoice->phone }}<br>
                        {{  trans('sites.address') . ': ' .$invoice->address }}
                    </address>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <address>
                        <strong>{{ trans('sites.payment_method') }}:</strong><br>
                        {{ trans('sites.ship_to_home') }}
                    </address>
                </div>
                <div class="col-xs-6 text-right">
                    <address>
                        <strong>{{ trans('sites.order_date') }}:</strong><br>
                        {{ $invoice->created_at }}<br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>{{ trans('sites.order_sumary') }}</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>{{ trans('sites.item') }}</strong></td>
                                    <td class="text-center"><strong>{{ trans('sites.price') }}</strong></td>
                                    <td class="text-center"><strong>{{ trans('sites.quantity') }}</strong></td>
                                    <td class="text-right"><strong>{{ trans('sites.total') }}</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            @foreach($invoice->orderDetail as $orderDetail)
                                <tr>
                                    <td>{{ $orderDetail->cooking->name }}</td>
                                    <td class="text-center">{{ number_format($orderDetail->price / $orderDetail->quantity) }}đ</td>
                                    <td class="text-center">{{ $orderDetail->quantity }}</td>
                                    <td class="text-right">{{ number_format($orderDetail->price) }}đ</td>
                                </tr>
                            @endforeach
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>{{ trans('sites.shipping') }}</strong></td>
                                    <td class="no-line text-right">0đ</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>{{ trans('sites.total') }}</strong></td>
                                    <td class="no-line text-right">{{ $invoice->total }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <button onClick="window.print();" class="btn btn-success col-md-2 col-md-offset-10">{{ trans('sites.print_invoice') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <h1>{{ trans('sites.nothing') }}</h1>
    @endif
</div>
    </div>
<!--//content-->
<!--right sidebar-->
</main>
@include('sites._sections.footer')
@endsection
@section('script')
@endsection
