<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('sites._sections.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <main class="main" role="main" id="home">
    <?php echo $__env->make('sites._sections.intro', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="wrap clearfix">
            <div class="row">
                <section class="content three-fourth">
                    <div class="cwrap">
                        <div class="entries row">
                            <div class="featured two-third wow fadeInLeft">
                                <header class="s-title">
                                    <h2 class="ribbon"><?php echo e(trans('sites.feature_recipe')); ?></h2>
                                </header>
                                <article class="entry">
                                    <figure>
                                        <img src="<?php echo e($cooking_top_1[0]->image); ?>" alt="<?php echo e($cooking_top_1[0]->name); ?>" style="width: 100%;" />
                                        <figcaption><a href=""><i class="ico i-view"></i> <span><?php echo e(trans('sites.view')); ?></span></a></figcaption>
                                    </figure>
                                    <div class="container">
                                        <h2><a href=""><?php echo e($cooking_top_1[0]->name); ?></a></h2>
                                        <p><?php echo e($cooking_top_1[0]->description); ?></p>
                                        <div class="actions">
                                            <div>
                                                <a href="<?php echo e(route('site.cooking.show', [$cooking_top_1[0]->id])); ?>" class="button"><?php echo e(trans('sites.see')); ?></a>
                                                <div class="more"><a href="<?php echo e(route('site.cooking.store')); ?>"><?php echo e(trans('sites.seePass')); ?></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="featured one-third wow fadeInLeft" data-wow-delay=".2s">
                                <header class="s-title">
                                    <h2 class="ribbon star"><?php echo e(trans('sites.featuredMember')); ?></h2>
                                </header>
                                <article class="entry">
                                    <figure>
                                        <img src="<?php echo e($user_top_1[0]->avatar); ?>" alt="<?php echo e($user_top_1[0]->name); ?>" style="width: 100%;" />
                                        <figcaption><a href="<?php echo e(route('site.user.show', [$user_top_1[0]->id])); ?>"><i class="ico i-view"></i> <span><?php echo e(trans('sites.viewMember')); ?></span></a></figcaption>
                                    </figure>
                                    <div class="container">
                                        <h2><a href="<?php echo e(route('site.user.show', [$user_top_1[0]->id])); ?>"><?php echo e($user_top_1[0]->name); ?></a></h2>
                                        <blockquote><?php echo e(trans('sites.maxim')); ?></blockquote>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="cwrap">
                        <header class="s-title">
                            <h2 class="ribbon bright"><?php echo e(trans('sites.lastRecipes')); ?></h2>
                        </header>
                        <div class="entries row">
                                <?php $__currentLoopData = $cookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cooking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="entry one-third wow fadeInLeft">
                                        <figure>
                                            <img src="<?php echo e($cooking->image); ?>" alt="<?php echo e($cooking->name); ?>" />
                                            <figcaption><a href="<?php echo e(route('site.cooking.show', [$cooking->id])); ?>"><i class="ico i-view"></i> <span><?php echo e(trans('sites.view')); ?></span></a></figcaption>
                                        </figure>
                                        <div class="container">
                                            <h2 class="ellipis"><a href="<?php echo e(route('site.cooking.show', [$cooking->id])); ?>"><?php echo e($cooking->name); ?></a></h2>
                                            <div class="actions">
                                               <div>
                                                <div class="">
                                                     <?php echo e($cooking->level->name); ?>

                                                    </div>
                                                    <div class="">
                                                    Thoi Gian: <?php echo e($cooking->time); ?>h
                                                    </div>
                                                
                                                    <div class="comments">
                                                    <?php echo e($cooking->rate_point); ?> <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            <div class="quicklinks">
                                <a href="<?php echo e(route('site.cooking.store')); ?>" class="button"><?php echo e(trans('sites.moreRecipes')); ?></a>
                                <a href="javascript:void(0)" class="button scroll-to-top"><?php echo e(trans('sites.backToTop')); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="cwrap">
                        <header class="s-title">
                            <h2 class="ribbon bright"><?php echo e(trans('sites.latestArticles')); ?></h2>
                        </header>
                        <div class="entries row">
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="entry one-third wow fadeInLeft">
                                <figure>
                                    <img src="<?php echo e($post->image); ?>" alt="<?php echo e($post->title); ?>" style="width:100%; height: 200px;" />
                                    <figcaption><a href="<?php echo e(route('site.blog.show', [$post->id])); ?>"><i class="ico i-view"></i> <span><?php echo e(trans('sites.view')); ?></span></a></figcaption>
                                </figure>
                                <div class="container">
                                    <h2 class="ellipis"><a href="<?php echo e(route('site.blog.show', [$post->id])); ?>"><?php echo e($post->title); ?></a></h2>
                                    <div class="actions">
                                        <div>
                                            <div class="date"><i class="fa fa-calendar"></i><a href="#"><?php echo e($post->created_at); ?></a></div>
                                            <div class="comments"><i class="ico i-comments"></i><a href=""><?php echo e($post->comments->count()); ?></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="quicklinks">
                                <a href="<?php echo e(route('site.blog.store')); ?>" class="button"><?php echo e(trans('sites.morePost')); ?></a>
                                <a href="javascript:void(0)" class="button scroll-to-top"><?php echo e(trans('sites.backToTop')); ?></a>
                            </div>
                        </div>
                    </div>

                <section class="content full-width">
                    <div class="icons dynamic-numbers">
                        <header class="s-title wow fadeInDown">
                            <h2 class="ribbon large"><?php echo e(trans('sites.topChef')); ?></h2>
                        </header>
                        <div class="row wow fadeInUp">
                        <?php $__currentLoopData = $users_top_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="entry one-third wow fadeInLeft">
                                <figure>
                                    <img src="<?php echo e($user->avatar); ?>" alt="" style="height: 260px;" />
                                    <figcaption><a href="<?php echo e(route('site.user.show', [$user->id])); ?>"><i class="ico i-view"></i> <span><?php echo e(trans('sites.viewMember')); ?></span></a></figcaption>
                                </figure>
                                <div class="container">
                                    <h4><a href="<?php echo e(route('site.user.show', [$user->id])); ?>"><?php echo e($user->name); ?></a></h4>

                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="quicklinks">
                                <a href="<?php echo e(route('site.master')); ?>" class="button"><?php echo e(trans('sites.moreMaster')); ?></a>
                                <a href="javascript:void(0)" class="button scroll-to-top"><?php echo e(trans('sites.backToTop')); ?></a>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
    <?php echo $__env->make('sites._sections.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    </main>
    <?php echo $__env->make('sites._sections.category_footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('sites._sections.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sites.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>