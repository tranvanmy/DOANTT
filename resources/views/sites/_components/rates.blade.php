<div id="rating" class="rating">
    <div>
        {{ trans('sites.rating') }}: 
        <star-rating v-model="cooking.rate_point" v-bind:increment="0.1"></star-rating>
    </div>
</div>