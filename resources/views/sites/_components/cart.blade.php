@extends('sites.master')
@section('style')
{!! Html::style('css/custom_cooking_detail.css') !!}
@endsection
@section('content')
@include('sites._sections.header')
<main class="main not-home" role="main">
    <div class="clearfix wrap">
        <div class="container">
    <div class="row" id="main-cart">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ trans('sites.product') }}</th>
                        <th>{{ trans('sites.quantity') }}</th>
                        <th class="text-center">{{ trans('sites.price') }}</th>
                        <th class="text-center">{{ trans('sites.total') }}</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="cooking in cookings">
                        <td class="col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" v-bind:src="cooking.image" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">@{{ cooking.name }}</a></h4>
                                <h5 class="media-heading"> by <a v-bind:href="'/site/profile/user/' + cooking.user.id">@{{ cooking.user.name }}</a></h5>
                            </div>
                        </div></td>
                        <td class="col-md-1" style="text-align: center">
                        <input type="number" class="form-control" id="exampleInputEmail1" v-bind:value="cart[cooking.id]" v-model="cart[cooking.id]" min = "1" v-on:change="updateCart(cooking.id)">
                        </td>
                        <td class="col-md-1 text-center"><strong>@{{ cooking.price }}đ</strong></td>
                        <td class="col-md-1 text-center"><strong>@{{ cart[cooking.id] * cooking.price }}đ</strong></td>
                        <td class="col-md-1">
                        <button type="button" class="btn btn-danger" v-on:click="deleteCart(cooking.id)">
                            <span class="glyphicon glyphicon-remove"></span>{{ trans('sites.remove') }}
                        </button></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>{{ trans('sites.total') }}</h5></td>
                        <td class="text-right"><h5><strong>@{{ total }}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>{{ trans('sites.estimated_shipping') }}</h5></td>
                        <td class="text-right"><h5><strong>0đ</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>{{ trans('sites.total') }}</h3></td>
                        <td class="text-right"><h3><strong>@{{ total }}đ</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span><a href="/">{{ trans('sites.continue_shopping') }}</a>
                        </button></td>
                        <td>
                        <a type="button" v-if="cookings" class="btn btn-success" href="/checkout">
                            {{ trans('sites.checkout') }} <span class="glyphicon glyphicon-play"></span>
                        </a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
    </div>
</main>

@include('sites._sections.category_footer')
@include('sites._sections.footer')

@endsection
@section('script')
    {!! Html::script('sites_custom/js/show_cart.js') !!}
@endsection
