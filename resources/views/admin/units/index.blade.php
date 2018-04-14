@extends('admin.master')

@section('title')
    Đơn Vị
@endsection 

@section('style')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    {{ Html::style('bower/summernote/dist/summernote.css') }}
    <meta id="token" name="csrf-token" value="{{ csrf_token() }}">
@endsection
@section('breadcrumb')
    <h1>Danh sách đơn vị</h1>
@endsection

@section('content')
    <!-- Item Listing -->
    <section class="content p-l-r-15" id="manage-vue">
        <div class="row" id="unit_amdin">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <button class="btn btn-success" v-on:click="addUnit">
                            <i class="fa fa-sign-in" aria-hidden="true"></i> Thêm Đơn Vị
                        </button>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div id="table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable no-footer" id="table" role="grid" aria-describedby="table_info">
                                            <thead>
                                                <tr class="filters" role="row">
                                                <th class="col-md-1">{{ trans('admin.id') }}</th>
                                                <th class="col-md-2">Tên Đơn Vị</th>
                                                <th class="col-md-1">Trạng Thái</th>
                                                <th class="col-md-1">Hành Động</th>
                                            </thead>
                                            <tbody>
                                                <tr role="row" v-for="item in items">
                                                    <td>@{{ item.id }}</td>
                                                    <td>
                                                       @{{ item.name }}
                                                    </td>
                                                    <td>
                                                        <span v-if="item.status == 1" class="action_unit badge badge-pill badge-success" >
                                                           Hoạt Động
                                                        </span>
                                                        <span v-else class="action_unit label label-danger" >
                                                           Đang Chờ
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="btn btn-info" v-on:click="updateUnit(item)">
                                                           <i class="fa fa-edit" aria-hidden="true"></i> Cập Nhật
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Pagination -->
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
                            <!-- comfirm delete item -->
                            <div class="modal fade" id="delete-item" tabindex="-1" role="dialog" aria-labelledby="Heading" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                            </button>
                                            <h4 class="modal-title custom_align" id="Heading">Cập Nhật Đơn Vị</h4>
                                        </div>
                                        <div class="modal-body">
                                            <label for="name">Tên Đơn Vị</label>
                                            <input type="text" name="name" class="form-control" v-model="update.name"/>
                                            <br>
                                            <div class="form-group">
                                                <label for="sel1">Trạng Thái</label>
                                                <select class="form-control" id="sel1" v-model="update.status">
                                                    <option v-bind:value="1">Hoạt Động</option>
                                                    <option v-bind:value="0">Đang Chờ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer ">
                                            <button type="button" class="btn btn-success"  v-on:click="editUnit(update.id)">
                                                <span class="glyphicon glyphicon-ok-sign"></span> {{ trans('admin.yes') }}
                                            </button>
                                            <a href="javascript:void(0)"  data-dismiss="modal"  class="btn btn-danger">
                                                 <span class="glyphicon glyphicon-remove"></span> {{ trans('admin.no') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>

                        </div>
                                {{-- modal add unit --}}
                        <div class="modal fade" id="add_unit" tabindex="-1" role="dialog" aria-labelledby="Heading" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                        </button>
                                        <h4 class="modal-title custom_align" id="Heading">Thêm Đơn Vị</h4>
                                    </div>
                                    <div class="modal-body">
                                        <label for="name">Tên Đơn Vị</label>
                                        <input type="text" name="name" class="form-control" v-model="newItem.name"/>
                                    </div>
                                    <div class="modal-footer ">
                                        <a href="javascript:void(0)" v-on:click="createUnit()" class="btn btn-success">
                                            <span class="glyphicon glyphicon-ok-sign"></span> {{ trans('admin.yes') }}
                                        </a>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            <span class="glyphicon glyphicon-remove"></span> {{ trans('admin.no') }}
                                        </button>
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
    {{ Html::script('admin/unit.js') }}
@endsection
