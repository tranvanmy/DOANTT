@extends('sites.master')
@section('style')
    {{ Html::style('sites_custom/css/add.css') }}
@endsection
@section('content')
@include('sites._sections.header')
<main class="main not-home" role="main" id="checkout">
    <!--wrap-->
    <div class="wrap clearfix add-cooking">
       <section class="site-content site-section clearfix">
            <div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="/checkout">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            {{ trans('sites.review_order') }}<div class="pull-right"><small><a class="afix-1" href="/cart">{{ trans('sites.edit_cart') }}</a></small></div>
                        </div>
                        <div class="panel-body">
                        @if(!empty($cookings['cookings']))
                            @foreach($cookings['cookings'] as $cooking)
                                <div class="form-group">
                                    <div class="col-sm-3 col-xs-3">
                                        <img class="img-responsive" src="{{ asset($cooking->image) }}" />
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <div class="col-xs-12">{{ $cooking->name }}</div>
                                        <div class="col-xs-12"><small>{{ trans('sites.quantity') }}:<span>{{ $cookings['cart'][$cooking->id] }}</span></small></div>
                                    </div>
                                    <div class="col-sm-3 col-xs-3 text-right">
                                        <h6>{{ number_format($cookings['cart'][$cooking->id] * $cooking->price) }}đ</h6>
                                    </div>
                                </div>
                                <div class="form-group"><hr /></div>
                            @endforeach
                        @endif
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>{{ trans('sites.order_total') }}</strong>
                                    <div class="pull-right"><span>{{ !empty($cookings['total']) ?  number_format($cookings['total'])  : '' }}đ</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--REVIEW ORDER END-->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">{{ trans('sites.address_infomation') }}</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>{{ trans('sites.shipping_address') }}</h4>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <strong>{{ trans('sites.name') }}</strong>
                                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>{{ trans('sites.email') }}</strong></div>
                                <div class="col-md-12">
                                    <input type="text" name="email" class="form-control" value="{{  Auth::user()->email}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>{{ trans('sites.phone') }}</strong></div>
                                <div class="col-md-12"><input type="number" v-on:keyup="handlePhone" name="phone" class="form-control" value="{{ Auth::user()->phone }}" /></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>{{ trans('sites.address') }}:</strong></div>
                                <div class="col-md-12">
                                    <input type="text"  ref="inputAddress"  v-on:keyup="handleAddress" name="address" class="form-control" value="{{ Auth::user()->address }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->
                   <div class="col-md-6 col-sm-6 col-xs-12">
                    @if(!empty($cookings['cookings']))
                        <button type="submit" class="btn btn-primary btn-submit-fix" ref="submitCheckout">{{ trans('sites.place_order') }}</button>
                    @endif
                    </div>
                    <!--CREDIT CART PAYMENT END-->
                </div>

                </form>
            </div>
            <div class="row cart-footer">

            </div>
            </div>
        </section>
    </div>
    <!--//wrap-->
</main>
@include('sites._sections.footer')
@endsection
@section('script')
{{ Html::script('js/checkOut.js') }}
@endsection
</div>
