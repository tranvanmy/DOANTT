@extends('admin.master')

@section('title')
    Nguyên Liệu
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
            <a href="{{ route('admin.report') }}">{{ trans('admin.dashboard') }}</a>
        </li>
    </ul>
@endsection

@section('content')
    <!-- Item Listing -->
    <section class="content p-l-r-15" id="manage-vue">
            <button  type="button" class="btn btn-success" data-toggle="modal" v-on:click="addItem" style="margin-top: 6px; margin-left: 10px;">
                <i class="ti-plus"></i> {{ trans('admin.create') }}
            </button>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <label>Tìm Kiếm</label>
                        <select name="status" class="input-sm" v-model="search">
                            <option v-bind:value="1">Theo Tên</option>
                            <option v-bind:value="0">Theo Trạng Thái</option>
                            <option v-bind:value="2">Theo Nguyên Liệu</option>
                        </select>
                            
                        <input type="" v-if="search == 1" id="nameCooking" v-model="fillSearch.name" v-on:keyup="searchName">

                        <select  v-if="search == 0" name="status" class="input-sm" v-model="statusSearch.status" v-on:change="searchChange" style="margin-left: 30px;">
                            <option value="3">Tât Cả</option>
                            <option value="0">Đang Chờ</option>
                            <option value="1">Hiển Thị</option>
                        </select>

                         <select  v-if="search == 2" name="status" class="input-sm" v-model="statusInter.status" v-on:change="searchChangeInter" style="margin-left: 30px;">
                            <option value="3">Tât Cả</option>
                            <option value="0">Nguyên Liệu Chính</option>
                            <option value="">Nguyên Liệu Người Dùng</option>
                            <option value="1">Gia Vị</option>
                        </select>

                         <span class="label label-success"> Tổng nguyên liệu là : @{{ totalOrder }}</span>
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
                                                <th class="col-md-1">{{ trans('admin.name') }}</th>
                                                <th class="col-md-1">Thể loại</th>
                                                <th class="col-md-1">{{ trans('admin.status') }}</th>
                                                <th class="col-md-1">{{ trans('admin.action') }}</th>
                                            </thead>
                                            <tbody>
                                                <tr role="row" v-for="item in items">
                                                    <td>@{{ item.id }}</td>
                                                    <td>@{{ item.name }}</td>
                                                    <td v-if="item.type == 0">
                                                        <span class="label label-success">{{ trans('admin.ingredient_main') }}</span>
                                                    </td>
                                                    <td v-if="item.type == 1">
                                                        <span class="label label-primary">{{ trans('admin.ingredient_sub') }}</span>
                                                    </td>
                                                    <td v-if="item.type == null">
                                                        <span class="label label-primary">Dữ Liệu Người Dùng</span>
                                                    </td>

                                                    <td>
                                                        <span v-if="item.status == null || item.status == 0" class="action_unit label label-danger">
                                                            Đang Chờ
                                                        </span>
                                                       <span v-if="item.status == 1" class="action_unit label label-success" >
                                                            Hiển Thị
                                                        </span>
                                                    </td>
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

                                <div id="paginationSearchName">

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

                                <div id="paginationInter">
                               
                                <nav class="dataTables_paginate paging_simple_numbers">
                                    <ul class="pagination">
                                        <li v-if="pagination.current_page > 1">
                                            <a href="#"
                                               @click.prevent="changePageInter(pagination.current_page - 1)">
                                                <span aria-hidden="true">«</span>
                                            </a>
                                        </li>
                                        <li v-for="page in pagesNumber"
                                            v-bind:class="[ page == isActived ? 'active' : '']">
                                            <a href="#"
                                               @click.prevent="changePageInter(page)">@{{ page }}</a>
                                        </li>
                                        <li v-if="pagination.current_page < pagination.last_page">
                                            <a href="#"
                                               @click.prevent="changePageInter(pagination.current_page + 1)">
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
        <!-- Create Item Modal -->
        <div class="modal fade" id="create-item" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('admin.ingredient_new') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>{{ trans('admin.ingredient_name') }}</label>
                            <input type="text" name="name" class="form-control" v-model="newItem.name" placeholder="{{ trans('admin.ingredient_name') }}" />
                            <span v-if="formErrors['name']" class="error text-danger">@{{ formErrors['name'][0] }}</span>
                            <br>
                            <label for="type">{{trans('admin.ingredient_type') }}</label>
                            <select  class="input-sm" name="type" id="" v-model="newItem.type" >
                                <option v-bind:value="0">{{ trans('admin.ingredient_main') }}</option>
                                <option v-bind:value="1">{{ trans('admin.ingredient_sub') }}</option>
                            </select>
                            <label for="status">{{trans('admin.status') }}</label>
                            <select  name="status" class="input-sm" id="" v-model="newItem.status" >
                                <option value="1">{{ trans('admin.show') }}</option>
                                <option value="0">{{ trans('admin.not_show') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <a href="javascript:void(0)"  data-dismiss="modal"  class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> {{ trans('admin.no') }}
                        </a>
                        <button type="button" class="btn btn-success"  v-on:click="createItem">
                            <span class="glyphicon glyphicon-ok-sign"></span> {{ trans('admin.yes') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit-item" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">{{ trans('admin.ingredient_edit') }}</h4>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                        <label for="name">{{ trans('admin.ingredient_name') }}</label>
                        <input type="text" name="name" class="form-control" v-model="fillItem.name" />
                        <span v-if="formErrorsUpdate['name']" class="error text-danger">@{{ formErrorsUpdate['name'][0] }}</span>
                        <br>
                        <label for="type">{{trans('admin.ingredient_type') }}</label>
                        <select  class="input-sm" name="type" id="" v-model="fillItem.type" >
                            <option v-bind:value="0">{{ trans('admin.ingredient_main') }}</option>
                            <option v-bind:value="1">{{ trans('admin.ingredient_sub') }}</option>
                        </select>

                        <label for="status">{{trans('admin.status') }}</label>
                        <select  name="status" class="input-sm" id="" v-model="fillItem.status" >
                            <option value="1">{{ trans('admin.show') }}</option>
                            <option value="0">{{ trans('admin.not_show') }}</option>
                        </select>
                    </div>
                    <div class="modal-footer ">
                        <a href="javascript:void(0)"  data-dismiss="modal"  class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> {{ trans('admin.no') }}
                        </a>
                        <button type="button" class="btn btn-success"  v-on:click="updateItem(fillItem.id)">
                            <span class="glyphicon glyphicon-ok-sign"></span> {{ trans('admin.yes') }}
                        </button>
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
    {{ Html::script('admin/ingredient.js') }}
@endsection
