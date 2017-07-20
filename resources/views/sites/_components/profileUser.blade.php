@extends('sites.master')
@section('content')
@include('sites._sections.header')
<main class="main profile"  id="profile" role="main">
    <!--wrap-->
    <div class="wrap clearfix">
        <!--breadcrumbs-->
        <nav class="breadcrumbs">
            <ul>
                <li>
                    <a href="">{{ trans('sites.home') }}</a>
                </li>
                <li>{{  $allData['name']}}</li>
            </ul>
        </nav>
        <!--content-->
        <section class="content col-md-12">
            <!--row-->
            <div class="row">
                <div class="panel panel-widget panel-default my_account one-fourth wow fadeInLeft img-circle col-md-3">
                    <div class="form-group">
                        <div class="text-center col-md-8" id="avatarProfile">
                            <img src="{{ $allData['avatar'] }}" class="img-circle img-bor"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="profile_user text-center">
                        <h3 class="user_name_max">{{ $allData['name'] }}</h3>
                        <p>{{ $allData['email'] }}</p>
                    </div>
                    &nbsp;&nbsp;
                    <div class="profile_user text-center">
                        @if((Auth::user()->id) == $allData['id'])
                        <a v-on:click="editItem({{ $allData['id'] }})" type="button" class="btn btn-default btn-sm ">
                            <span class="text-danger editPostSpan">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i> {{ trans('sites.manegeAcount') }}
                            </span>
                        </a>
                        <a v-on:click="creatItem()" type="button" class="btn btn-default btn-sm">
                            <span class="text-success">
                                <i class="fa fa-key" aria-hidden="true"></i> {{ trans('sites.changePass') }}
                            </span>
                        </a>
                        <br/>
                        @else
                        <div id="followUser">
                            <div>
                                <a v-on:click="follow({{ $allData['id'] }})" type="button" class="btn btn-default">
                                    <span v-if="statusFollow == 0" class="text-success">
                                        <i class="fa fa-rss-square" aria-hidden="true"></i> {{ trans('admin.follows') }}
                                    </span>
                                    <span v-else="statusFollow == 0" class="text-danger" >
                                        <i class="fa fa-rss" aria-hidden="true"></i> {{ trans('sites.unfollows') }}
                                    </span>
                                </a>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                {{-- edit account --}}
                <div id="edititem" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> {{ trans('sites.manegeAcount') }}</h4>
                            </div>
                            <div class="modal-body">
                               <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.id)">
                                <div class="form-group">
                                    <div class="form-group col-md-6" >
                                        <label for="name">{{ trans('sites.name') }}</label>
                                        <input type="text" name="name" class="form-control" v-model="fillItem.name" />
                                        <span v-if="formErrorsUpdate['name']" class="error text-danger">@{{ formErrorsUpdate['name'][0] }}</span><br>
                                        <br/>
                                    </div>
                                    <div class="form-group col-md-6" >
                                        <label for="name">{{ trans('sites.phone') }}</label>
                                        <input type="text" name="phone" class="form-control" v-model="fillItem.phone" />
                                        <span v-if="formErrorsUpdate['phone']" class="error text-danger">@{{ formErrorsUpdate['phone'][0] }}</span><br>
                                        <br/>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-md-5">
                                    <div class="img-circle">
                                        <img v-bind:src="fillItem.avatar" alt="" class="" id="imgprofile">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <br>
                                <div>
                                    <div class="file-upload-form">
                                        <input type="file" @change="previewImage" accept="image/*" name="avatar">
                                    </div>
                                    <div class="image-preview" v-if="imageData.length > 0">
                                        <img class="preview" :src="imageData">
                                    </div>
                                     <span v-if="formErrorsUpdate['avatar']" class="error text-danger">@{{ formErrorsUpdate['avatar'][0] }}</span><br>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-md-3 pull-right submitProfile">
                                    <button type="submit" class="btn btn-success">{{ trans('sites.update') }}</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('sites.close') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="addpost" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">
                                    <i class="fa fa-paint-brush" aria-hidden="true"></i> {{ trans('sites.addPost') }}
                                </h4>
                            </div>
                            <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="createPost">
                                <div class="form-group">
                                    <div class="form-group col-md-12" >
                                        <label for="name">{{ trans('sites.title') }}</label>
                                        <input type="text" name="title" class="form-control" v-model="postItem.title" />
                                        <span v-if="formPostErrors['title']" class="error text-danger">@{{ formPostErrors['title'][0] }}</span><br>
                                        <br/>
                                    </div>
                                    <div>
                                        <div class="file-upload-form">
                                            <input type="file" @change="previewImage" accept="image/*" name="image">
                                        </div>
                                        <div class="image-preview" v-if="imageData.length > 0">
                                            <img class="preview" :src="imageData">
                                        </div>
                                        <span v-if="formPostErrors['image']" class="error text-danger">@{{ formPostErrors['image    '][0] }}</span>
                                    </div>
                                        <br/>
                                    <div class="form-group col-md-12" >
                                        <label for="name">{{ trans('sites.description') }}</label>
                                        <textarea type="text" name="description" class="form-control" v-model="postItem.description" cols="10"></textarea>
                                        <span v-if="formPostErrors['description']" class="error text-danger">@{{ formPostErrors['description'][0] }}</span>
                                        <br/>
                                    </div>
                                        <br/>
                                    <div class="form-group col-md-12" >
                                        <label for="name">{{ trans('sites.content') }}</label>
                                        <textarea class="ckeditor" id="my-editor" name="content" class="form-control" v-model="postItem.content"  rows="10" ></textarea> 
                                        <span v-if="formPostErrors['content']" class="error text-danger">@{{ formPostErrors['content'][0] }}</span><br>
                                        <br/>
                                    </div>
                                    <script>
                                        CKEDITOR.replace('my-editor', options);
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
            <div id="editpass" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-key" aria-hidden="true"></i>{{ trans('sites.editpass') }}</h4>
                        </div>
                        <div class="clearfix"></div>
                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updatePass({{ $allData['id'] }})">
                            <div class="col-md-6" >
                                <label for="name">{{ trans('admin.password') }}</label>
                                <input type="password" name="password" class="form-control" v-model="passItem.password" />
                                <span v-if="formErrorsUpdate['password']" class="error text-danger">@{{ formErrorsUpdate['password'][0] }}</span>
                            </div>
                            <div class="col-md-6" >
                                <label for="name">{{ trans('admin.confirm_pass') }}</label>
                                <input type="password" name="confirm_pass" class="form-control" v-model="passItem.confirm_pass" />
                                <span v-if="formErrorsUpdate['confirm_pass']" class="error text-danger">@{{ formErrorsUpdate['confirm_pass'][0] }}</span><br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('sites.close') }}</button>
                                <button type="submit" class="btn btn-success">{{ trans('sites.update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{--Add Post--}}
            <div class="three-fourth wow fadeInRight">
                <nav class="tabs">
                    <ul>
                        <li class="active"><a href="#about" title="About me">{{ trans('sites.aboutMe') }}</a></li>
                        <li><a href="#recipes"   title="My recipes">{{ trans('sites.myRicepes') }}</a></li>
                        <li><a href="#post" title="My post">{{ trans('sites.myPost') }}</a></li>
                        <li><a href="#follows" title="My follows">{{ trans('sites.follow') }}</a></li>
                    </ul>
                </nav>
                <!--about-->
                <div class="tab-content" id="about">
                    <div class="row">
                        <div class="col-md-8">
                            <dl class="basic two-third">
                                <dt>{{ trans('sites.name') }}</dt>
                                <dd>{{ $allData->name }}</dd>
                                <dt>{{ trans('sites.gmail') }}</dt>
                                <dd>{{ $allData->email }}</dd>
                                <dt>{{ trans('sites.phone') }}</dt>
                                <dd>{{ $allData->phone}}</dd>
                                <dt>{{ trans('sites.level') }}</dt>
                                @if($allData->level)
                                <dd>{{ $allData->level->name }}</dd>
                                @else
                                <dd>{{ trans('sites.newUser') }}</dd>
                                @endif
                                <dt>{{ trans('sites.totalPost') }}</dt>
                                <dd>{{ $totalPost }}</dd>
                                <dt>{{ trans('sites.totalCookings') }}</dt>
                                <dd>{{ $totalCookings }}</dd>
                            </dl>
                        </div>
                         @if((Auth::user()->id) == $allData['id'])
                        <div class="col-md-4">
                            <div class="panel panel-info">
                                <div class="panel-heading text-center"> {{ trans('sites.addPost') }}</div>
                                <div class="panel-body text-center">
                                    <dd>
                                        <a v-on:click="addPost()"  class="btn btn-default">
                                        <span class="text-success">
                                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                                            {{ trans('sites.creatpost') }}
                                        </span>
                                        </a>
                                    </dd>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <!--my recipes-->
                <div class="tab-content" id="recipes">
                    <div class="entries row">
                        @foreach($allData->cookings as $cooking)
                            @if((Auth::user()->id) == $allData['id'])
                                <div class="entry one-third">
                                    <figure>
                                        <img src="{{ $cooking->image }}" alt=""/>
                                        <figcaption>
                                            <a href="{{ asset('/site/cooking/'.$cooking->id) }}"><i class="ico i-view"></i> <span>{{ trans('sites.view') }}</span></a>
                                        </figcaption>
                                    </figure>
                                    <div class="container">
                                        <h2><a href="{{ asset('/site/cooking/'.$cooking->id) }}"> {{ $cooking->name }}</a></h2>
                                        <div class="actions">
                                            <div>
                                                <div class="difficulty">
                                                    <i class="ico i-hard"></i>
                                                    {{ $cooking->level->name }}
                                                </div>
                                                <div class="time">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        {{ $cooking->time }}
                                                </div>
                                                <div class="rate">
                                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                        {{ $cooking->rate_point }}
                                                </div>
                                            </div>
                                                @if( ($cooking->status) == 0 )
                                                <div class="rate">
                                                    <span class="label label-danger">{{ trans('admin.recipe_pending') }}</span>
                                                </div>
                                                @elseif(($cooking->status) == 1)
                                                <div class="rate">
                                                <a href="{{ asset('/site/cooking/'.$cooking->id) }}">
                                                    <span class="label label-success">{{ trans('admin.recipe_show') }}</span>
                                                </a>
                                                </div>
                                                @elseif(($cooking->status) == 2)
                                                    <div class="rate">
                                                     <a href="{{asset('cooking')}}">
                                                        <span class="label label-warning">{{ trans('admin.recipe_editing') }}</span>
                                                    </a>
                                                    </div>
                                                @else
                                                    <div class="rate">
                                                    <span class="label label-success">{{ trans('admin.recipe_order') }}</span>
                                                    </div>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            @elseif(($cooking->status) == 1)
                                <div class="entry one-third">
                                    <figure>
                                        <img src="{{ $cooking->image }}" alt=""/>
                                        <figcaption>
                                            <a href="{{ $cooking->id }}"><i class="ico i-view"></i> <span>{{ trans('sites.view') }}</span></a>
                                        </figcaption>
                                    </figure>
                                    <div class="container">
                                        <h2><a href=""> {{ $cooking->name }}</a></h2>
                                        <div class="actions">
                                            <div>
                                                <div class="difficulty">
                                                    <i class="ico i-hard"></i>
                                                    {{ $cooking->level->name }}
                                                </div>
                                                <div class="time">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    {{ $cooking->time }}
                                                </div>
                                                <div class="rate">
                                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                    {{ $cooking->rate_point }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div>
                        <a href="{{ route('site.cooking', $allData['id'] ) }}" class="btn btn-default">
                            <i class="fa fa-forward" aria-hidden="true"></i>
                            <span class="text-success">{{ trans('sites.continue') }}</span>
                        </a>
                    </div>
                </div>
                <!--my favorites-->
                <div class="tab-content" id="post">
                    <div class="entries row">
                        <!--item-->
                        @foreach($allData->posts as $post)
                            @if((Auth::user()->id) == $allData['id'])
                                <div class="entry one-third">
                                    <figure>
                                        <img src="{{ $post->image }}"/>
                                        <figcaption><a href="{{ route('site.blog.show', [$post->id] ) }}"><i class="ico i-view"></i> <span>{{ trans('sites.view') }}</span></a></figcaption>
                                    </figure>
                                    <div class="container">
                                        <h2><a href="{{ route('site.blog.show', [$post->id] ) }}">{{ $post->title }}</a></h2>
                                        <div class="actions">
                                            <div class="excerpt">
                                                <div class="date">
                                                    <i class="ico i-date"></i>{{ $post->created_at }}</a>
                                                </div>
                                                @if(($post->status) == 1)
                                                    <div class="prouser">
                                                        <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                                        <span class="label label-danger">{{ trans('sites.unapproved') }}</span>
                                                    </div>
                                                @else
                                                    <div class="prouser">
                                                        <i class="fa fa-hand-pointer-o" aria-hidden="true"></i> 
                                                        <span class="label label-success">{{ trans('sites.approved') }}</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            @elseif(($post->status) != 1)
                                <div class="entry one-third">
                                    <figure>
                                        <img src="{{ $post->image }}"/>
                                        <figcaption>
                                            <a href="{{ route('site.blog.show', [$post->id] ) }}">
                                                <i class="ico i-view"></i>
                                                <span>{{ trans('sites.view') }}</span>
                                            </a>
                                        </figcaption>
                                    </figure>
                                    <div class="container">
                                        <h2><a href="{{ route('site.blog.show', [$post->id] ) }}">{{ $post->title }}</a></h2>
                                        <div class="actions">
                                            <div class="excerpt">
                                                <div class="date">
                                                    <i class="ico i-date"></i>{{ $post->created_at }}</a>
                                                </div>
                                                @if((Auth::user()->id) == $allData['id'])
                                                    @if(($post->status) == 1)
                                                        <div class="prouser">
                                                            <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                                            <span class="label label-danger">{{ trans('sites.unapproved') }}</span>
                                                        </div>
                                                    @else
                                                        <div class="prouser">
                                                            <i class="fa fa-hand-pointer-o" aria-hidden="true"></i> 
                                                            <span class="label label-success">{{ trans('sites.approved') }}</span>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <!--item-->
                    </div>
                        <div>
                            <a href="{{ route('site.listPost', $allData['id'] ) }}" class="btn btn-default">
                                <i class="fa fa-forward" aria-hidden="true"></i>
                                <span class="text-success">{{ trans('sites.continue') }}</span>
                            </a>
                        </div>
                    </div>
                    <div class="tab-content" id="follows">
                        <div class="entries row">
                            <nav class="tabs" id="followTabs1">
                                <ul>
                                    <li class="active">
                                        <a href="#follow" id="followU">{{ trans('sites.follow') }}</a>
                                    </li>
                                    <li>
                                        <a href="#byfollow" id="follows" >{{  trans('sites.byfollow') }}</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="tab-content" id="follow">
                            <div class="entries row">
                                @foreach($allData->follows as $follow)
                                    <div class="entry one-third">
                                        <figure>
                                            <img src="{{ ($follow->userFollow->avatar) }}" alt=""  height="250px" width="300px"/>
                                            <figcaption>
                                                <a href="{{ ($follow->userFollow->id) }}"><i class="ico i-view"></i> <span>{{ trans('sites.view') }}</span></a>
                                            </figcaption>
                                        </figure>
                                        <div class="container">
                                            <h2><a href="{{ ($follow->userFollow->id) }}"><i class="fa fa-user-md" aria-hidden="true"></i> {{ ($follow->userFollow->name) }}</a></h2>
                                            <p><i class="fa fa-address-book" aria-hidden="true"></i> | {{ $follow->userFollow->email }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div>
                                <a href="{{ route('site.follow', $allData['id'] ) }}" class="btn btn-default">
                                    <i class="fa fa-forward" aria-hidden="true"></i>
                                    <span class="text-success">{{ trans('sites.continue') }}</span>
                                </a>
                            </div>
                        </div>
                        <div class="tab-content" id="byfollow">
                            <div class="entries row">
                                @foreach($allData->followBys as $byFollow)
                                    <div class="entry one-third">
                                        <figure>
                                            <img src="{{ ($byFollow->user->avatar) }}" alt=""  height="250px" width="300px"/>
                                            <figcaption>
                                                <a href="{{ ($byFollow->user->id) }}">
                                                    <i class="ico i-view"></i>
                                                    <span>{{ trans('sites.view') }}</span>
                                                </a>
                                            </figcaption>
                                        </figure>
                                        <div class="container">
                                            <h2>
                                                <a href="{{ ($byFollow->user->id) }}">
                                                    <i class="fa fa-user-md" aria-hidden="true"></i> {{ ($byFollow->user->name) }}
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div>
                                <a href="{{ route('site.byfollow', $allData['id'] ) }}" class="btn btn-default">
                                    <i class="fa fa-forward" aria-hidden="true"></i>
                                    <span class="text-success">{{ trans('sites.continue') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    @include('sites._sections.footer')
    @endsection
    @section('script')
    {{ Html::script('bower/ckeditor/ckeditor.js') }}
    <script>
      var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    </script>
    <script>
        followView.statusFollow = {{ $statusfollow ? 1 : 0 }};
    </script>
    @endsection
