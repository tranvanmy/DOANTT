<div id="rating" class="rating">
    <div>
        {{ trans('sites.rating') }}: 
        <star-rating v-model="point" star-size=15 :increment="0.01" :fixed-points="2"></star-rating> 
        <span>/5</span>
    </div>
</div>