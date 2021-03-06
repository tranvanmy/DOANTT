<?php $__env->startSection('title'); ?>
Quản lý bài viết
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    
    <meta id="token" name="csrf-token" value="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <h1><?php echo e(trans('admin.post')); ?></h1>
    <ul class="breadcrumb">
        <i class="ti-server panel-title"></i>
        <li class="next">
            <a href="<?php echo e(route('admin.report')); ?>"><?php echo e(trans('admin.dashboard')); ?></a>
        </li>
        <li class="next">
            <a><?php echo e(trans('admin.post')); ?></a>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                                                <th class="col-md-1"><?php echo e(trans('admin.id')); ?></th>
                                                <th class="col-md-1"><?php echo e(trans('admin.title')); ?></th>
                                                <th class="col-md-1"><?php echo e(trans('admin.author')); ?></th>
                                                <th class="col-md-3"><?php echo e(trans('admin.description')); ?></th>
                                                <th class="col-md-1"><?php echo e(trans('admin.status')); ?></th>
                                                <th class="col-md-1"><?php echo e(trans('admin.action')); ?></th>
                                            </thead>
                                            <tbody>                       
                                                <tr role="row" v-for="item in items">
                                                    <td>{{ item.id }}</td>
                                                    <td><a data-toggle="modal" v-bind:href="'/site/blog/' + item.id" target="_blank" > {{ item.title }}</a>
                                                  
                                                    </td>
                                                    <td>
                                                    <a v-bind:href="'/site/profile/user/' + item.user.id" target="_blank">{{ item.user.name }}</a></td>
                                                    <td >{{ item.description }}</td>
                                                    <td>
                                                        <span v-if="item.status == 1" class="action_unit label label-danger">
                                                            Không hiển thị
                                                         </span>
                                                        <span v-else class="action_unit label label-success" >
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
                        <h4 class="modal-title" id="myModalLabel"><?php echo e(trans('admin.post_edit')); ?> : {{ fillItem.title}}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="status"><?php echo e(trans('admin.status')); ?></label>
                            <select  name="status" class="input-sm" id="" v-model="fillItem.status">
                                <option value="2"><?php echo e(trans('admin.show')); ?></option>
                                <option value="1"><?php echo e(trans('admin.not_show')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <a href="javascript:void(0)"  data-dismiss="modal"  class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> <?php echo e(trans('admin.no')); ?>

                        </a>
                        <button type="submit" class="btn btn-success"  v-on:click="updateItem(fillItem.id)"><?php echo e(trans('admin.post_update')); ?></button>
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
                        <h4 class="modal-title col-md-3">{{ show.title }}</h4>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php echo e(Html::script('admin/post.js')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>