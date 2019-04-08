<div class="preloader" style="display: none;">
        <div class="spinner"></div>
</div>
<header class="head" role="banner">
    <div class="wrap clearfix">
        <a href="<?php echo e(route('home')); ?>" class="logo"></a>
        <nav class="main-nav" role="navigation" id="menu">
            <ul>
                <li><a href="<?php echo e(route('home')); ?>" title="<?php echo e(trans('sites.home')); ?>"><span><?php echo e(trans('sites.home')); ?></span></a></li>
                <li>
                    <a href="/site/cooking" title="<?php echo e(trans('sites.recipes')); ?>">
                        <span><?php echo e(trans('sites.recipes')); ?></span>
                    </a>
                </li>
                <li>
                    <a href="/site/blog" title="<?php echo e(trans('sites.blog')); ?>">
                        <span><?php echo e(trans('sites.blog')); ?></span>
                    </a>
                </li>
                <li>
                    <a href="/site/master">
                        <span><?php echo e(trans('sites.topChef')); ?></span>
                    </a>
                </li>
                <?php if(Auth::check()): ?>
                    <li class="current-menu-item" id="liHead">
                            <img src="<?php echo e(Auth::user()->avatar); ?>" alt="" style="width: 90px;">
                        <ul>
                            <li>
                                <a href="<?php echo e(asset('site/profile/user/' . Auth::user()->id)); ?>">
                                    <i class="fa fa-user" aria-hidden="true"></i> <?php echo e(trans('sites.profile')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(asset('site/wislish/'.Auth::user()->id)); ?>">
                                    <i class="fa fa-heart" aria-hidden="true"></i> <?php echo e(trans('sites.listwishlish')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(asset('order')); ?>">
                                   <i class="fa fa-shopping-cart" aria-hidden="true"></i> <?php echo e(trans('sites.order_list')); ?>

                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(asset('order/sell')); ?>">
                                    <i class="fa fa-certificate" aria-hidden="true"></i> <?php echo e(trans('sites.order_list_sell')); ?>

                                </a>
                            </li>
                            <li>
                                <?php echo Form::open(['url' => url('logout'), 'method' => 'post']); ?>

                                    <a onclick="confirmButtonBeforeSubmit(this)" data-text="<?php echo e(trans('sites.sure')); ?>" >
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> <?php echo e(trans('sites.logout')); ?>

                                    </a>
                                <?php echo Form::close(); ?>

                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <nav class="user-nav" role="navigation">
            <ul>
                <?php if(Auth::check()): ?>
                    <li class="light">
                        <a href="/cart">
                            <i class="fa fa-cart-arrow-down fa-3x wishlishead" aria-hidden="true"></i>
                            <b id="cart_number"></b>
                            <span><?php echo e(trans('sites.cart')); ?></span>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="medium"><a href="<?php echo e(route('login')); ?>" title="<?php echo e(trans('sites.login')); ?>"><i class="ico i-account"></i> <span><?php echo e(trans('sites.login')); ?></span></a></li>
                <?php endif; ?>
                    <li class="light">
                        <a href="/search" title="<?php echo e(trans('sites.search')); ?>">
                            <i class="ico i-search"></i> <span><?php echo e(trans('sites.search')); ?></span>
                        </a>
                    </li>
                    <li class="dark">
                        <a href="/cooking" title="<?php echo e(trans('sites.submitRepice')); ?>">
                            <i class="ico i-submitrecipe"></i> <span><?php echo e(trans('sites.submitRepice')); ?></span>
                        </a>
                    </li>
            </ul>
        </nav>
    </div>
</header>
