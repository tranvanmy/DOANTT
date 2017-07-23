<div class="intro">
    <figure class="bg"><img src="{{ asset('images/intro.jpg') }}" alt="" /></figure>
    <div class="wrap clearfix">
        <div class="row">
            <article class="three-fourth text wow zoomIn" data-wow-delay=".2s">
                <h1>{{ trans('sites.welcome') }}</h1>
                @if(Auth::check())
                @else
                    <a href="{{ route('register') }}" class="button white more medium">{{ trans('sites.join') }}</a>
                @endif
            </article>
        </div>
    </div>
</div>
