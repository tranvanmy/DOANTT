<div class="intro">
    <figure class="bg"><img src="{{ asset('images/intro.jpg') }}" alt="" /></figure>
    <div class="wrap clearfix">
        <div class="row">
            <article class="three-fourth text wow zoomIn" data-wow-delay=".2s">
                <h1>{{ trans('sites.welcome') }}</h1>
                <a href="register.html" class="button white more medium">{{ trans('sites.join') }}</a>
            </article>
            <div class="one-fourth wow fadeInDown" data-wow-delay=".5s">
                <div class="widget container">
                    <div class="textwrap">
                        <h3>{{ trans('sites.searchRecipe') }}</h3>
                        <p>{{ trans('sites.enjoy') }}!</p>
                    </div>
                    <form action="">
                        <div class="f-row">
                            <input type="text" placeholder="{{ trans('sites.enter') }}" />
                        </div>
                        <div class="f-row bwrap">
                            <input type="submit" value="{{ trans('sites.start') }}" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
