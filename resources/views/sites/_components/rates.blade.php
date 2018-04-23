<div id="rating" class="rating">
    <div>
        {{ trans('sites.rating') }}: 
        <star-rating v-model="rating" v-bind:increment="0.1"  @rating-selected ="setRating"></star-rating>
    </div>
</div>