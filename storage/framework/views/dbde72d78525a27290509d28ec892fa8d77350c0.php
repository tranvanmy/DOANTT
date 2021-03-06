<?php $__env->startSection('title'); ?>
Quản lý công thức
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <?php echo e(Html::style('bower/summernote/dist/summernote.css')); ?>

    <meta id="token" name="csrf-token" value="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <h1><?php echo e(trans('admin.cooking')); ?></h1>
    <ul class="breadcrumb">
        <i class="ti-server panel-title"></i>
        <li class="next">
            <a href="<?php echo e(route('admin.report')); ?>"><?php echo e(trans('admin.dashboard')); ?></a>
        </li>
        <li class="next">
            <a><?php echo e(trans('admin.cooking')); ?>/</a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Item Listing -->
    <section class="content p-l-r-15" id="manage-vue">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                     <label>Tìm Kiếm</label>
                        <select name="status" class="input-sm" v-model="search">
                            <option v-bind:value="1">Theo Tên</option>
                            <option v-bind:value="0">Theo Trạng Thái</option>
                        </select>
                            
                        <input type="" v-if="search == 1" id="nameCooking" v-model="fillSearch.name" v-on:keyup="searchName">

                        <select  v-else name="status" class="input-sm" v-model="statusSearch.status" v-on:change="searchChange">
                            <option value="0">Đang Chờ</option>
                            <option value="1">Hiển Thị</option>
                            <option value="2">Đang Chỉnh Sửa</option>
                        </select>
                         <span class="label label-success"> Tổng công thức là :{{ totalOrder }}</span>

                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div id="table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered dataTable no-footer" id="table" role="grid" aria-describedby="table_info">
                                            <thead>
                                                <tr class="filters" role="row">
                                                <th class="col-md-1"><?php echo e(trans('admin.id')); ?></th>
                                                <th class="col-md-2"><?php echo e(trans('admin.name')); ?></th>
                                                <th class="col-md-3"><?php echo e(trans('admin.description')); ?></th>
                                                <th class="col-md-1"><?php echo e(trans('admin.image')); ?></th>
                                                <th class="col-md-1"><?php echo e(trans('admin.category')); ?></th>
                                                <th class="col-md-1"><?php echo e(trans('admin.status')); ?></th>
                                                <th class="col-md-1"><?php echo e(trans('admin.action')); ?></th>
                                            </thead>
                                            <tbody>                       
                                                <tr role="row" v-for="cooking in cookings">
                                                    <td>{{ cooking.id }}</td>
                                                    <td><a data-toggle="modal" v-bind:href="'/site/cooking/' + cooking.id" target="_blank">{{ cooking.name }}</a></td>
                                                    <td>
                                                        <p class="ellipis" v-if="cooking.description.length > 50">{{ cooking.description.slice(1, 50) }}...</p>
                                                        <p class="ellipis" v-else>{{ cooking.description }}</p>
                                                    </td>
                                                    <td><img class="icon-ingredient" v-bind:src="'/' + cooking.image" alt="" height="100px"></td>
                                                    <td>
                                                        <span v-for="category in cooking.categories" class="label label-primary"> {{ category.name }}</span>
                                                    </td>
                                                    <td>
                                                        <span v-if="cooking.status == 0" class="action_unit label label-danger">
                                                            Đang Chờ
                                                        </span>
                                                        <span v-if="cooking.status == 1" class="action_unit label label-success" >
                                                            Hiển Thị
                                                        </span>
                                                        <span v-if="cooking.status == 2" class="action_unit label label-warning" >
                                                            Đang Chỉnh Sửa
                                                        </span>

                                                    </td>
                                                    <td>
                                                        <span class="btn btn-info" v-on:click="editCooking(cooking)">
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
                                               @click.prevent="changePage(page)">{{ page }}</a>
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
                                               @click.prevent="changePageName(page)">{{ page }}</a>
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
                                               @click.prevent="changePageStatus(page)">{{ page }}</a>
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
        <!-- Edit Item Modal -->
        <div class="modal fade" id="edit-item" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo e(trans('admin.cooking_edit')); ?>: {{ fillItem.name}}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="status"><?php echo e(trans('admin.status')); ?></label>
                            <select  name="status" class="input-sm" id="" v-model="fillItem.status" >
                                <option value="1">Hiển Thị</option>
                                <option value="0">Đang Chờ</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <a href="javascript:void(0)"  data-dismiss="modal"  class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> <?php echo e(trans('admin.no')); ?>

                        </a>
                        <button type="button" class="btn btn-success"  v-on:click="updateItem(fillItem.id)">
                            <span class="glyphicon glyphicon-ok-sign"></span> <?php echo e(trans('admin.yes')); ?>

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
                        <h4 class="modal-title col-md-3">{{ show.name }}</h4>
                        <img :src="'/' + show.image" height="50px">
                    </div>
                    <div class="modal-body">
                        <ol>
                            <li v-for="step in show.steps">
                            {{ step.content }}
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php echo e(Html::script('admin/cooking.js')); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>