<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.subscribe_manage')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <?php echo e(Html::style('bower/summernote/dist/summernote.css')); ?>

    <meta id="token" name="csrf-token" value="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <h1><?php echo e(trans('admin.subcrice')); ?></h1>
    <ul class="breadcrumb">
        <i class="ti-server panel-title"></i>
        <li class="next">
            <a href="<?php echo e(route('admin.report')); ?>"><?php echo e(trans('admin.dashboard')); ?></a>
        </li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Item Listing -->
    <section class="content p-l-r-15" id="manage-vue">
        <div class="row" id="subcrice_amdin">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                    <button class="btn btn-success" onclick="window.print();">
                        <i class="fas fa-print"></i> <?php echo e(trans('admin.prindsub')); ?>

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
                                                <th class="col-md-1"><?php echo e(trans('admin.id')); ?></th>
                                                <th class="col-md-3"><?php echo e(trans('admin.gmail')); ?></th>
                                                <th class="col-md-1"><?php echo e(trans('admin.action')); ?></th>
                                            </thead>
                                            <tbody>
                                                <tr role="row" v-for="item in items">
                                                    <td>{{ item.id }}</td>
                                                    <td>
                                                        <a mailto>{{ item.email }}</a>
                                                    </td>
                                                    <td>
                                                        <span class="btn btn-danger" v-on:click="comfirmDeleteItem(item)">
                                                          <i class="fas fa-trash-alt"></i> <?php echo e(trans('admin.delete')); ?>

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
                            <!-- comfirm delete item -->
                            <div class="modal fade" id="delete-item" tabindex="-1" role="dialog" aria-labelledby="Heading" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                            </button>
                                            <h4 class="modal-title custom_align" id="Heading"><?php echo e(trans('admin.delete_email')); ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger">
                                                <span class="glyphicon glyphicon-warning-sign"></span> <?php echo e(trans('admin.category_comfirm_delete') . ': '); ?> {{ deleteItem.email }}
                                            </div>
                                        </div>
                                        <div class="modal-footer ">
                                            <a href="javascript:void(0)" v-on:click="delItem(deleteItem.id)" class="btn btn-danger">
                                                <span class="glyphicon glyphicon-ok-sign"></span> <?php echo e(trans('admin.yes')); ?>

                                            </a>
                                            <button type="button" class="btn btn-success" data-dismiss="modal">
                                                <span class="glyphicon glyphicon-remove"></span> <?php echo e(trans('admin.no')); ?>

                                            </button>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php echo e(Html::script('admin/subcrice.js')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>