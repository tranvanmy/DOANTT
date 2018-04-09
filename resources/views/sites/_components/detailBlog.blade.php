@extends('sites.master')
@section('content')
@include('sites._sections.header')
    <input type="hidden" id="post" value="{{ $detailPost->id }}">
    <input type="hidden" id="post_type" value="posts">
<main class="main login" role="main">
    <div class="wrap clearfix" id="Detailblog">
        <nav class="breadcrumbs">
            <ul>
                <li><a href="index.html" title="Home">{{ trans('sites.home') }}</a></li>
                <li><a href="/site/blog">{{ trans('sites.blog') }}</a></li>
                <li>{{ $detailPost['title'] }}</li>
            </ul>
        </nav>
       
        <div class="row">
            <header class="s-title wow fadeInLeft">
                <h1>{{ $detailPost['title'] }}</h1>
            </header>
            <!--content-->
            <section class="content three-fourth wow fadeInLeft">
                <!--blog entry-->
                <article class="post single">
                    <div class="entry-meta">
                        <div class="avatar">
                            <a href="{{ route('site.user.show', [$detailPost->user->id]) }}">
                                <img src="{{ $detailPost->user->avatar}}" alt="" />
                                <span>{{ $detailPost->user->name }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="container">
                        <div class="entry-featured"><a href="#"><img src="{{ $detailPost->image }}" alt="" /></a></div>
                        <div class="entry-content">
                            {!! $detailPost->content !!}
                        </div>
                    </div>
                    @if(Auth::check())
                        @if((Auth::user()->id) == ($detailPost->user->id))
                            @if( ($detailPost->status) == 1)
                                <div class="col-md-4 col-md-offset-9 custom_blog">
                                    <a v-on:click="editPost({{ $detailPost->id }})" class="btn btn-default">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        <span class="text-success">{{ trans('sites.edit') }}</span>
                                    </a>
                                    <a v-on:click="comfirmDeleteItem({{ $detailPost->id }})" class="btn btn-default">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        <span class="text-danger">{{ trans('sites.delete') }}</span>
                                    </a>
                                </div>
                            @endif
                        @endif
                    @endif
              </article>
              <!--comments-->
              @include('sites._components.comments')
          </section>
          <!--right sidebar-->
          @include('sites._sections.sidebar')
          <!--//right sidebar-->
      </div>
      <!--//row-->
    <div class="modal fade" id="delete-item" tabindex="-1" role="dialog" aria-labelledby="Heading" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                        {{ trans('sites.deletePost') }}
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="text-danger">
                        <h4>
                        <span class="glyphicon glyphicon-warning-sign"></span> {{ trans('admin.user_comfirm_delete') . ': ' }}
                            <span class="text-success">
                                @{{ deleteItem.title }}
                            </span>
                        </h4>
                    </div>
                </div>  
                <div class="modal-footer ">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                       <i class="fa fa-times" aria-hidden="true"></i>
                        {{ trans('admin.no') }}
                    </button>
                    @if(Auth::check())
                    <a href="javascript:void(0)" v-on:click="delItem(deleteItem.id, {{ Auth::user()->id }})" class="btn btn-danger">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        {{ trans('admin.yes') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div id="updatePost" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        <i class="fa fa-paint-brush" aria-hidden="true"></i> {{ trans('sites.edit') }}
                    </h4>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="Updatepost(fillPost.id)">
                        <div class="form-group">
                            <div class="form-group col-md-12" >
                                <label for="name">{{ trans('sites.title') }}</label>
                                <input type="text" name="title" class="form-control" v-model="fillPost.title" />
                                <span v-if="formPostErrors['title']" class="error text-danger">@{{ formPostErrors['title'][0] }}</span><br>
                                <br/>
                            </div>
                            <div class="form-group col-md-5">
                                <div class="img-circle">
                                    <img v-bind:src="fillPost.image" alt="" class="" id="imgprofile">
                                </div>
                            </div>
                            <div>
                                <div class="file-upload-form">
                                    <input type="file" @change="previewImage" accept="image/*" name="image">
                                </div>
                                <div class="image-preview" v-if="imageData.length > 0">
                                    <img class="preview" :src="imageData">
                                </div>
                            </div>
                            <br/>
                            <div class="form-group col-md-12" >
                                <label for="name">{{ trans('sites.description') }}</label>
                                <textarea type="text" name="description" class="form-control" cols="10"></textarea>
                                <span v-if="formPostErrors['description']" class="error text-danger">@{{ formPostErrors['description'][0] }}</span>
                                <br/>
                            </div>
                            <br/>
                            <div class="form-group col-md-12" >
                                <label for="name">{{ trans('sites.content') }}</label>
                                <textarea class="ckeditor" id="my-editor" name="content" class="form-control" v-model="fillPost.content"  rows="10" ></textarea> 
                                <span v-if="formPostErrors['content']" class="error text-danger">@{{ formPostErrors['content'][0] }}</span>
                                <br/>                                
                            </div>
                            <script>
                                
                            </script>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-md-3 pull-right submitProfile">
                            <button type="submit" class="btn btn-success">{{ trans('sites.post') }}</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('sites.close') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
  <!--//wrap-->
</main>
@include('sites._sections.footer')
@endsection

@section('script')
{{ Html::script('js/detalt_blog.js') }} 
@endsection
