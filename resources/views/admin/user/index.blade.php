@extends('admin.master')
@section('title')
{{ trans('admin.category_manage') }}
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
<div class="container" id="manage-vue">
    <div class="row">
        <div class="col-md-12 margin-tb">
            <div class="">
                <button  type="button" class="btn btn-success" data-toggle="modal" v-on:click="addItem">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    {{ trans('admin.user_create') }}
                </button>
            </div>
        </div>
    </div>
    <!-- Item Listing -->
    <div>
        <div class="row user">
            <div class="col-md-10">
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th class="col-md-1">{{ trans('admin.id') }}</th>
                        <th class="col-md-2">{{ trans('admin.name') }}</th>
                        <th class="col-md-3">{{ trans('admin.gmail') }}</th>
                        <th class="col-md-2">{{ trans('admin.phone') }}</th>
                        <th class="col-md-1">{{ trans('admin.rank') }}</th>
                        <th class="col-md-1">{{ trans('admin.rule') }}</th>
                        <th class="col-md-5">{{ trans('admin.action') }}</th>
                    </tr>
                    <tr v-for="item in items">
                        <td>@{{ item.id }}</td>
                        <td>
                            <a v-bind:href="'/admin/user/' + item.id">
                                @{{ item.name }}
                            </a>
                        </td>
                        <td>@{{ item.email }}</td>
                        <td>@{{ item.phone }}</td>
                        <td>
                            <span class="label label-primary" v-if="item.level">
                                <i class="fa fa-user-o" aria-hidden="true"></i> @{{ item.level.name }}
                            </span>
                            <span class="label label-primary" v-else>
                                <i class="fa fa-user-o" aria-hidden="true"></i>{{ trans('admin.noRank') }}
                            </span>
                        </td>
                        <td v-if="item.status == {{ config('permission.user') }}">
                            <span class="label label-success">
                                <i class="fa fa-user" aria-hidden="true"></i> {{ trans('admin.customer') }}
                            </span>
                        </td>
                        <td v-if="item.status == {{ config('permission.admin') }}">
                            <span class="label label-success">
                                <i class="fa fa-heart" aria-hidden="true"></i> {{ trans('admin.admin') }}
                            </span>
                        </td>
                        <td v-if="item.status == {{ config('permission.disable') }}">
                            <span class="label label-danger">
                                <i class="fa fa-user" aria-hidden="true"></i> {{ trans('admin.deleteUser') }}
                            </span>
                        </td>
                        <td>
                            <span class="" v-on:click="editItem(item)">
                                <i class="fa fa-fw ti-pencil text-primary actions_icon" title="{{ trans('admin.edit') }}"></i>
                            </span>
                            <span class="" v-on:click="comfirmDeleteItem(item)" v-if="item.status == 0 ||item.status == 1  " >
                                <i class="fa fa-fw ti-close text-danger actions_icon" title="{{ trans('admin.delete') }}"></i>
                            </span>
                        </td>
                        </tr>
                 </table>
            </div>
        </div>
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
            <nav>
                <ul class="pagination">
                    <li v-if="pagination.current_page > 1">
                        <a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)">
                            <span aria-hidden="true">«</span>
                        </a>
                    </li>
                    <li v-for="page in pagesNumber"
                    v-bind:class="[ page == isActived ? 'active' : '']">
                    <a href="#" @click.prevent="changePage(page)">@{{ page }}</a>
                </li>
                <li v-if="pagination.current_page < pagination.last_page">
                    <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)"> <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- comfirm delete item -->
        <div class="modal fade" id="delete-item" tabindex="-1" role="dialog" aria-labelledby="Heading" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                        </button>
                        <h4 class="modal-title custom_align" id="Heading">{{ trans('admin.deleteUser') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            <span class="glyphicon glyphicon-warning-sign"></span> {{ trans('admin.user_comfirm_delete') . ': ' }} @{{ deleteItem.name }}
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <a href="javascript:void(0)" v-on:click="delItem(deleteItem.id)" class="btn btn-danger">
                            <span class="glyphicon glyphicon-ok-sign"></span>{{ trans('admin.yes') }}
                        </a>
                        <button type="button" class="btn btn-success" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span> {{ trans('admin.no') }}
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
                                <label for="name">{{ trans('admin.password') }}</label>
                                <input type="text" name="password" class="form-control" v-model="fillItem.password" />
                                <span v-if="formErrors['password']" class="error text-danger">@{{ formErrors['password'][0] }}</span><br>
                                <table>
                                    <tr>
                                        <td>
                                            <label for="status">{{trans('admin.rank') }}</label>
                                        </td>
                                        <td></td>
                                        <td>
                                            <select  name="level_id" class="input-sm rankUser" id="" v-model="fillItem.level_id">
                                                <option value="1">{{ trans('admin.newbee') }}</option>
                                                <option v-bind:value="2">{{ trans('admin.taste') }}</option>
                                                <option v-bind:value="3">{{ trans('admin.cookee') }}</option>
                                                <option v-bind:value="4">{{ trans('admin.cheefee') }}</option>
                                                <option v-bind:value="5">{{ trans('admin.mastee') }}</option>
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
                                                <select  name="status" class="input-sm statusUser" id="" v-model="fillItem.status" >
                                                    <option v-bind:value="0">{{ trans('admin.customer') }}</option>
                                                    <option v-bind:value="1">{{ trans('admin.admin') }}</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
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
        @endsection
        @section('script')
        <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
        {{ Html::script('admin/user.js') }}
        @endsection
