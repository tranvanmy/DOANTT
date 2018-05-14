@extends('sites.master')
@section('content')
@include('sites._sections.header')
<main class="main login" role="main" id="postlist">
    <div class="wrap clearfix">
        <nav class="breadcrumbs">
            <ul>
                <li><a href="index.html" title="Home">{{ trans('sites.home') }}</a></li>
                <li>{{ trans('sites.listPost') }}</li>
            </ul>
        </nav>
        <section class="content">
            <div class="row">
                <header class="s-title">
                    <h1>{{ trans('sites.listPost') }}</h1>
                </header>
                <div  v-for="item in items">
                        <div class="full-width">
                            <div class="container box">
                                <div class="col-md-3 text-center">
                                   <img v-bind:src="item.image" alt="" class="left  wow bounce" data-wow-delay=".4s" data-wow-duration="1s">
                               </div>
                               <div class="col-md-9 cod-md-offset-2">
                                   <h2><a v-bind:href="'/site/blog/' + item.id">@{{ item.title }}</a></h2>
                                   <p>@{{ item.description }}</p>
                               </div>
                               <div class="clearfix"></div>
                            @if(Auth::check())
                                <div v-if="(item.user.id) == {{ Auth::user()->id }}">
                                   <div v-if="item.status == 1">
                                        <div class="col-md-offset-2 approve">
                                            <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                            <span class="label label-danger">{{ trans('sites.unapproved') }}</span>
                                            | <i class="fa fa-book" aria-hidden="true"></i>
                                            <a v-bind:href="'/site/showDetail/' + item.id">{{ trans('sites.read_more') }}</a>
                                        </div> 
                                    </div>
                                    <div v-if="item.status != 1">
                                        <div class="col-md-offset-2 approve">
                                            <i class="fa fa-hand-pointer-o" aria-hidden="true"></i> 
                                            <span class="label label-success">{{ trans('sites.approved') }}</span>
                                            | <i class="fa fa-book" aria-hidden="true"></i><a v-bind:href="'/site/showDetail/' + item.id">{{ trans('sites.read_more') }}</a>
                                        </div> 
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            {{-- @endif --}}
        </div>
    </div>
</div>
<!--//row-->
</section>
</div>
<nav>
    <ul class="pagination">
        <li v-if="pagination.current_page > 1">
            <a href="#"  @click.prevent="changePage(pagination.current_page - 1)">
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
<!--//wrap-->
</main>
@include('sites._sections.footer')
@endsection
@section('script')
{{ Html::script('js/listPost.js') }}  
@endsection
