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
                    {{ trans('sites.order_list') }}
                </li>
            </ul>
        </nav>
        <!--//breadcrumbs-->
        <!--row-->
        <div class="container">
        @if(session()->has('message'))
            <div class="row btn-success">
                <h2>{{ session()->get('message') }}</h2>
            </div>
        @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-title">
                        <h2>{{ trans('sites.order_list') }}</h2>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
            @if(!empty($invoices))
            @foreach($invoices as $invoice)
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"> 
                            <h3 class="panel-title col-md-2"><strong class="text-danger"><a href="#"> {{ $invoice->created_at }}</a></strong></h3>
                            <h3 class="panel-title col-md-3"><strong class="text-danger">{{ trans('sites.seller') }}: <a href="/site/profile/user/{{ $invoice->sellerr->id }}">{{ $invoice->sellerr->name }}</a></strong></h3>
                            <h3 class="panel-title col-md-2"><strong class="text-danger"><a href="/invoice/{{ $invoice->id }}">{{ trans('sites.viewOrder') }}</a></strong></h3>

                            <h3 class="panel-title col-md-2"><strong class="text-danger">{{ trans('sites.total') }}: <a href="#">{{ number_format($invoice->total) }}đ</a></strong></h3>
                            @if($invoice->status == 1)
                                <h3 class="panel-title"><strong class="text-danger">{{ trans('sites.status') }}: <span class="btn btn-success">{{ trans('sites.success') }}</span></strong></h3>
                            @elseif($invoice->status == 0)
                                <h3 class="panel-title"><strong class="text-danger">{{ trans('sites.status') }}: <span class="btn btn-warning">{{ trans('sites.pending') }}</span></strong></h3>
                            @else
                                <h3 class="panel-title"><strong class="text-danger">{{ trans('sites.status') }}: <span class="btn btn-danger">{{ trans('sites.something_wrong_problem') }}</span></strong></h3>
                            @endif
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <td><strong>{{ trans('sites.product') }}</strong></td>
                                            <td class="text-center"><strong>{{ trans('sites.price') }}</strong></td>
                                            <td class="text-center"><strong>{{ trans('sites.quantity') }}</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                    @foreach($invoice->orderDetail as $product)
                                        <tr>
                                            <td class="col-md-3">
                                                <div class="media">
                                                   <a class="thumbnail pull-left" href="#"> <img class="media-object" src="/{{ $product->cooking->image }}" style="width: 72px; height: 72px;"> </a>
                                                   <div class="media-body">
                                                       <h4 class="media-heading"><a href="/site/cooking/{{ $product->cooking->id }}">{{ $product->cooking->name }}</a></h4>
                                                   </div>
                                                </div>
                                            </td>
                                            <td class="text-center">{{ number_format($product->price) }}đ</td>
                                            <td class="text-center">{{ $product->quantity }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @endif
            </div>
        </div>
    </div>
<!--//content-->
<!--right sidebar-->
</main>
@include('sites._sections.footer')
@endsection
@section('script')
@endsection
