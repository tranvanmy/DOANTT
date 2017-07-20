@extends('sites.master')
@section('content')
@include('sites._sections.header')
<main class="main login" role="main">
    <div class="wrap clearfix" id="listCookingUser">
        <nav class="breadcrumbs">
            <ul>
                <li><a href="index.html" title="Home">{{ trans('sites.home') }}</a></li>
                <li>{{ trans('sites.repices') }}</li>
            </ul>
        </nav>
        <div class="row">
            <header class="s-title wow fadeInLeft">
                <h1>{{ trans('sites.repices') }}</h1>
            </header> 
            <section class="content three-fourth wow fadeInUp">
                <div class="entries row">
                    <!--item-->
                <div v-for="item in items">
                    {{-- <div v-if="item.user_id == {{ Auth::user()->id }}">
                        <div class="entry one-third wow fadeInLeft">
                            <figure>
                                <img v-bind:src="item.image" alt="" />
                                <figcaption><a v-bind:href="'/site/cooking/'+ item.id"><i class="ico i-view"></i> <span>{{ trans('sites.view') }}</span></a></figcaption>
                            </figure>
                            <div class="container">
                                <h2><a v-bind:href="'/site/cooking/'+ item.id">@{{ item.name }}</a></h2> 
                                <div class="actions">
                                    <div>
                                        <div class="difficulty">
                                            <i class="ico i-medium"></i>
                                            <a v-bind:href="'/site/cooking/'+ item.id"> @{{ item.level.name }}</a>
                                        </div>
                                        <div class="likes">
                                            <i class="fa fa-calendar" aria-hidden="true"></i> @{{ item.time }}
                                        </div>
                                        <div class="comments">
                                            <i class="fa fa-star-half-o" aria-hidden="true"></i> @{{ item.rate_point}}
                                        </div>
                                    </div>
                                    <div class="comments" v-if="item.status == 0">
                                        <span class="label label-danger">{{ trans('admin.recipe_pending') }}</span>
                                    </div>
                                     <div class="comments" v-if="item.status == 1">
                                        <span class="label label-success">{{ trans('admin.recipe_show') }}</span>
                                    </div>
                                     <div class="comments" v-if="item.status == 2">
                                        <span class="label label-warning">{{ trans('admin.recipe_editing') }}</span>
                                    </div>
                                     <div class="comments" v-if="item.status == 3">
                                        <span class="label label-success">{{ trans('admin.recipe_order') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>                      
                    </div> --}}
                    {{-- <div v-if="(item.status == 1)"> --}}
                        <div class="entry one-third wow fadeInLeft">
                            <figure>
                                <img v-bind:src="item.image" alt="" />
                                <figcaption><a v-bind:href="'/site/cooking/'+ item.id"><i class="ico i-view"></i> <span>{{ trans('sites.view') }}</span></a></figcaption>
                            </figure>
                            <div class="container">
                                <h2><a v-bind:href="'/site/cooking/'+ item.id">@{{ item.name }}</a></h2> 
                                <div class="actions">
                                    <div>
                                        <div class="difficulty">
                                            <i class="ico i-medium"></i>
                                            <a v-bind:href="'/site/cooking/'+ item.id"> @{{ item.level.name }}</a>
                                        </div>
                                        <div class="likes">
                                            <i class="fa fa-calendar" aria-hidden="true"></i> @{{ item.time }}
                                        </div>
                                        <div class="comments">
                                            <i class="fa fa-star-half-o" aria-hidden="true"></i> @{{ item.rate_point}}
                                        </div>
                                    </div>
                                        <div class="comments" v-if="item.status == 0">
                                            <span class="label label-danger">{{ trans('admin.recipe_pending') }}</span>
                                        </div>
                                         <div class="comments" v-if="item.status == 1">
                                            <a v-bind:href="'/site/cooking/'+ item.id">
                                            <span class="label label-success">{{ trans('admin.recipe_show') }}</span>
                                            </a>
                                        </div>
                                         <div class="comments" v-if="item.status == 2">
                                            <a v-bind:href="'/cooking'">
                                                <span class="label label-warning">{{ trans('admin.recipe_editing') }}</span>
                                            </a>
                                        </div>
                                         <div class="comments" v-if="item.status == 3">
                                            <span class="label label-success">{{ trans('admin.recipe_order') }}</span>
                                        </div>
                                </div>
                            </div>
                        </div>  
                    {{-- </div> --}}
                </div>
                </div>
            </section>              
            <!--right sidebar-->
            @include('sites._components.category_component')
        </div>
            <nav>
                <ul class="pagination">
                    <li v-if="pagination.current_page > 1">
                        <a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)">
                            <span aria-hidden="true">«</span>
                        </a>
                    </li>
                    <li v-for="page in pagesNumber"
                    v-bind:class="[ page == isActived ? 'active' : '']">
                    <a href="#" @click.prevent="changePage(page)">@{{ page }}</a>
                    </li>
                    <li v-if="pagination.current_page < pagination.last_page">
                        <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)"> <span aria-hidden="true">»</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </main>
<!--//wrap-->
@include('sites._sections.footer')
@endsection
@section('script')
{{ Html::script('js/listCookingUser.js') }}  
@endsection
