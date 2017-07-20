@extends('sites.master')
@section('style')
    {!! Html::style('css/custom_cooking_detail.css') !!}
@endsection
@section('content')
    @include('sites._sections.header')
        <main class="main not-home" role="main">
            @if($cooking_id)
            <input type="hidden" value="{{$cooking_id}}" id="cooking_id">
            <div id="cooking-detail">
                <div class="alert alert-success" v-if="cooking.status == 0">
                    <span>{{ trans('sites.cooking_pending') }}</span>
                </div>
                    <!--wrap-->
                    <div class="wrap clearfix">
                        <!--breadcrumbs-->
                        <nav class="breadcrumbs">
                            <ul>
                                <li><a href="{{ route('home') }}">{{ trans('sites.home') }}</a></li>
                                <li><a href="">{{ trans('sites.recipe') }}</a></li>
                                <li>@{{ cooking.name }}</li>
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
                                                <h1>@{{ cooking.name }}</h1>
                                                <div class="recipe">
                                                    <dl class="user">
                                                        <dt>{{ trans('sites.posted_by') }}</dt>
                                                        <dd itemprop="author" class="vcard author post-author"><span class="fn"><a href="{{ route('site.user.show', $cooking_user_id) }}">@{{ cooking.user.name }}</a></span></dd>
                                                        <dt>{{ trans('sites.posted_on') }}</dt>
                                                        <dd itemprop="datePublished" class="post-date updated">@{{ cooking.created_at }}</dd>
                                                    </dl>
                                                </div>
                                            </header>
                                            <div class="image"><a href="#"><img :src="'/' + cooking.image" :alt="cooking.name"></a></div>
                                            <div class="intro"><p><strong>@{{ cooking.description }}</p></div>
                                            <div class="instructions">
                                                <ol>
                                                    <li v-for="step in cooking.steps">
                                                        @{{ step.content }}
                                                    </li>
                                                </ol>
                                            </div>
                                            <div class="favourite col-md-3 pull-right">
                                                <a class=""  @click.prevent="print()" href="#"><i class="fa fa-fw fa-print" aria-hidden="true"></i> <span>{{ trans('sites.print_recipe') }}</span></a>
                                            </div>

                                            @include('sites._components.comments')
                                        </article>
                                        <!--//one-third-->

                                        <!--one-third-->
                                        <article class="one-third wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                                            
                                            @include('sites._components.rates')

                                            <div class="">
                                                <div class="favourite">
                                                    <a href="javascript:void(0);"><i class="fa fa-fw fa-shopping-cart" aria-hidden="true"></i> <span>{{ trans('sites.add_to_cart') }}</span></a>
                                                </div>
                                            </div>
                                            <dl class="basic">
                                                <dt>{{ trans('sites.serves') }}</dt>
                                                <dd><input type="number" name="seres" min="1" max="20" class="input" /></dd>
                                                <dt>{{ trans('sites.cooking_time') }}</dt>
                                                <dd>@{{ cooking.time }} {{ trans('sites.mins') }}</dd>
                                                <dt>{{ trans('sites.difficulty') }}</dt>
                                                <dd>@{{ cooking.level.name }}</dd>
                                            </dl>
                                            
                                            <dl class="ingredients">
                                                <div v-for=" ingredient in cooking.cooking_ingredients">
                                                    <dt>@{{ ingredient.quantity }} @{{ ingredient.unit.name }}</dt>
                                                    <dd>@{{ ingredient.ingredient.name }}</dd>
                                                </div>
                                            </dl>
                                            <div class="widget widget-sidebar">
                                                <h5>{{ trans('sites.recipe_category') }}</h5>
                                                <ul class="boxed">
                                                    <li class="light" v-for="category in cooking.categories"><a><i class="icon icon-themeenergy_pasta"></i> <span>@{{ category.name }}</span></a></li>
                                                </ul>
                                            </div>
                                            <div id="addwishlish">
                                                <ul class="boxed">
                                                    <li class="dark">
                                                    @if(Auth::check())
                                                        <a v-on:click="wishlist({{ $cooking_id }})" title="Favourites">
                                                            <div v-if="wishlishstatus == 0">
                                                                <i class="fa fa-heart-o fa-4x" aria-hidden="true" class="wishlishead"></i>
                                                                <span>{{ trans('sites.like') }}</span>
                                                            </div>
                                                            <div v-else="wishlishstatus == 0" >
                                                                <i class="fa fa-heartbeat fa-4x wishlishead" aria-hidden="true"></i>
                                                                <span>{{ trans('sites.unlike') }}</span>
                                                            </div>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('login') }}">
                                                            <i class="fa fa-heartbeat fa-4x wishlishead" aria-hidden="true"></i>
                                                            <span>{{ trans('sites.like') }}</span>
                                                        </a>
                                                    @endif
                                                    </li>
                                                </ul>
                                            </div>
                                        </article>
                                        <!--//one-third-->
                                    </div>
                                </div>
                                <!--//recipe-->
                            </section>
                            <!--//content-->
                        </div>
                        <!--//row-->
                        
                    </div>
                    <!--//wrap-->
            @else
                <div class="alert alert-warning" v-else>
                    {{ trans('sites.can not find recipe!') }}
                </div>
            </div>
            @endif
        </main>

    @include('sites._sections.category_footer')
    @include('sites._sections.footer')

@endsection
@section('script')
    <script src="https://unpkg.com/vue-star-rating/dist/star-rating.min.js"></script>
    {!! Html::script('sites_custom/js/cooking.js') !!}
    {!! Html::script('js/wishlist.js') !!}
    @if (Auth::check())
    <script>
        wishlish.initData({{ $wishlish ? 1 : 0 }});
    </script>
    @endif
@endsection
