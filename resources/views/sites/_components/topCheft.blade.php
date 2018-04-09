@extends('sites.master')
@section('content')
@include('sites._sections.header')
<main class="main login" role="main">
    <div class="wrap clearfix" id="master">
        <nav class="breadcrumbs">
            <ul>
                <li><a href="index.html" title="Home">{{ trans('sites.home') }}</a></li>
                <li>{{ trans('sites.topChef') }}</li>
            </ul>
        </nav>
        <div class="row">
            <header class="s-title wow fadeInLeft">
                <h1>{{ trans('sites.topChef') }}</h1>
            </header> 
            <section class="content three-fourth wow fadeInUp">
                <div class="entries row">
                    <!--item-->
                <div v-for="item in items">
                        <div class="entry one-third wow fadeInLeft">
                            <figure>
                                <img v-bind:src="item.avatar" alt=""  style="width: 100%; height: 260px;"/>
                                <figcaption><a v-bind:href="'/site/profile/user/'+ item.id"><i class="ico i-view"></i> <span>{{ trans('sites.view') }}</span></a></figcaption>
                            </figure>
                            <div class="container">
                                <h2><a v-bind:href="'/site/profile/user/'+ item.id">@{{ item.name }}</a></h2> 
                                {{--  <div class="actions">
                                    <div>
                                          <a v-bind:href="'/site/profile/user/'+ item.id"> @{{ item.email }}</a>
                                    </div>
                                </div>  --}}
                            </div>
                        </div>                      
                    </div>
                </div>
                <nav>
                    <ul class="pagination">
                        <li v-if="pagination.current_page > 1">
                            <a href="#" @click.prevent="changePage(pagination.current_page - 1)">
                                <span aria-hidden="true">«</span>
                            </a>
                        </li>
                        <li v-for="page in pagesNumber"
                        v-bind:class="[ page == isActived ? 'active' : '']">
                        <a href="#" @click.prevent="changePage(page)">@{{ page }}</a>
                        </li>
                        <li v-if="pagination.current_page < pagination.last_page">
                            <a href="#" @click.prevent="changePage(pagination.current_page + 1)"> <span aria-hidden="true">»</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </section>              
            <!--right sidebar-->
            @include('sites._sections.sidebar')
        </div>
        </div>
    </main>
<!--//wrap-->
@include('sites._sections.footer')
@endsection
@section('script')
{{ Html::script('js/master.js') }}  
@endsection
