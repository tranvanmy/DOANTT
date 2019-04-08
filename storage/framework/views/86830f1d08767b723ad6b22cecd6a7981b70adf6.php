<div id="rating" class="rating">
    <div>
        <?php echo e(trans('sites.rating')); ?>: 
        <star-rating v-model="cooking.rate_point" v-bind:increment="0.1"></star-rating>
    </div>
</div>