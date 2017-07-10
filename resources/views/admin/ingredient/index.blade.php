@extends('admin.master')

@section('title')
    {{ trans('admin.ingredient_manage') }}
@endsection

@section('style')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    {{ Html::style('bower/summernote/dist/summernote.css') }}
    <meta id="token" name="csrf-token" value="{{ csrf_token() }}">
@endsection
@section('breadcrumb')
    <h1>{{ trans('admin.ingredient') }}</h1>
    <ul class="breadcrumb">
        <i class="ti-server panel-title"></i>
        <li class="next">
            <a href="{{ route('admin.') }}">{{ trans('admin.dashboard') }}</a>
        </li>
        <li class="next">
            <a>{{ trans('admin.ingredient') }}</a>
    </ul>
@endsection

@section('content')
    <!-- Item Listing -->
    <section class="content p-l-r-15" id="manage-vue">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <button  type="button" class="btn btn-success" data-toggle="modal" v-on:click="addItem">
                            <i class="ti-plus"></i>{{ trans('admin.create') }}
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
                                                <th class="col-md-1">{{ trans('admin.type') }}</th>
                                                <th class="col-md-1">{{ trans('admin.image') }}</th>
                                                <th class="col-md-1">{{ trans('admin.status') }}</th>
                                                <th class="col-md-1">{{ trans('admin.action') }}</th>
                                            </thead>
                                            <tbody>                       
                                                <tr role="row" v-for="item in items">
                                                    <td>@{{ item.id }}</td>
                                                    <td><a data-toggle="modal" v-on:click="showItem(item)" type="button">@{{ item.name }}</a></td>
                                                    <td v-if="item.type == 0">
                                                        <span class="label label-danger">{{ trans('admin.ingredient_main') }}</span>
                                                    </td>
                                                    <td v-if="item.type == 1">
                                                        <span class="label label-primary">{{ trans('admin.ingredient_sub') }}</span>
                                                    </td>
                                                    <td><img class="icon-ingredient" v-bind:src="item.image" alt="" height="100px"></td>
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
                                                        <span class="" v-on:click="comfirmDeleteItem(item)">
                                                            <i class="fa fa-fw ti-close text-danger actions_icon" title="{{ trans('admin.delete') }}"></i>
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
        <!-- Create Item Modal -->
        <div class="modal fade" id="create-item" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('admin.ingredient_new') }}</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="createItem">
                            <div class="form-group">
                                <label>{{ trans('admin.ingredient_name') }}</label>
                                <input type="text" name="name" class="form-control" v-model="newItem.name" placeholder="{{ trans('admin.ingredient_name') }}" />
                                <span v-if="formErrors['name']" class="error text-danger">@{{ formErrors['name'][0] }}</span>
                                <br>
                                <label>{{ trans('admin.ingredient_description') }}</label>
                                <textarea class="ckeditor" name="description" id="my-editor" v-model="newItem.description"></textarea>
                                <span v-if="formErrors['description']" class="error text-danger">@{{ formErrors['description'][0] }}</span><br>
                                <div>
                                    <img class="image-ingredient" id="new-image-preview">
                                    <span class="input-group-btn">
                                        <a id="new-image" data-input="name-new-image" data-preview="new-image-preview" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> {{ trans('admin.choose_feature_image') }}</a>
                                    </span>
                                    <input id="name-new-image" hidden class="" type="text" name="filepath">
                               </div>
                                <table>
                                    <tr>
                                        <td><label for="type">{{trans('admin.ingredient_type') }}</label></td>
                                        <td>
                                            <select  class="input-sm" name="type" id="" v-model="newItem.type" >
                                                <option v-bind:value="0">{{ trans('admin.ingredient_main') }}</option>
                                                <option v-bind:value="1">{{ trans('admin.ingredient_sub') }}</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="status">{{trans('admin.status') }}</label></td>
                                        <td>
                                            <select  name="status" class="input-sm" id="" v-model="newItem.status" >
                                                <option value="1">{{ trans('admin.show') }}</option>
                                                <option value="0">{{ trans('admin.not_show') }}</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">{{ trans('admin.ingredient_create') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- comfirm delete item -->
        <div class="modal fade" id="delete-item" role="dialog" aria-labelledby="Heading" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                        </button>
                        <h4 class="modal-title custom_align" id="Heading">{{ trans('admin.ingredient_delete') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            <span class="glyphicon glyphicon-warning-sign"></span>
                            {{ trans('admin.ingredient_comfirm_delete') . ': ' }} @{{ deleteItem.name }}
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <a href="javascript:void(0)" v-on:click="delItem(deleteItem.id)" class="btn btn-danger">
                            <span class="glyphicon glyphicon-ok-sign"></span> {{ trans('admin.yes') }}
                        </a>
                        <button type="button" class="btn btn-success" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span> {{ trans('admin.no') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Item Modal -->
        <div class="modal fade" id="edit-item" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('admin.ingredient_edit') }}</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.id)">
                            <div class="form-group">
                                <label for="name">{{ trans('admin.ingredient_name') }}</label>
                                <input type="text" name="name" class="form-control" v-model="fillItem.name" />
                                <span v-if="formErrorsUpdate['name']" class="error text-danger">@{{ formErrorsUpdate['name'][0] }}</span>
                                <br>
                                <label for="description">{{ trans('admin.ingredient_description') }}</label>
                                <textarea class="ckeditor" name="description-edit" id="my-editor-edit" v-model="fillItem.description" ></textarea>
                                <span v-if="formErrorsUpdate['description']" class="error text-danger">@{{ formErrorsUpdate['description'][0] }}</span>
                                <br>
                                <label for="image">{{ trans('admin.ingredient_image') }}
                                </label>
                                <div>
                                    <img id="edit-image-preview">
                                    <span class="input-group-btn">
                                        <a id="edit-image" data-input="name-edit-image" data-preview="edit-image-preview" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> {{ trans('admin.choose_image') }}</a>
                                    </span>
                                    <input id="name-edit-image" class="" type="text" name="filepath">
                                </div>
                                <table>
                                    <tr>
                                        <td><label for="type">{{trans('admin.ingredient_type') }}</label></td>
                                        <td>
                                            <select  class="input-sm" name="type" id="" v-model="fillItem.type" >
                                                <option v-bind:value="0">{{ trans('admin.ingredient_main') }}</option>
                                                <option v-bind:value="1">{{ trans('admin.ingredient_sub') }}</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="status">{{trans('admin.status') }}</label></td>
                                        <td>
                                            <select  name="status" class="input-sm" id="" v-model="fillItem.status" >
                                                <option value="1">{{ trans('admin.show') }}</option>
                                                <option value="0">{{ trans('admin.not_show') }}</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">{{ trans('admin.ingredient_update') }}</button>
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
                        <img :src="show.image" height="50px" class="col-md-5">
                    </div>
                    <div class="modal-body">
                        <p v-html="show.description"></p>
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
    {{ Html::script('admin/ingredient.js') }}

@endsection
