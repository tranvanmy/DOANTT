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
      <!--wrap-->
      <div class="wrap clearfix">
         <div class="alert alert-success text-center" v-if="cooking.status == 0">
            <span>{{ trans('sites.cooking_pending') }}</span>
         </div>
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
                                 <dd itemprop="datePublished" class="post-date updated">@{{ (cooking.created_at).slice(0, 16) }}</dd>
                                 <dt>Video</dt>
                                 <dd itemprop="datePublished" class="post-date updated">
                                    <a  href="javascript:void(0);" v-on:click="reviewYoutube">
                                    Review
                                    </a>
                                 </dd>
                                 <dt>Rate</dt>
                                 <dd itemprop="datePublished" class="post-date updated">
                                    @if(Auth::check())
                                    <a href="javascript:void(0);" v-on:click="openRate(cooking.id)">
                                    Đánh Gía
                                    </a>
                                    @else
                                    <a  href="{{ route('login') }}">
                                    Bạn cần đăng nhập để thực hiển chức năng này!
                                    </a>
                                    @endif
                                 </dd>
                              </dl>
                           </div>
                        </header>
                        <div class="image"><a href="#"><img :src="'/' + cooking.image" :alt="cooking.name" style="width: 860px; height: 450px;"></a></div>
                        <div class="intro">
                           <p><strong>@{{ cooking.description }}</p>
                        </div>
                        <div class="instructions">
                           <ol>
                              <li v-for="step in cooking.steps">
                                 @{{ step.content }}
                                 <img :src="'/' + step.image">
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
                           @if(Auth::check())
                           <div v-if="cooking.user.id != {{ Auth::user()->id }}">
                              <div v-if="inCart" class="favourite" v-on:click="removeToCart(cooking.id)">
                                 <a href="javascript:void(0);"><i class="fa fa-fw fa-shopping-cart" aria-hidden="true"></i> <span>{{ trans('sites.remove_to_cart') }}</span></a>
                              </div>
                              <div v-else="inCart" class="favourite">
                                 <div  v-if="cooking.price != '0'" v-on:click="addToCart(cooking.id)">
                                    <a href="javascript:void(0);"><i class="fa fa-fw fa-shopping-cart" aria-hidden="true"></i> <span>{{ trans('sites.add_to_cart') }}</span></a>
                                 </div>
                                 <div v-else v-on:click="noOrder">
                                    <a href="javascript:void(0);"><i class="fa fa-fw fa-shopping-cart" aria-hidden="true"></i> <span>Món ăn này bạn không thể đặt</span></a>
                                 </div>
                              </div>
                           </div>
                           @else
                           <a href="{{ route('login') }}">
                              <div  class="favourite">
                                 <i class="fa fa-fw fa-shopping-cart" aria-hidden="true"></i>
                                 <span>{{ trans('sites.add_to_cart') }}</span>
                              </div>
                           </a>
                           @endif
                        </div>
                        <dl class="basic">
                           <dd>{{ trans('sites.difficulty') }}</dd>
                           <dt>@{{ cooking.level.name }}</dt>
                           <dd>{{ trans('sites.cooking_time') }}</dd>
                           <dt>@{{ cooking.time }} Giờ </dt>
                           <dd style="width: 50%;">{{ trans('sites.serves') }}</dd>
                           <dt style="width: 50%;">@{{ cooking.ration }} Người</dt>
                           <dd>{{ trans('sites.price') }}</dd>
                           <dt>@{{ formatVND }} VND</dt>
                        </dl>
                        <dl class="ingredients">
                           <div v-for="ingredient in cooking.cooking_ingredients">
                              <dt>@{{ ingredient.quantity }} @{{ ingredient.unit.name }}</dt>
                               <a href="javascript:void(0)">
                                  <dd v-on:click="showDescription(ingredient.description)">@{{ ingredient.ingredient.name }}</dd>
                               </a>
                           </div>
                        </dl>
                        
                        <dl class="basic">
                           <dd style="width: 50%;">Khẩu Phần</dd>
                           <dt style="width: 50%;"><input type="number"  v-on:change="upvotePre" min="1" max="20" class="input"/></dt>
                        </dl>

                        <dl class="ingredients" v-if="upvoteIngeredient">
                           <div v-for="ingredient in showCookingOneShow">
                              <dt>@{{ ingredient.quantity }} @{{ ingredient.unit }}</dt>
                               <a href="javascript:void(0)">
                                  <dd v-on:click="showDescription(ingredient.description)">@{{ ingredient.ingredient }}</dd>
                               </a>
                           </div>
                        </dl>

                        <div class="widget widget-sidebar">
                           <h5>{{ trans('sites.recipe_category') }}</h5>
                           <ul class="boxed">
                              <li class="light" v-for="category in cooking.categories">
                                 <a v-bind:href="'/site/showCategory/' + category.id">
                                 <img class="ico-none" v-bind:src="category.icon" alt="">
                                 <span>
                                 @{{ category.name }}
                                 </span>
                                 </a>
                              </li>
                           </ul>
                        </div>
                        <div id="addwishlish">
                           <ul class="boxed">
                              <li class="dark">
                                 @if(Auth::check())
                                 <a v-on:click="wishlist({{ $cooking_id }})" title="Favourites">
                                    <div v-if="wishlishstatus == 0">
                                       <i class="fa fa-heart-o fa-4x"  style="margin-top: 15px;" aria-hidden="true" class="wishlishead"></i>
                                       <span>{{ trans('sites.like') }}</span>
                                    </div>
                                    <div v-else="wishlishstatus == 0" >
                                       <i class="fa fa-heartbeat fa-4x wishlishead" aria-hidden="true"></i>
                                       <span>{{ trans('sites.unlike') }}</span>
                                    </div>
                                 </a>
                                 @else
                                 <a href="{{ route('login') }}">
                                 <i class="fa fa-heartbeat fa-4x wishlishead" style="margin-top: 15px;" aria-hidden="true"></i>
                                 <span>{{ trans('sites.like') }}</span>
                                 </a>
                                 @endif
                              </li>
                           </ul>
                        </div>
                     </article>
                     <!--//one-third-->
                  </div>
                  <div class="modal fade" id="modalYotube" tabindex="-1" role="dialog" aria-labelledby="Heading" aria-hidden="true" style="display: none;">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                              </button>
                              <h4 class="modal-title custom_align" id="Heading">VIDEO</h4>
                           </div>
                           <div class="modal-body clearfix">
                              <div v-if="cooking.video_link != null" id="viewvideo">
                              </div>
                              <div v-else class="text-center">
                                 <h4 class="text-danger">KHÔNG CÓ VIDEO REVIEW</h4>
                              </div>
                           </div>
                           <div class="modal-footer ">
                              <a href="javascript:void(0)" class="btn btn-success" data-dismiss="modal">
                              <span class="glyphicon glyphicon-ok-sign"></span> OK
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal fade" id="modalRate" tabindex="-1" role="dialog" aria-labelledby="Heading" aria-hidden="true" style="display: none;">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                              </button>
                              <h4 class="modal-title custom_align" id="Heading">Số lượng người đánh gía:<span class="badge">@{{ resultRating.count }}</span></h4>
                           </div>
                           <div class="modal-body clearfix">
                              <div id="rating" class="rating">
                                 <div>
                                    <star-rating v-model="rating.point"></star-rating>
                                    <br>
                                    <textarea v-model="rating.content"></textarea>
                                    <div class="col-md-2 col-md-offset-10">
                                        <a href="javascript:void(0)" v-on:click="setRating" class="btn btn-success">
                                        <span class="glyphicon glyphicon-ok-sign"></span> OK
                                        </a>
                                    </div>
                                </div>
                                 <hr>
                                 <br>
                                 <div class="col-md-12">
                                    Danh sách đánh gía:
                                 </div>
                                 <br>
                                 <div class="clearfix"></div>
                                 <div class="col-md-12" style="margin-top: 10px; margin-bottom: 20px;"  v-for="rate in resultRating.ratesCooking">
                                    <div class="col-md-2">
                                       <img v-bind:src="rate.user.avatar" alt="" style="width: 90px;">
                                    </div>
                                    <div class="col-md-10">
                                       <star-rating v-bind:star-size="40" v-model="rate.point"></star-rating>
                                      @{{ rate.content }}
                                    </div>
                                 </div>
                              </div>
                           </div>
                           
                        </div>
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
@if (Auth::check())
<script>
   wishlish.initData({{ $wishlish ? 1 : 0 }});
</script>
@endif
@endsection