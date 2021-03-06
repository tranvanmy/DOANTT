<?php $__env->startSection('title'); ?>
<?php echo e(trans('admin.category_manage')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="flip">
                    <div class="widget-bg-color-icon card-box front" style="background-color: #00c0ef !important; box-shadow: 10px 9px 4px -5px #888888;">
                        <div class="bg-icon pull-left">
                            <i class="ti-eye text-warning"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b><?php echo e($sumPost); ?></b></h3>
                            <p><?php echo e(trans('admin.post')); ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="flip">
                    <div class="widget-bg-color-icon card-box front" style="background-color:  #00a65a !important; box-shadow: 10px 9px 4px -5px #888888;">
                        <div class="bg-icon pull-left">
                            <i class="ti-shopping-cart text-success"></i>
                        </div>
                        <div class="text-right">
                            <h3><b id="widget_count3"><?php echo e($sumOrder); ?></b></h3>
                            <p><?php echo e(trans('admin.order')); ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="flip">
                    <div class="widget-bg-color-icon card-box front" style="    background-color: #f39c12 !important; box-shadow: 10px 9px 4px -5px #888888;">
                        <div class="bg-icon pull-left">
                            <i class="ti-slice text-info"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b><?php echo e($sumRecipe); ?></b></h3>
                            <p><?php echo e(trans('admin.recipe')); ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="flip">
                    <div class="widget-bg-color-icon card-box front" style="    background-color: #dd4b39 !important; box-shadow: 10px 9px 4px -5px #888888;">
                        <div class="bg-icon pull-left">
                            <i class="ti-user text-info"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b><?php echo e($sumUser); ?></b></h3>
                            <p><?php echo e(trans('admin.user')); ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" col-md-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel main-chart">
                            <div class="panel-heading panel-tabs">
                                <ul class="nav nav-tabs nav-float" role="tablist">
                                    <li class="active text-center">
                                        <a href="#home" role="tab" data-toggle="tab"><?php echo e(trans('admin.user')); ?></a>
                                    </li>
                                    <li class="text-center">
                                        <a href="#order" role="tab" data-toggle="tab">
                                            <span class="hidden-xs"><?php echo e(trans('admin.order')); ?></span>
                                        </a>
                                    </li>
                                    <li class="text-center">
                                        <a href="#profile" role="tab" data-toggle="tab">
                                            <span class="hidden-xs"><?php echo e(trans('admin.post')); ?></span>
                                        </a>
                                    </li>
                                    <li class="text-center">
                                        <a href="#repices" role="tab" data-toggle="tab">
                                            <span class="hidden-xs"><?php echo e(trans('admin.recipe')); ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="home">
                                        <div class="form-group">
                                            <?php echo $chartUser->render(); ?>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="order">
                                        <div class="form-group">
                                            <?php echo $chartOrder->render(); ?>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile">
                                        <div class="form-group">
                                            <?php echo $chartPost->render(); ?>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="repices">
                                        <div class="form-group">    
                                            <?php echo $chartRepices->render(); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="background-overlay"></div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('/vendor/laravel-filemanager/js/lfm.js')); ?>"></script>
<?php echo e(Html::script('admin/user.js')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>