@extends('admin.master')

@section('title')
    {{ trans('admin.cooking_manage') }}
@endsection

@section('style')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    {{ Html::style('bower/summernote/dist/summernote.css') }}
    <meta id="token" name="csrf-token" value="{{ csrf_token() }}">
@endsection
@section('breadcrumb')
    <h1>{{ trans('admin.cooking') }}</h1>
    <ul class="breadcrumb">
        <i class="ti-server panel-title"></i>
        <li class="next">
            <a href="{{ route('admin.report') }}">{{ trans('admin.dashboard') }}</a>
        </li>
        <li class="next">
            <a>{{ trans('admin.cooking') }}</a>
    </ul>
@endsection

@section('content')
    <!-- Item Listing -->
    <section class="content p-l-r-15" id="manage-vue">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
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
                                                <th class="col-md-3">{{ trans('admin.name') }}</th>
                                                <th class="col-md-3">{{ trans('admin.description') }}</th>
                                                <th class="col-md-1">{{ trans('admin.image') }}</th>
                                                <th class="col-md-1">{{ trans('admin.category') }}</th>
                                                <th class="col-md-1">{{ trans('admin.status') }}</th>
                                                <th class="col-md-1">{{ trans('admin.action') }}</th>
                                            </thead>
                                            <tbody>                       
                                                <tr role="row" v-for="cooking in cookings">
                                                    <td>@{{ cooking.id }}</td>
                                                    <td><a data-toggle="modal" v-on:click="showCooking(cooking)" type="button">@{{ cooking.name }}</a></td>
                                                    <td><p class="ellipis">@{{ cooking.description }}</p></td>
                                                    <td><img class="icon-ingredient" v-bind:src="'/' + cooking.image" alt="" height="100px"></td>
                                                    <td>
                                                        <span v-for="category in cooking.categories" class="label label-primary">@{{ category.name }}</span>
                                                    </td>
                                                    <td v-if="cooking.status == 0">
                                                        <span class="">
                                                            <i class=" fa fa-pause text-danger" aria-hidden="true" title="{{ trans('admin.pending') }}"></i>
                                                        </span>
                                                    </td>
                                                    <td v-if="cooking.status == 1">
                                                        <span class="">
                                                            <i class="fa fa-check text-success" aria-hidden="true" title="{{ trans('admin.passed') }}"></i>
                                                        </span>
                                                    </td>
                                                    <td v-if="cooking.status == 2">
                                                        <span class="">
                                                            <i class="fa fa-pencil-square-o text-default" aria-hidden="true" title="{{ trans('admin.editing') }}"></i>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="" v-on:click="editCooking(cooking)">
                                                            <i class="fa fa-fw ti-pencil text-primary actions_icon" title="{{ trans('admin.edit') }}"></i>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Item Modal -->
        <div class="modal fade" id="edit-item" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('admin.cooking_edit') }}: @{{ fillItem.name}}</h4>
                    </div>
                    <div class="modal-body">
                        <form method="PUT" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.id)">
                            <div class="form-group">
                                <label for="status">{{trans('admin.status') }}</label>
                                <select  name="status" class="input-sm" id="" v-model="fillItem.status" >
                                    <option value="1">{{ trans('admin.pass') }}</option>
                                    <option value="0">{{ trans('admin.pending') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">{{ trans('admin.cooking_update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Show Item Modal -->
        <div id="center_modal" class="modal fade animated position_modal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title col-md-3">@{{ show.name }}</h4>
                        <img :src="'/' + show.image" height="50px">
                    </div>
                    <div class="modal-body">
                        <ol>
                            <li v-for="step in show.steps">
                            @{{ step.content }}
                            <img :src="'/' + step.image" width="750px">
                            </li>
                        </ol>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
    {{ Html::script('bower/ckeditor/ckeditor.js') }}
    {{ Html::script('sites_custom/js/config.lfm.ckeditor.js') }}
    {{ Html::script('admin/cooking.js') }}

@endsection
