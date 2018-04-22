<div id="rating" class="rating">
    <div>
        {{ trans('sites.rating') }}: 
        <star-rating v-model="rating" @rating-selected ="setRating"></star-rating>
    </div>
</div>