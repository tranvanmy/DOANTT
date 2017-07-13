@extends('sites.master')
@section('content')
@include('sites._sections.header')
<main class="main login" role="main">
    <div class="wrap clearfix" id="listByFollowsUser">
        <nav class="breadcrumbs">
            <ul>
                <li><a href="index.html" title="Home">{{ trans('sites.home') }}</a></li>
                <li>{{ trans('sites.byfollows') }}</li>
            </ul>
        </nav>
        <div class="row">
            <header class="s-title wow fadeInLeft">
                <h1>{{ trans('sites.byfollows') }}</h1>
            </header> 
            <section class="content three-fourth wow fadeInUp">
                <div class="entries row">
                    <!--item-->
                    <div v-for="item in items">
                        <div class="entry one-third wow fadeInLeft">
                            <figure>
                                <img v-bind:src="item.user.avatar" alt="" />
                                <figcaption><a v-bind:href="'/site/profile/user/'+ item.user.id"><i class="ico i-view"></i> <span>{{ trans('sites.viewInfo') }}</span></a></figcaption>
                            </figure>
                            <div class="container">
                                <h2><i class="fa fa-user-md" aria-hidden="true"></i> <a v-bind:href="'/site/profile/user/'+ item.user.id">@{{ item.user.name }}</a></h2>
                                <p><i class="fa fa-address-book" aria-hidden="true"></i> @{{item.user.email}}</p>
                            </div>
                        </div>                      
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
{{ Html::script('js/listByFollowUser.js') }}  
@endsection
