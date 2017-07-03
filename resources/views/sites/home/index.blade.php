@extends('sites.master')
@section('content')
    @include('sites._sections.header')
    <main class="main" role="main">
    @include('sites._sections.intro')
        <div class="wrap clearfix">
            <div class="row">
                <section class="content three-fourth">
                    <div class="cwrap">
                        <div class="entries row">
                            <div class="featured two-third wow fadeInLeft">
                                <header class="s-title">
                                    <h2 class="ribbon">{{ trans('sites.recipe') }}</h2>
                                </header>
                                <article class="entry">
                                    <figure>
                                        <img src="{{ asset('images/img2.jpg') }}" alt="" />
                                        <figcaption><a href=""><i class="ico i-view"></i> <span>{{ trans('sites.view') }}</span></a></figcaption>
                                    </figure>
                                    <div class="container">
                                        <h2><a href="">{{ trans('sites.honey') }}</a></h2>
                                        <p>{{ trans('sites.description') }}</p>
                                        <div class="actions">
                                            <div>
                                                <a href="#" class="button">{{ trans('sites.see') }}</a>
                                                <div class="more"><a href="recipes2.html">{{ trans('sites.seePass') }}</a></div>
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
                                        <img src="{{ asset('images/avatar1.jpg') }}" alt="" />
                                        <figcaption><a href=""><i class="ico i-view"></i> <span>{{ trans('sites.viewMember') }}</span></a></figcaption>
                                    </figure>
                                    <div class="container">
                                        <h2><a href="">{{ trans('sites.name') }}</a></h2>
                                        <blockquote>{{ trans('sites.maxim') }}</blockquote>
                                        <div class="actions">
                                            <div>
                                                <a href="#" class="button">{{ trans('sites.checkOut') }}</a>
                                                <div class="more"><a href="#">{{ trans('sites.seeMember') }}</a></div>
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
                            <div class="entry one-third wow fadeInLeft">
                                <figure>
                                    <img src="{{ asset('images/img6.jpg') }}" alt="" />
                                    <figcaption><a href=""><i class="ico i-view"></i> <span>{{ trans('sites.view') }}</span></a></figcaption>
                                </figure>
                                <div class="container">
                                    <h2><a href="">{{ trans('sites.description') }}</a></h2> 
                                    <div class="actions">
                                        <div>
                                            <div class="difficulty"><i class="ico i-medium"></i><a href="#">{{ trans('sites.level') }}</a></div>
                                            <div class="comments"><i class="ico i-comments"></i><a href="">{{ trans('sites.comment') }}</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="quicklinks">
                                <a href="#" class="button">{{ trans('sites.moreRecipes') }}</a>
                                <a href="javascript:void(0)" class="button scroll-to-top">{{ trans('sites.backToTop') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="cwrap">
                        <header class="s-title">
                            <h2 class="ribbon bright">{{ trans('sites.latestArticles') }}</h2>
                        </header>
                        <div class="entries row">
                            <div class="entry one-third wow fadeInLeft">
                                <figure>
                                    <img src="{{ asset('images/img12.jpg') }}" alt="" />
                                    <figcaption><a href=""><i class="ico i-view"></i> <span>{{ trans('sites.viewPost') }}</span></a></figcaption>
                                </figure>
                                <div class="container">
                                    <h2><a href="">{{ trans('sites.description') }}</a></h2> 
                                    <div class="actions">
                                        <div>
                                            <div class="date"><i class="ico i-date"></i><a href="#">{{ trans('sites.day') }}</a></div>
                                            <div class="comments"><i class="ico i-comments"></i><a href="">{{ trans('sites.comment') }}</a></div>
                                        </div>
                                    </div>
                                    <div class="excerpt">
                                        <p>{{ trans('sites.maxim') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="quicklinks">
                                <a href="#" class="button">{{ trans('sites.morePost') }}</a>
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
                            <div class="entry one-third wow fadeInLeft">
                                <figure>
                                    <img src="{{ asset('images/img12.jpg') }}" alt="" />
                                    <figcaption><a href=""><i class="ico i-view"></i> <span>{{ trans('sites.viewMember') }}</span></a></figcaption>
                                </figure>
                                <div class="container">
                                    <h2><a href="blog_single.html">{{ trans('sites.name') }}</a></h2> 
                                    <div class="actions">
                                        <div>
                                            <div class="date"><i class="ico i-date"></i><a href="#">{{ trans('sites.totalRecipes') }}</a></div>
                                            <div class="comments"><i class="ico i-comments"></i><a href="">{{ trans('sites.comment') }}</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="quicklinks">
                                <a href="#" class="button">{{ trans('sites.moreMaster') }}</a>
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
