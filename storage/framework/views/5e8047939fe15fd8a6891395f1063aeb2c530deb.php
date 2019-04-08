<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sites._sections.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<main class="main login" role="main">
    <!--wrap-->
    <div class="wrap clearfix" id="blog">
        <!--breadcrumbs-->
        <nav class="breadcrumbs">
            <ul>
                <li>
                    <a href="<?php echo e(asset('/')); ?>">
                        <?php echo e(trans('sites.home')); ?>

                    </a>
                </li>
                <li>
                    <?php echo e(trans('sites.order_list')); ?>

                </li>
            </ul>
        </nav>
        <!--//breadcrumbs-->
        <!--row-->
        <div class="container">
        <?php if(session()->has('message')): ?>
            <div class="row btn-success text-center">
                <h2><?php echo e(session()->get('message')); ?></h2>
            </div>
        <?php endif; ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="invoice-title" style="border-radius: 40px;">
                        <h2><?php echo e(trans('sites.order_list')); ?></h2>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php if(!empty($invoices)): ?>
            <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"> 
                            <h3 class="panel-title col-md-2"><strong class="text-danger"><a href="#"> <?php echo e($invoice->created_at); ?></a></strong></h3>
                            <h3 class="panel-title col-md-3"><strong class="text-danger"><?php echo e(trans('sites.seller')); ?>: <a href="/site/profile/user/<?php echo e($invoice->sellerr->id); ?>"><?php echo e($invoice->sellerr->name); ?></a></strong></h3>
                            <h3 class="panel-title col-md-2"><strong class="text-danger"><a href="/invoice/<?php echo e($invoice->id); ?>"><?php echo e(trans('sites.viewOrder')); ?></a></strong></h3>

                            <h3 class="panel-title col-md-2"><strong class="text-danger"><?php echo e(trans('sites.total')); ?>: <a href="#"><?php echo e(number_format($invoice->total)); ?>đ</a></strong></h3>
                            <?php if($invoice->status == 1): ?>
                                <h3 class="panel-title"><strong class="text-danger"><?php echo e(trans('sites.status')); ?>: <span class="btn btn-success"><?php echo e(trans('sites.success')); ?></span></strong></h3>
                            <?php elseif($invoice->status == 0): ?>
                                <h3 class="panel-title"><strong class="text-danger"><?php echo e(trans('sites.status')); ?>: <span class="btn btn-warning"><?php echo e(trans('sites.pending')); ?></span></strong></h3>
                            <?php else: ?>
                                <h3 class="panel-title"><strong class="text-danger"><?php echo e(trans('sites.status')); ?>: <span class="btn btn-danger"><?php echo e(trans('sites.something_wrong_problem')); ?></span></strong></h3>
                            <?php endif; ?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <td><strong><?php echo e(trans('sites.product')); ?></strong></td>
                                            <td class="text-center"><strong><?php echo e(trans('sites.price')); ?></strong></td>
                                            <td class="text-center"><strong><?php echo e(trans('sites.quantity')); ?></strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                    <?php $__currentLoopData = $invoice->orderDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="col-md-3">
                                                <div class="media">
                                                   <a class="thumbnail pull-left" href="#"> <img class="media-object" src="/<?php echo e($product->cooking->image); ?>" style="width: 72px; height: 72px;"> </a>
                                                   <div class="media-body">
                                                       <h4 class="media-heading"><a href="/site/cooking/<?php echo e($product->cooking->id); ?>"><?php echo e($product->cooking->name); ?></a></h4>
                                                   </div>
                                                </div>
                                            </td>
                                            <td class="text-center"><?php echo e(number_format($product->price)); ?>đ</td>
                                            <td class="text-center"><?php echo e($product->quantity); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
<!--//content-->
<!--right sidebar-->
</main>
<?php echo $__env->make('sites._sections.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sites.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>