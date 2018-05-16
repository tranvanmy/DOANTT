@extends('admin.master')
@section('title')
{{ trans('admin.category_manage') }}
@endsection
@section('style')
{!! Html::style('admin/css/category.css') !!}
@endsection
@section('breadcrumb')
<h1>{{ trans('admin.ingredient') }}</h1>
<ul class="breadcrumb">
   <i class="ti-server panel-title"></i>
   <li class="next">
      <a href="{{ route('admin.report') }}">{{ trans('admin.dashboard') }}</a>
   </li>
   <li class="next">
      <a>{{ trans('admin.category') }}</a>
</ul>
@endsection
@section('content')
<section id="manage-vue" class="content p-l-r-15">
   <div class="row">
   <div class="col-md-7">
      <div class="panel">
         <div class="panel-heading">
            <button  type="button" class="btn btn-success" data-toggle="modal" v-on:click="addItem">
            {{ trans('admin.category_create') }}
            </button>
         </div>
         <div class="panel-body">
            <div class="table-responsive">
               <div id="table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                  <div class="row">
                     <div class="col-sm-12">
                        <table id="table" role="grid" class="table table-bordered dataTable no-footer">
                           <thead>
                              <tr role="row" class="filters">
                                 <th class="col-md-1">{{ trans('admin.id') }}</th>
                                 <th class="col-md-1">{{ trans('admin.icon') }}</th>
                                 <th class="col-md-1">{{ trans('admin.name') }}</th>
                                 <th class="col-md-1">{{ trans('admin.status') }}</th>
                                 <th class="col-md-1">{{ trans('admin.action') }}</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr v-for="item in items">
                                 <td>@{{ item.id }}</td>
                                 <td><img class="icon-category" v-bind:src="item.icon" alt=""></td>
                                 <td>@{{ item.name }}</td>
                                 <td v-if="item.status == null || item.status == 0"><span class=""><i class=" fa fa-eye-slash text-danger" aria-hidden="true" title="{{ trans('admin.not_show') }}"></i></span></td>
                                 <td v-if="item.status == 1"><span class=""><i class="fa fa-eye text-primary" aria-hidden="true" title="{{ trans('admin.show') }}"></i></span></td>
                                 <td v-if="item.status == 2"><span class=""><i class="fa fa-home text-success" aria-hidden="true" title="{{ trans('admin.in_home_page') }}"></i></span></td>
                                 <td>
                                    <span class="btn btn-info" v-on:click="editItem(item)">
                                        <i class="fa fa-edit" aria-hidden="true"></i> Cập Nhật
                                    </span>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        </div>
                     </div>
                     <div id="paginationName">
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
                     </div>
                     <!-- Create Item Modal -->
                     <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                 <h4 class="modal-title" id="myModalLabel">{{ trans('admin.category_new') }}</h4>
                              </div>
                              <div class="modal-body">
                                 <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="createItem">
                                    <div class="form-group">
                                       <label for="name">{{ trans('admin.category_name') }}</label>
                                       <input type="text" name="name" class="form-control" v-model="newItem.name" />
                                       <span v-if="formErrors['name']" class="error text-danger">@{{ formErrors['name'][0] }}</span><br>
                                       <table>
                                          <tr>
                                             <td><label for="parent_id">{{trans('admin.category_parent') }}</label></td>
                                             <td>
                                                <select  class="input-sm" name="parent_id" id="" v-model="newItem.parent_id" >
                                                   <option value="">{{trans('admin.none') }}</option>
                                                   <option v-for="item in items" v-bind:value=" item.id">@{{ item.name }}</option>
                                                </select>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td><label for="status">{{trans('admin.status') }}</label></td>
                                             <td>
                                                <select  name="status" class="input-sm" id="" v-model="newItem.status" >
                                                   <option value="1">{{ trans('admin.show') }}</option>
                                                   <option value="0">{{ trans('admin.not_show') }}</option>
                                                   <option value="2">{{ trans('admin.in_home_page') }}</option>
                                                </select>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>{{ trans('admin.icon') }}</td>
                                             <td>
                                                <img class="icon-category" id="new-image-preview">
                                                <span class="input-group-btn">
                                                <a id="new-image" data-input="name-new-image" data-preview="new-image-preview" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> {{ trans('admin.choose_image') }}</a>
                                                </span>
                                                <input id="name-new-image" class="" type="text" name="filepath">
                                             </td>
                                          </tr>
                                       </table>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" class="btn btn-success">{{ trans('admin.category_create') }}</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- comfirm delete item -->
                     <div class="modal fade" id="delete-item" tabindex="-1" role="dialog" aria-labelledby="Heading" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                 </button>
                                 <h4 class="modal-title custom_align" id="Heading">Delete User</h4>
                              </div>
                              <div class="modal-body">
                                 <div class="alert alert-danger">
                                    <span class="glyphicon glyphicon-warning-sign"></span> {{ trans('admin.category_comfirm_delete') . ': ' }} @{{ deleteItem.name }}
                                 </div>
                              </div>
                              <div class="modal-footer ">
                                 <a href="javascript:void(0)" v-on:click="delItem(deleteItem.id)" class="btn btn-danger">
                                 <span class="glyphicon glyphicon-ok-sign"></span> Yes
                                 </a>
                                 <button type="button" class="btn btn-success" data-dismiss="modal">
                                 <span class="glyphicon glyphicon-remove"></span> No
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Edit Item Modal -->
                     <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                 <h4 class="modal-title" id="myModalLabel">{{ trans('admin.category_edit') }}</h4>
                              </div>
                              <div class="modal-body">
                                 <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.id)">
                                    <div class="form-group">
                                       <label for="name">{{ trans('admin.category_name') }}</label>
                                       <input type="text" name="name" class="form-control" v-model="fillItem.name" />
                                       <span v-if="formErrorsUpdate['name']" class="error text-danger">@{{ formErrorsUpdate['name'][0] }}</span><br>
                                       <label for="status">{{ trans('admin.status') }}</label>
                                       <select  name="status" class="input-sm" id="" v-model="fillItem.status" class="input-sm">
                                          <option value="1">{{ trans('admin.show') }}</option>
                                          <option value="0">{{ trans('admin.not_show') }}</option>
                                          <option value="2">{{ trans('admin.in_home_page') }}</option>
                                       </select>
                                       <div>
                                          <img id="edit-image-preview" style="margin-top:15px;max-height:100px;">
                                          <span class="input-group-btn">
                                          <a id="edit-image" data-input="name-edit-image" data-preview="edit-image-preview" class="btn btn-primary">
                                          <i class="fa fa-picture-o"></i> {{ trans('admin.choose_image') }}</a>
                                          </span>
                                          <input id="name-edit-image" class="" type="text" name="filepath">
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" class="btn btn-success">{{ trans('admin.category_update') }}</button>
                                    </div>
                                 </form>
                              </div>
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
<script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
{{ Html::script('admin/category.js') }}
@endsection