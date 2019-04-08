<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sites._sections.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<main class="main login" role="main">
    <div class="container col-md-8 col-md-offset-2">
        <section class="content p-l-r-15" id="manage-order">
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
                                                        <th class="col-md-1">xcvxcvcKhách đặt hàng</th>
                                                        <th class="col-md-1">Địa Chỉ</th>
                                                        <th class="col-md-1">Trang Thai</th>
                                                        <th class="col-md-1">Chi tiết đơn hàng</th>
                                                    </thead>
                                                    <tbody>
                                                        <tr role="row" v-for="order in orders">
                                                            <td>{{ order.id }}</td>
                                                            <td><a data-toggle="modal" v-on:click="showorder(order)" type="button">{{ order.user.name }}</a></td>

                                                            <td>{{ order.address }}</td>

                                                            <td v-if="order.status == 0">
                                                                <span class="label label-warning">
                                                                    <?php echo e(trans('sites.pending')); ?>

                                                                </span>
                                                            </td>
                                                            <td v-if="order.status == 1">
                                                                <span class="label label-success">
                                                                    <?php echo e(trans('sites.success')); ?>

                                                                </span>
                                                            </td>
                                                            <td>
                                                                <span class="btn btn-success" v-on:click="showOrder(order)">
                                                                    <?php echo e(trans('sites.show_detail')); ?>


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
        <div class="modal fade" id="show-order" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel"> CHI TIẾT ĐƠN HÀNG | TRẠNG THÁI
                            <span v-if="order.status == 1" class="label label-success"><?php echo e(trans('sites.success')); ?></span>
                            <span v-if="order.status == 0" class="label label-warning"><?php echo e(trans('sites.pending')); ?></span>
                        </h4>
                    </div>
                    <div class="modal-body clearfix">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-xs-6">
                                    <address>
                                        <strong><?php echo e(trans('sites.order_infomation')); ?>:</strong><br>
                                        Name: {{ order.name }}<br>
                                        Email: {{ order.email }}<br>
                                        Phone: {{ order.phone }}<br>
                                        Address: {{ order.address }}
                                    </address>
                                </div>
                                <div class="col-xs-6">
                                    <address>
                                        <strong><?php echo e(trans('sites.order_date')); ?>:</strong><br>
                                        {{ order.created_at }}<br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input type="radio" id="one" value="0" v-on:change="updateStatus(order)" v-model="order.status">
                            <label for="one"><?php echo e(trans('sites.pending')); ?></label>
                            <br>
                            <input type="radio" id="two" value="1" v-on:change="updateStatus(order)" v-model="order.status">
                            <label for="two"><?php echo e(trans('sites.success')); ?></label>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="color: #333; background-color: rgb(79, 169, 115); border-color: #DCDCDC;">
                                        <h3 class="panel-title"><strong>Sản Phẩm</strong></h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-condensed">
                                                <thead>
                                                    <tr>
                                                        <td><strong><?php echo e(trans('sites.item')); ?></strong></td>
                                                        <td class="text-center"><strong><?php echo e(trans('sites.price')); ?></strong></td>
                                                        <td class="text-center"><strong><?php echo e(trans('sites.quantity')); ?></strong></td>
                                                        <td class="text-right"><strong><?php echo e(trans('sites.total')); ?></strong></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="orderDetail in orderDetails">
                                                        <td>
                                                         <a  v-bind:href="'/site/cooking/' + orderDetail.cooking.id" target="_blank">
                                                                    {{ orderDetail.cooking.name }}
                                                            </a>
                                                        </td>
                                                        <td class="text-center">{{ orderDetail.price / orderDetail.quantity }}</td>
                                                        <td class="text-center">{{ orderDetail.quantity }}</td>
                                                        <td class="text-right">{{ orderDetail.price }}</td>
                                                    </tr>
                                                </tr>
                                                <tr>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line"></td>
                                                    <td class="thick-line text-center"><strong><?php echo e(trans('sites.total')); ?></strong></td>
                                                    <td class="thick-line text-right">{{ order.total }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-center"><strong><?php echo e(trans('sites.shipping')); ?></strong></td>
                                                    <td class="no-line text-right">0đ</td>
                                                </tr>
                                                <tr>
                                                    <td class="no-line"></td>
                                                    <td class="no-line"></td>
                                                    <td class="no-line text-center"><strong>Tổng Tiền</strong></td>
                                                    <td class="no-line text-right">{{ order.total }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success" v-on:click="close"><?php echo e(trans('sites.close')); ?></button>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</main>
<?php echo $__env->make('sites._sections.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php echo e(Html::script('admin/sell.js')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('sites.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>