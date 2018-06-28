@extends('admin.master')

@section('title')
Quản lý đơn hàng
@endsection

@section('style')
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
{{ Html::style('bower/summernote/dist/summernote.css') }}
<meta id="token" name="csrf-token" value="{{ csrf_token() }}">
@endsection
@section('breadcrumb')
<h1>{{ trans('admin.order') }}</h1>
<ul class="breadcrumb">
    <i class="ti-server panel-title"></i>
    <li class="next">
        <a href="{{ route('admin.report') }}">{{ trans('admin.dashboard') }}</a>
    </li>
    <li class="next">
        <a>{{ trans('admin.order') }}</a>
    </ul>
    @endsection

    @section('content')
    <!-- order Listing -->
    <section class="content p-l-r-15" id="manage-order">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <label>Tìm Kiếm</label>
                        <select name="status" class="input-sm" v-model="statusSearch.status" v-on:change="searchChange">
                            <option value="3">All</option>
                            <option value="0">Đang Chờ</option>
                            <option value="1">Hiển Thị</option>
                        </select>
                         <span class="label label-success"> Tổng số đơn hàng là :@{{ totalOrder }}</span>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div id="table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable no-footer" id="table" role="grid">
                                            <thead>
                                                <tr class="filters" role="row">
                                                    <th class="col-md-1">{{ trans('admin.id') }}</th>
                                                    <th class="col-md-1">Người đặt hàng</th>
                                                    <th class="col-md-1">Đia Chỉ</th>
                                                    <th class="col-md-1">Người bán hàng</th>
                                                    <th class="col-md-1">{{ trans('admin.status') }}</th>
                                                    <th class="col-md-1">{{ trans('admin.action') }}</th>
                                                </thead>
                                                <tbody>
                                                    <tr role="row" v-for="order in orders">
                                                        <td>@{{ order.id }}</td>
                                                        <td>
                                                            <a v-bind:href="'/site/profile/user/' + order.user.id" target="_blank">
                                                                @{{ order.user.name }}
                                                            </a>
                                                        </td>
                                                        <td>@{{ order.address }}</td>
                                                        <td v-for="cookingdetail in order.order_detail">
                                                            <a v-bind:href="'/site/profile/user/' + cookingdetail.cooking.user.id" target="_blank">
                                                                @{{ cookingdetail.cooking.user.name }}
                                                            </a>
                                                        </td>

                                                            <td v-if="order.status == 0">
                                                                <span class="label label-warning">
                                                                    {{ trans('sites.pending') }}
                                                                </span>
                                                            </td>
                                                            <td v-if="order.status == 1">
                                                                <span class="label label-success">
                                                                    {{ trans('sites.success') }}
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="btn btn-info" v-on:click="showOrder(order)">
                                                                    <i class="fa fa-edit" aria-hidden="true"></i> Chi Tiết Đơn Hàng
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- Pagination -->
                                        <div id="paginationIndex">
                                            <nav class="dataTables_paginate paging_simple_numbers">
                                                <ul class="pagination">
                                                    <li v-if="pagination.current_page > 1">
                                                        <a href="#"
                                                        @click.prevent="changePage(pagination.current_page - 1)">
                                                    <span aria-hidden="true">«</span>
                                                </a>
                                            </li>
                                            <li v-for="page in pagesNumber"
                                            v-bind:class="[ page == isActived ? 'active' : '']">
                                            <a href="#"
                                            @click.prevent="changePage(page)">@{{ page }}</a>
                                        </li>
                                        <li v-if="pagination.current_page < pagination.last_page">
                                            <a href="#"
                                            @click.prevent="changePage(pagination.current_page + 1)">
                                            <span aria-hidden="true">»</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <div id="paginationSearchStatus">
                                <nav class="dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li v-if="pagination.current_page > 1">
                                            <a href="#"
                                            @click.prevent="changePageStatus(pagination.current_page - 1)">
                                        <span aria-hidden="true">«</span>
                                    </a>
                                </li>
                                <li v-for="page in pagesNumber"
                                v-bind:class="[ page == isActived ? 'active' : '']">
                                <a href="#"
                                @click.prevent="changePageStatus(page)">@{{ page }}</a>
                            </li>
                            <li v-if="pagination.current_page < pagination.last_page">
                                <a href="#"
                                @click.prevent="changePageStatus(pagination.current_page + 1)">
                                <span aria-hidden="true">»</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit order Modal -->
    <div class="modal fade" id="show-order" role="dialog">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">CHI TIẾT ĐƠN HÀNG | TRẠNG THÁI
                        <span v-if="order.status == 1" class="label label-success">{{ trans('sites.success') }}</span>
                        <span v-if="order.status == 0" class="label label-warning">{{ trans('sites.pending') }}</span>
                    </h4>
                </div>
                <div class="modal-body clearfix">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="invoice-title">
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <address>
                                            <strong>{{ trans('sites.order_infomation') }}:</strong><br>
                                            Name: @{{ order.name }}<br>
                                            Email: @{{ order.email }}<br>
                                            Phone: @{{ order.phone }}<br>
                                            Address: @{{ order.address }}
                                        </address>
                                    </div>
                                    <div class="col-xs-6">
                                            <address>
                                                <strong>Phương Thức Thanh Toán:</strong><br>
                                                Vận chuyển tận nhà. Thanh toán khi nhận hàng
                                            </address>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <address>
                                            <strong>{{ trans('sites.order_date') }}:</strong><br>
                                            @{{ order.created_at }}<br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><strong>Sản Phẩm</strong></h3>
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
                                                    <tr v-for="orderDetail in orderDetails">
                                                        <td>
                                                            <a  v-bind:href="'/site/cooking/' + orderDetail.cooking.id" target="_blank">
                                                                    @{{ orderDetail.cooking.name }}
                                                            </a>
                                                        </td>
                                                        <td class="text-center">@{{ orderDetail.price / orderDetail.quantity }}</td>
                                                        <td class="text-center">@{{ orderDetail.quantity }}</td>
                                                        <td class="text-right">@{{ orderDetail.price }}</td>
                                                    </tr>
                                                    </tr>
                                                    <tr>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line text-center"><strong>{{ trans('sites.total') }}</strong></td>
                                                        <td class="thick-line text-right">@{{ order.total }}</td>
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
                                                        <td class="no-line text-center"><strong>Tổng Tiền</strong></td>
                                                        <td class="no-line text-right">@{{ order.total }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <button class="btn btn-info"  @click.prevent="print()">In</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')

{{ Html::script('admin/order.js') }}

@endsection
