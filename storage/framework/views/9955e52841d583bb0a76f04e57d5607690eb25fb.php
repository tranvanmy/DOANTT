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
               <div v-for="item in items">
                  <div class="entry one-third wow fadeInLeft">
                     <figure>
                        <img v-bind:src="'/'+item.image" alt="" />
                        <figcaption><a v-bind:href="'/site/cooking/'+ item.id"><i class="ico i-view"></i> <span><?php echo e(trans('sites.view')); ?></span></a></figcaption>
                     </figure>
                     <div class="container">
                        <h2><a v-bind:href="'/site/cooking/'+ item.id" class="ellipis">{{ item.name }}</a></h2>
                        <div class="actions">
                           <div>
                              <div class="difficulty">
                                 <i class="ico i-medium"></i>
                                 <a v-bind:href="'/site/cooking/'+ item.id"> {{ item.level.name }}</a>
                              </div>
                              <div class="likes">
                                 <i class="fa fa-calendar" aria-hidden="true"></i> {{ item.time }}
                              </div>
                              <div class="comments">
                                 <i class="fa fa-star-half-o" aria-hidden="true"></i> {{ item.rate_point}}
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <nav>
               <ul class="pagination">
                  <li v-if="pagination.current_page > 1">
                     <a href="#" @click.prevent="changePage(pagination.current_page - 1)">
                     <span aria-hidden="true">«</span>
                     </a>
                  </li>
                  <li v-for="page in pagesNumber"
                     v-bind:class="[ page == isActived ? 'active' : '']">
                     <a href="#" @click.prevent="changePage(page)">{{ page }}</a>
                  </li>
                  <li v-if="pagination.current_page < pagination.last_page">
                     <a href="#" @click.prevent="changePage(pagination.current_page + 1)"> <span aria-hidden="true">»</span>
                     </a>
                  </li>
               </ul>
            </nav>
         </section>
         <!--right sidebar-->
         <?php echo $__env->make('sites._sections.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      </div>
   </div>
</main>
<!--//wrap-->
<?php echo $__env->make('sites._sections.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php echo e(Html::script('js/recipes.js')); ?>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('sites.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>