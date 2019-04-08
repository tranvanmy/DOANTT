<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sites._sections.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<main class="main login" role="main">
    <div class="wrap clearfix" id="repicesCooking">
        <nav class="breadcrumbs">
            <ul>
                <li><a href="index.html" title="Home"><?php echo e(trans('sites.home')); ?></a></li>
                <li><?php echo e(trans('sites.repices')); ?></li>
            </ul>
        </nav>
        <div class="row">
            <header class="s-title wow fadeInLeft">
                <h1><?php echo e(trans('sites.repices')); ?></h1>
            </header> 
            <section class="content three-fourth wow fadeInUp">
                <div class="entries row">
                    <!--item-->
                    <div>
                    <?php $__currentLoopData = $listCookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listCooking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="entry one-third wow fadeInLeft">
                            <figure>
                                <img src="/<?php echo e($listCooking->image); ?>" alt="" />
                                <figcaption><a  href="/site/cooking/<?php echo e($listCooking->id); ?>"><i class="ico i-view"></i> <span><?php echo e(trans('sites.view')); ?></span></a></figcaption>
                            </figure>
                            <div class="container">
                                <h2><a href="/site/cooking/<?php echo e($listCooking->id); ?>"><?php echo e($listCooking->name); ?></a></h2> 
                                <div class="actions">
                                    <div>
                                        <div class="difficulty">
                                            <i class="ico i-medium"></i>
                                            <a v-bind:href="'/site/cooking/'+ item.id"> <?php echo e($listCooking->level->name); ?></a>
                                        </div>
                                        <div class="likes">
                                            <i class="fa fa-calendar" aria-hidden="true"></i><?php echo e($listCooking->time); ?>

                                        </div>
                                        <div class="comments">
                                            <i class="fa fa-star-half-o" aria-hidden="true"></i><?php echo e($listCooking->rate_point); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                      
                    </div>
                </div>
            </section>              
            <!--right sidebar-->
            <?php echo $__env->make('sites._sections.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
           <?php echo e($listCookings->links()); ?>

        </div>
    </main>
<!--//wrap-->
<?php echo $__env->make('sites._sections.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sites.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>