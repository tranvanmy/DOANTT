@extends('sites.master')
@section('content')
    @include('sites._sections.header')
    <main class="main" role="main" id="home">
    @include('sites._sections.intro')
        <div class="wrap clearfix">
            <div class="row">
                <section class="content three-fourth">
                    <div class="cwrap">
                        <div class="entries row">
                            <div class="featured two-third wow fadeInLeft">
                                <header class="s-title">
                                    <h2 class="ribbon">{{ trans('sites.feature_recipe') }}</h2>
                                </header>
                                <article class="entry">
                                    <figure>
                                        <img src="{{ $cooking_top_1[0]->image }}" alt="{{ $cooking_top_1[0]->name }}" />
                                        <figcaption><a href=""><i class="ico i-view"></i> <span>{{ trans('sites.view') }}</span></a></figcaption>
                                    </figure>
                                    <div class="container">
                                        <h2><a href="">{{ $cooking_top_1[0]->name }}</a></h2>
                                        <p>{{ $cooking_top_1[0]->description }}</p>
                                        <div class="actions">
                                            <div>
                                                <a href="{{ route('site.cooking.show', [$cooking_top_1[0]->id]) }}" class="button">{{ trans('sites.see') }}</a>
                                                <div class="more"><a href="{{ route('site.cooking.store')  }}">{{ trans('sites.seePass') }}</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="featured one-third wow fadeInLeft" data-wow-delay=".2s">
                                <header class="s-title">
                                    <h2 class="ribbon star">{{ trans('sites.featuredMember') }}</h2>
                                </header>
                                <article class="entry">
                                    <figure>
                                        <img src="{{ $user_top_1[0]->avatar }}" alt="{{ $user_top_1[0]->name }}" />
                                        <figcaption><a href="{{ route('site.user.show', [$user_top_1[0]->id]) }}"><i class="ico i-view"></i> <span>{{ trans('sites.viewMember') }}</span></a></figcaption>
                                    </figure>
                                    <div class="container">
                                        <h2><a href="{{ route('site.user.show', [$user_top_1[0]->id]) }}">{{ $user_top_1[0]->name }}</a></h2>
                                        <blockquote>{{ trans('sites.maxim') }}</blockquote>
                                        <div class="actions">
                                            <div>
                                                <div class="more"><a href="{{ route('site.user.store')  }}">{{ trans('sites.seeMember') }}</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <div class="cwrap">
                        <header class="s-title">
                            <h2 class="ribbon bright">{{ trans('sites.lastRecipes') }}</h2>
                        </header>
                        <div class="entries row">
                        @foreach($cookings as $cooking)
                            <div class="entry one-third wow fadeInLeft">
                                <figure>
                                    <img src="{{ $cooking->image }}" alt="{{ $cooking->name }}" />
                                    <figcaption><a href="{{ route('site.cooking.show', [$cooking->id])  }}"><i class="ico i-view"></i> <span>{{ trans('sites.view') }}</span></a></figcaption>
                                </figure>
                                <div class="container">
                                    <h2><a href="">{{ $cooking->name }}</a></h2>
                                    <div class="actions">
                                        <div>
                                            <div class="difficulty"><i class="ico i-medium"></i><a href="#">{{ $cooking->level->name }}</a></div>
                                            <div class="comments"><i class="ico i-comments"></i><a href="">{{ $cooking->comments->count() }}</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <div class="quicklinks">
                                <a href="{{ route('site.cooking.store') }}" class="button">{{ trans('sites.moreRecipes') }}</a>
                                <a href="javascript:void(0)" class="button scroll-to-top">{{ trans('sites.backToTop') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="cwrap">
                        <header class="s-title">
                            <h2 class="ribbon bright">{{ trans('sites.latestArticles') }}</h2>
                        </header>
                        <div class="entries row">
                        @foreach($posts as $post)
                            <div class="entry one-third wow fadeInLeft">
                                <figure>
                                    <img src="{{ $post->image }}" alt="{{ $post->title }}" />
                                    <figcaption><a href="{{ route('site.blog.show', [$post->id]) }}"><i class="ico i-view"></i> <span>{{ trans('sites.view') }}</span></a></figcaption>
                                </figure>
                                <div class="container">
                                    <h2><a href="">{{ $post->title }}</a></h2>
                                    <div class="actions">
                                        <div>
                                            <div class="date"><i class="fa fa-calendar"></i><a href="#">{{ $post->created_at }}</a></div>
                                            <div class="comments"><i class="ico i-comments"></i><a href="">{{ $post->comments->count() }}</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            <div class="quicklinks">
                                <a href="{{ route('site.blog.store') }}" class="button">{{ trans('sites.morePost') }}</a>
                                <a href="javascript:void(0)" class="button scroll-to-top">{{ trans('sites.backToTop') }}</a>
                            </div>
                        </div>
                    </div>

                <section class="content full-width">
                    <div class="icons dynamic-numbers">
                        <header class="s-title wow fadeInDown">
                            <h2 class="ribbon large">{{ trans('sites.topChef') }}</h2>
                        </header>
                        <div class="row wow fadeInUp">
                        @foreach( $users_top_3 as $user)
                            <div class="entry one-third wow fadeInLeft">
                                <figure>
                                    <img src="{{ $user->avatar }}" alt="" />
                                    <figcaption><a href="{{ route('site.user.show', [$user->id]) }}"><i class="ico i-view"></i> <span>{{ trans('sites.viewMember') }}</span></a></figcaption>
                                </figure>
                                <div class="container">
                                    <h2><a href="{{ route('site.user.show', [$user->id]) }}">{{ $user->name }}</a></h2>

                                </div>
                            </div>
                            @endforeach
                            <div class="quicklinks">
                                <a href="{{ route('site.user.store') }}" class="button">{{ trans('sites.moreMaster') }}</a>
                                <a href="javascript:void(0)" class="button scroll-to-top">{{ trans('sites.backToTop') }}</a>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
    @include('sites._sections.sidebar')
        </div>
    </div>
    </main>
    @include('sites._sections.category_footer')
    @include('sites._sections.footer')
@endsection
