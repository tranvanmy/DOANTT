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
                    zxvxv<?php echo e(trans('sites.blog')); ?>

                </li>
            </ul>
        </nav>
        <!--//breadcrumbs-->
        <!--row-->
        <div class="row">
            <header class="s-title wow fadeInLeft">
                <h1><?php echo e(trans('sites.blog')); ?></h1>
            </header>
            <!--content-->
            <section class="content three-fourth wow fadeInLeft">
                <div  v-for="item in items">
                    <div v-if="item.status == 2">
                        <article class="post wow fadeInUp">
                            <div class="entry-meta">
                                <div class="avatar">
                                    <a v-bind:href="'/site/profile/user/' + item.user.id"><img v-bind:src="item.user.avatar"/><span>{{ item.user.name }}</span></a>
                                </div>
                            </div>
                            <div class="container">
                                <div class="entry-featured"><a v-bind:href="'/site/blog/' + item.id"><img  class="image_blog_cook" v-bind:src="item.image" alt="" /></a></div>
                                <div class="entry-content">
                                    <h2><a v-bind:href="'/site/blog/' + item.id">{{ item.title }}</a></h2>
                                    <p  v-if="item.description.length < 50"> {{ item.description }}</p>
                                    <p  v-else> {{ (item.description).slice(1, 100) }} ...</p>
                                </div>
                                <div class="actions">
                                    <div>
                                        <div class="more">
                                            <i class="fa fa-book" aria-hidden="true"></i>
                                            <a v-bind:href="'/site/blog/' + item.id"><?php echo e(trans('sites.read_more')); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="pager wow fadeInUp">
                    <nav>
                        <ul class="pagination">
                            <li v-if="pagination.current_page > 1">
                                <a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li v-for="page in pagesNumber"
                            v-bind:class="[ page == isActived ? 'active' : '']">
                            <a href="#" @click.prevent="changePage(page)">{{ page }}</a>
                        </li>
                        <li v-if="pagination.current_page < pagination.last_page">
                            <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)"> <span aria-hidden="true">»</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <!--//content-->
        <!--right sidebar-->
        <?php echo $__env->make('sites._sections.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
</main>
<?php echo $__env->make('sites._sections.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php echo e(Html::script('js/blog.js')); ?>  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('sites.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>