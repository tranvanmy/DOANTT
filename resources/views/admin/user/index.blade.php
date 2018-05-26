@extends('admin.master')
@section('title')
Quản lý người dùng
@endsection
@section('style')
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <meta id="token" name="csrf-token" value="{{ csrf_token() }}">
@endsection
@section('breadcrumb')
     <h1>{{ trans('admin.subcrice') }}</h1>
    <ul class="breadcrumb">
        <i class="ti-server panel-title"></i>
        <li class="next">
            <a href="{{ route('admin.report') }}">{{ trans('admin.dashboard') }}</a>
        </li>
    </ul>
@endsection

@section('content')
    <!-- Item Listing -->
    <section class="content p-l-r-15" id="manage-vue">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                    <label>Tìm Kiếm</label>
                        <select name="status" class="input-sm" v-model="search">
                            <option v-bind:value="0">Theo Tên</option>
                            <option v-bind:value="1">Theo Quyền</option>
                            <option v-bind:value="2">Theo Cấp Bậc</option>
                        </select>
                        <input type="" v-if="search == 0" id="nameCooking" v-model="fillSearch.name" v-on:keyup="searchName">

                        <select  v-if="search == 1" name="status" class="input-sm" v-model="statusSearch.status" v-on:change="searchChange">
                            <option value="0">Khác Hàng</option>
                            <option value="1">Quản Lý</option>
                            <option value="2">Vô Hiệu Hóa</option>
                        </select>

                         <select  v-if="search == 2" name="status" class="input-sm" v-model="statusLevel.level" v-on:change="searchLevelChange">

                            <option value="#">All</option>
                            <option value="">Không có cấp</option>
                            <option value="1">{{ trans('admin.newbee') }}</option>
                            <option value="2">{{ trans('admin.taste') }}</option>
                            <option value="3">{{ trans('admin.cookee') }}</option>
                            <option value="4">{{ trans('admin.cheefee') }}</option>
                            <option value="5">{{ trans('admin.mastee') }}</option>
                        </select>
                        <span class="label label-success"> Tổng người dùng là :@{{ totalOrder }}</span>
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
                                                <th class="col-md-2">{{ trans('admin.name') }}</th>
                                                <th class="col-md-2">{{ trans('admin.gmail') }}</th>
                                                <th class="col-md-2">{{ trans('admin.phone') }}</th>
                                                <th class="col-md-1">{{ trans('admin.rank') }}</th>
                                                <th class="col-md-1">{{ trans('admin.rule') }}</th>
                                                <th class="col-md-1">{{ trans('admin.action') }}</th>
                                            </thead>
                                            <tbody>                       
                                                <tr v-for="item in items">
                                                    <td>@{{ item.id }}</td>
                                                    <td>
                                                        <a v-bind:href="'/site/profile/user/' + item.id" target="_blank">
                                                            @{{ item.name }}
                                                        </a>
                                                    </td>
                                                    <td>@{{ item.email }}</td>
                                                    <td>@{{ item.phone }}</td>
                                                    <td>
                                                        <span class="label label-primary" v-if="item.level">
                                                            @{{ item.level.name }}
                                                        </span>
                                                        <span class="label label-primary" v-else>
                                                            {{ trans('admin.noRank') }}
                                                        </span>
                                                    </td>
                                                    <td v-if="item.status == {{ config('permission.user') }}">
                                                        <span class="label label-success">
                                                        {{ trans('admin.customer') }}
                                                        </span>
                                                    </td>
                                                    <td v-if="item.status == {{ config('permission.admin') }}">
                                                        <span class="label label-success">
                                                        {{ trans('admin.admin') }}
                                                        </span>
                                                    </td>
                                                    <td v-if="item.status == {{ config('permission.disable') }}">
                                                        <span class="label label-danger">
                                                        {{ trans('admin.deleteUser') }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="btn btn-info" v-on:click="editItem(item)">
                                                           <i class="far fa-edit"></i> {{ trans('admin.edit') }}
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

                                <div id="paginationName"> 
                                <nav class="dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li v-if="pagination.current_page > 1">
                                            <a href="#"
                                               @click.prevent="changePageName(pagination.current_page - 1)">
                                                <span aria-hidden="true">«</span>
                                            </a>
                                        </li>
                                        <li v-for="page in pagesNumber"
                                            v-bind:class="[ page == isActived ? 'active' : '']">
                                            <a href="#"
                                               @click.prevent="changePageName(page)">@{{ page }}</a>
                                        </li>
                                        <li v-if="pagination.current_page < pagination.last_page">
                                            <a href="#"
                                               @click.prevent="changePageName(pagination.current_page + 1)">
                                                <span aria-hidden="true">»</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                </div>

                                <div id="paginationStatus"> 
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

                                <div id="paginationLevel"> 
                                <nav class="dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li v-if="pagination.current_page > 1">
                                            <a href="#"
                                               @click.prevent="changePageLevel(pagination.current_page - 1)">
                                                <span aria-hidden="true">«</span>
                                            </a>
                                        </li>
                                        <li v-for="page in pagesNumber"
                                            v-bind:class="[ page == isActived ? 'active' : '']">
                                            <a href="#"
                                               @click.prevent="changePageLevel(page)">@{{ page }}</a>
                                        </li>
                                        <li v-if="pagination.current_page < pagination.last_page">
                                            <a href="#"
                                               @click.prevent="changePageLevel(pagination.current_page + 1)">
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
        <!-- Edit Item Modal -->

        <div class="modal fade" id="edit-item" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('admin.post_edit') }} : @{{ fillItem.title}}</h4>
                    </div>
                    <div class="modal-body">
                       <div class="form-group">
                        <label for="status">{{trans('admin.rank') }}</label>
                        <select  name="level_id" class="input-sm rankUser" id="" v-model="fillItem.level_id">
                            <option V-bind:value="1">{{ trans('admin.newbee') }}</option>
                            <option v-bind:value="2">{{ trans('admin.taste') }}</option>
                            <option v-bind:value="3">{{ trans('admin.cookee') }}</option>
                            <option v-bind:value="4">{{ trans('admin.cheefee') }}</option>
                            <option v-bind:value="5">{{ trans('admin.mastee') }}</option>
                        </select>
                        <label for="status">{{trans('admin.status') }}</label></td>
                            <select  name="status" class="input-sm statusUser" id="" v-model="fillItem.status" >
                                <option v-bind:value="0">{{ trans('admin.customer') }}</option>
                                <option v-bind:value="1">{{ trans('admin.admin') }}</option>
                                <option v-bind:value="2">Vô hiệu hóa</option>
                            </select>
                                   
                    </div>
                    <div class="modal-footer ">
                        <a href="javascript:void(0)"  data-dismiss="modal"  class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> {{ trans('admin.no') }}
                        </a>
                        <button type="submit" class="btn btn-success" v-on:click="updateItem(fillItem.id)">{{ trans('admin.post_update') }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Show Item Modal -->
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
                            <label for="name">{{ trans('admin.name') }}</label>
                            <input type="text" name="name" class="form-control" v-model="newItem.name" />
                            <span v-if="formErrors['name']" class="error text-danger">@{{ formErrors['name'][0] }}</span><br>

                            <label for="name">{{ trans('admin.gmail') }}</label>
                            <input type="text" name="email" class="form-control" v-model="newItem.email" />
                            <span v-if="formErrors['email']" class="error text-danger">@{{ formErrors['email'][0] }}</span><br>

                            <label for="name">{{ trans('admin.phone') }}</label>
                            <input type="text" name="phone" class="form-control" v-model="newItem.phone" />
                            <span v-if="formErrors['phone']" class="error text-danger">@{{ formErrors['phone'][0] }}</span><br>

                            <label for="name">{{ trans('admin.password') }}</label>
                            <input type="text" name="password" class="form-control" v-model="newItem.password" />
                            <span v-if="formErrors['password']" class="error text-danger">@{{ formErrors['password'][0] }}</span><br>

                            <label for="name">{{ trans('admin.confirm_pass') }}</label>
                            <input type="text" name="confirm_pass" class="form-control" v-model="newItem.confirm_pass" />
                            <span v-if="formErrors['confirm_pass']" class="error text-danger">@{{ formErrors['confirm_pass'][0] }}</span><br>
                            <td>
                                <img class="icon-category" id="new-image-preview">
                                <span class="input-group-btn">
                                    <a id="new-image" data-input="name-new-image" data-preview="new-image-preview" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> {{ trans('admin.choose_image') }}</a>
                                </span>
                                    <input id="name-new-image" style="display: none;" type="text" name="filepath">
                                </td>
                                <br>
                                <table>
                                    <tr>
                                        <td>
                                            <label for="status">{{trans('admin.rank') }}</label>
                                        </td>
                                        <td></td>
                                        <td>
                                            <select  name="level_id" class="input-sm rankUser" id="" v-model="newItem.level_id" >
                                                <option value="1">{{ trans('admin.newbee') }}</option>
                                                <option value="2">{{ trans('admin.taste') }}</option>
                                                <option value="3">{{ trans('admin.cookee') }}</option>
                                                <option value="4">{{ trans('admin.cheefee') }}</option>
                                                <option value="5">{{ trans('admin.mastee') }}</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                                <br/>
                                <table>
                                    <tr>
                                        <td>
                                            <label for="status">{{trans('admin.status') }}</label></td>
                                            <td>
                                                <select  name="status" class="input-sm statusUser" id="" v-model="newItem.status" >
                                                    <option value="0">{{ trans('admin.customer') }}</option>
                                                    <option value="1">{{ trans('admin.admin') }}</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                    <br/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">{{ trans('admin.category_create') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
@section('script')
    {{ Html::script('admin/user.js') }}
@endsection
