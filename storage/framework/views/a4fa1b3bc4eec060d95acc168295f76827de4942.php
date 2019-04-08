<aside class="sidebar one-fourth">
    <div class="widget wow fadeInRight">

        <h3><?php echo e(trans('sites.recipeCategory')); ?></h3>
        <ul class="boxed">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($key % 2): ?>
                <li class="light"><a href="<?php echo e(asset('/site/showCategory/'.$category['id'])); ?>" title="<?php echo e($category['name']); ?>"><img class="ico-none" src="<?php echo e($category['icon']); ?>" alt=""> <span><?php echo e($category['name']); ?></span></a></li>
            <?php else: ?>
                <li class="dark"><a href="<?php echo e(asset('/site/showCategory/'.$category['id'])); ?>" title="<?php echo e($category['name']); ?>"><img class="ico-none" src="<?php echo e($category['icon']); ?>" alt=""><span><?php echo e($category['name']); ?></span></a></li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <div class="widget wow fadeInRight" data-wow-delay=".2s">
        <h3><?php echo e(trans('sites.tips')); ?></h3>
        <ul class="articles_latest">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="<?php echo e(route('site.blog.show', [$post->id])); ?>">
                    <img src="<?php echo e($post->image); ?>" alt="<?php echo e($post->title); ?>" />
                    <h6 class="ellipis"><?php echo e($post->description); ?></h6>
                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <div class="widget members wow fadeInRight" data-wow-delay=".4s">
        <h3><?php echo e(trans('sites.ourMember')); ?></h3>
        <div id="members-list-options" class="item-options">
            <a class="active" href="#"><?php echo e(trans('sites.newest')); ?></a>
            <a class="active" href="#"><?php echo e(trans('sites.active')); ?></a>
            <a class="active" href="#"><?php echo e(trans('sites.popular')); ?></a>
        </div>
        <ul class="boxed">
        <?php $__currentLoopData = $users_top_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><div class="avatar"><a href="<?php echo e(route('site.user.show', [$user->id])); ?>"><img src="<?php echo e($user->avatar); ?>" alt="" /><span><?php echo e($user->name); ?></span></a></div></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</aside>
