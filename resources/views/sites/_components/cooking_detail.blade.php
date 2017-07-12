@extends('sites.master')
@section('style')
    {!! Html::style('css/custom_cooking_detail.css') !!}
@endsection
@section('content')
    @include('sites._sections.header')
    @if($cooking->status === 1)
        <main class="main not-home" role="main">
            <!--wrap-->
            <div class="wrap clearfix">
                <!--breadcrumbs-->
                <nav class="breadcrumbs">
                    <ul>
                        <li><a href="{{ route('home') }}">{{ trans('sites.home') }}</a></li>
                        <li><a href="">{{ trans('sites.recipe') }}</a></li>
                        <li>{{ $cooking['name'] }}</li>
                    </ul>
                </nav>
                <!--//breadcrumbs-->
                
                <!--row-->
                <div class="row">
                    <!--content-->
                    <section class="content three-fourth">
                        <!--recipe-->
                            <div class="recipe">
                                <div class="row">
                                    <!--two-third-->
                                    <article class="two-third wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
                                        <header class="recipe s-title wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
                                            <h1>{{ $cooking->name }}</h1>
                                            <div class="recipe">
                                                <dl class="user">
                                                    <dt>{{ trans('sites.posted_by') }}</dt>
                                                    <dd itemprop="author" class="vcard author post-author"><span class="fn"><a href="{{ route('site.user.show', [$cooking->user->id]) }}">{{ $cooking->user['name'] }}</a></span></dd>
                                                    <dt>{{ trans('sites.posted_on') }}</dt>
                                                    <dd itemprop="datePublished" class="post-date updated">{{ $cooking->created_at }}</dd>
                                                </dl>
                                            </div>
                                        </header>
                                        <div class="image"><a href="#"><img src="{{ $cooking->image }}" alt=""></a></div>
                                        <div class="intro"><p><strong>{{ $cooking->description }}</p></div>
                                        <div class="instructions">
                                            <ol>

                                            @foreach($cooking->steps as $step)
                                                <li>
                                                    {{ $step->content }}
                                                </li>
                                            @endforeach

                                            </ol>
                                        </div>

                                        <div class="favourite col-md-3 pull-right">
                                            <a class="" onclick="window.print();" href="#"><i class="fa fa-fw fa-print" aria-hidden="true"></i> <span>{{ trans('sites.print_recipe') }}</span></a>
                                        </div>
                                    </article>
                                    <!--//two-third-->
                                    
                                    <!--one-third-->
                                    <article class="one-third wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                                        <div class="rating">
                                            <div>
                                                <div class="gdrts-inner-wrapper">
                                                    <div style="height: 20px; line-height: 20px;">
                                                    <input type="hidden" value="0" name="">
                                                        <span class="gdrts-stars-empty" style="color: #dddddd; font-size: 20px; line-height: 20px;">
                                                            <span class="gdrts-stars-active" style="color: #ff7b74; width: 0%"></span>
                                                            <span class="gdrts-stars-current" style="color: #ffc107; width: 82%"></span>
                                                        </span>
                                                    </div>
                                                    <div class="gdrts-rating-text">
                                                        {{ trans('sites.rating') }}: 
                                                        <strong>{{ $cooking->rate_point }}</strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="favourite">
                                                <a href="javascript:void(0);"><i class="fa fa-fw fa-shopping-cart" aria-hidden="true"></i> <span>{{ trans('sites.add_to_cart') }}</span></a>
                                            </div>
                                        </div>
                                        <dl class="basic">
                                            <dt>{{ trans('sites.serves') }}</dt>
                                            <dd><input type="number" name="seres" min="1" max="20" class="input" /></dd>
                                            <dt>{{ trans('sites.cooking_time') }}</dt>
                                            <dd>{{ $cooking->time }} {{ trans('sites.mins') }}</dd>
                                            <dt>{{ trans('sites.difficulty') }}</dt>
                                            <dd>{{ $cooking->level->name }}</dd>
                                        </dl>
                                        
                                        <dl class="ingredients">

                                            @foreach($cooking->cookingIngredients as $ingredient)
                                                <dt>{{ $ingredient->quantity }} {{ $ingredient->unit->name }}</dt>
                                                <dd>{{ $ingredient->ingredient->name }}</dd>
                                            @endforeach
                                        </dl>
                                        <div class="widget widget-sidebar">
                                            <h5>{{ trans('sites.recipe_category') }}</h5>
                                            <ul class="boxed">
                                                @foreach($cooking->categories as $key => $category)
                                                    @if($key % 2 == 0)
                                                        <li class="light"><a href="#"><i class="icon icon-themeenergy_pasta"></i> <span>{{ $category->name }}</span></a></li>
                                                    @else
                                                        <li class="dark"><a href="#"><i class="icon icon-themeenergy_pasta"></i> <span>{{ $category->name }}</span></a></li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="widget share">
                                            <ul class="boxed">
                                                <li class="light"><a href="#" title="Facebook"><i class="ico i-facebook"></i> <span>{{ trans('sites.share_on_facebook') }}</span></a></li>
                                                <li class="medium"><a href="#" title="Twitter"><i class="ico i-twitter"></i> <span>{{ trans('sites.share_on_twitter') }}</span></a></li>
                                                <li class="dark"><a href="#" title="Favourites"><i class="ico i-favourites"></i> <span>{{ trans('sites.add_to_favourite') }}</span></a></li>
                                            </ul>
                                        </div>
                                    </article>
                                    <!--//one-third-->
                                </div>
                            </div>
                            <!--//recipe-->

                            @include('sites._components.comments')

                    </section>
                    <!--//content-->
                </div>
                <!--//row-->
            </div>
            <!--//wrap-->
        </main>
    @else
        <div class="alert alert-warning">
            {{ trans('sites.can not find recipe!') }}
        </div>
    @endif

    @include('sites._sections.category_footer')
    @include('sites._sections.footer')

@endsection
@section('script')
    {!! Html::script('sites_custom/js/cooking.js') !!}
@endsection
