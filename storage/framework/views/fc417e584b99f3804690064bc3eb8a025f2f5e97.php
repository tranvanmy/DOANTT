<div class="intro">
    <figure class="bg"><img src="<?php echo e(asset('images/intro.jpg')); ?>" alt="" /></figure>
    <div class="wrap clearfix">
        <div class="row">
            <article class="three-fourth text wow zoomIn" data-wow-delay=".2s">
                <h1>Chào mừng bạn đến với UTT-Cook</h1>
                <?php if(Auth::check()): ?>
                <?php else: ?>
                    <a href="<?php echo e(route('register')); ?>" class="button white more medium"><?php echo e(trans('sites.join')); ?></a>
                <?php endif; ?>
            </article>
        </div>
    </div>
</div>
