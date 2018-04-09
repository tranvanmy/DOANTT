<aside class="sidebar one-fourth">
    <div class="widget wow fadeInRight">

        <h3>{{ trans('sites.recipeCategory') }}</h3>
        <ul class="boxed">
        @foreach ($categories as $key => $category)
            @if ($key % 2)
                <li class="light"><a href="{{ asset('/site/showCategory/'.$category['id']) }}" title="{{ $category['name'] }}"><img class="ico-none" src="{{ $category['icon'] }}" alt=""> <span>{{ $category['name'] }}</span></a></li>
            @else
                <li class="dark"><a href="{{ asset('/site/showCategory/'.$category['id']) }}" title="{{ $category['name'] }}"><img class="ico-none" src="{{ $category['icon'] }}" alt=""><span>{{ $category['name'] }}</span></a></li>
            @endif
        @endforeach
        </ul>
    </div>
    <div class="widget wow fadeInRight" data-wow-delay=".2s">
        <h3>{{ trans('sites.tips')}}</h3>
        <ul class="articles_latest">
        @foreach($posts as $post)
            <li>
                <a href="{{ route('site.blog.show', [$post->id]) }}">
                    <img src="{{ $post->image }}" alt="{{ $post->title }}" />
                    <h6 class="ellipis">{{ $post->description }}</h6>
                </a>
            </li>
        @endforeach
        </ul>
    </div>
    <div class="widget members wow fadeInRight" data-wow-delay=".4s">
        <h3>{{ trans('sites.ourMember') }}</h3>
        <div id="members-list-options" class="item-options">
            <a class="active" href="#">{{ trans('sites.newest') }}</a>
            <a class="active" href="#">{{ trans('sites.active') }}</a>
            <a class="active" href="#">{{ trans('sites.popular') }}</a>
        </div>
        <ul class="boxed">
        @foreach($users_top_3 as $user)
            <li><div class="avatar"><a href="{{ route('site.user.show', [$user->id]) }}"><img src="{{ $user->avatar }}" alt="" /><span>{{ $user->name }}</span></a></div></li>
        @endforeach
        </ul>
    </div>
</aside>
