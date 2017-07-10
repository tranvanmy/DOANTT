@extends('admin.master')

@section('title')
    {{ trans('admin.post_manage') }}
@endsection

@section('style')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    {{ Html::style('bower/summernote/dist/summernote.css') }}
    <meta id="token" name="csrf-token" value="{{ csrf_token() }}">
@endsection
@section('breadcrumb')
    <h1>{{ trans('admin.post') }}</h1>
    <ul class="breadcrumb">
        <i class="ti-server panel-title"></i>
        <li class="next">
            <a href="{{ route('admin.') }}">{{ trans('admin.dashboard') }}</a>
        </li>
        <li class="next">
            <a>{{ trans('admin.post') }}</a>
    </ul>
@endsection

@section('content')
    <!-- Item Listing -->
    <section class="content p-l-r-15" id="manage-vue">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
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
                                                <th class="col-md-3">{{ trans('admin.title') }}</th>
                                                <th class="col-md-1">{{ trans('admin.author') }}</th>
                                                <th class="col-md-1">{{ trans('admin.description') }}</th>
                                                <th class="col-md-1">{{ trans('admin.category') }}</th>
                                                <th class="col-md-1">{{ trans('admin.status') }}</th>
                                                <th class="col-md-1">{{ trans('admin.action') }}</th>
                                            </thead>
                                            <tbody>                       
                                                <tr role="row" v-for="item in items">
                                                    <td>@{{ item.id }}</td>
                                                    <td><a data-toggle="modal" v-on:click="showItem(item)" type="button">@{{ item.title }}</a></td>
                                                    <td>
                                                    <a v-bind:href="'/admin/user/' + item.user.id">@{{ item.user.name }}</a></td>
                                                    <td>@{{ item.description }}</td>
                                                    <td v-for="category in categories">
                                                        <span v-for="name in category.categories" class="label label-primary">@{{ name.name }}</span>

                                                    </td>
                                                    <td v-if="item.status == null || item.status == 0">
                                                        <span class="">
                                                            <i class=" fa fa-eye-slash text-danger" aria-hidden="true" title="{{ trans('admin.not_show') }}"></i>
                                                        </span>
                                                    </td>
                                                    <td v-if="item.status == 1">
                                                        <span class="">
                                                            <i class="fa fa-eye text-primary" aria-hidden="true" title="{{ trans('admin.show') }}"></i>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="" v-on:click="editItem(item)">
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
                        <h4 class="modal-title" id="myModalLabel">{{ trans('admin.post_edit') }}: @{{ fillItem.title}}</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.id)">
                            <div class="form-group">
                                <label for="status">{{trans('admin.status') }}</label>
                                <select  name="status" class="input-sm" id="" v-model="fillItem.status" >
                                    <option value="1">{{ trans('admin.show') }}</option>
                                    <option value="0">{{ trans('admin.not_show') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">{{ trans('admin.post_update') }}</button>
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
                        <h4 class="modal-title col-md-3">@{{ show.title }}</h4>
                        <img :src="show.image" height="50px">
                    </div>
                    <div class="modal-body">
                        <p v-html="show.content"></p>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    {{-- <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script> --}}
    {{-- {{ Html::script('bower/ckeditor/ckeditor.js') }} --}}
    {{-- {{ Html::script('sites_custom/js/config.lfm.ckeditor.js') }} --}}
    {{ Html::script('admin/post.js') }}

@endsection
