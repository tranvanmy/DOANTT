@extends('sites.master')
@section('content')
@include('sites._sections.header')
<main class="main profile" role="main">
    <!--wrap-->
    <div class="wrap clearfix" id="profile">
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
                            <a v-on:click="editItem({{ $allData['id'] }})" type="button" class="btn btn-primary btn-sm">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>{{ trans('sites.manegeAcount') }}
                            </a>
                            <a v-on:click="creatItem()" type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-key" aria-hidden="true"></i> {{ trans('sites.changePass') }}
                            </a>
                            <br/>
                        @else
                            <a v-on:click="" type="button" class="btn btn-primary btn-sm">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i> {{ trans('admin.follows') }}
                            </a>
                            <a v-on:click="" type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-phone" aria-hidden="true"></i> {{ trans('sites.contact') }}
                            </a>
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
        </div>
        <!--my recipes-->
        <div class="tab-content" id="recipes">
            <div class="entries row">
                @foreach($allData->cookings as $cooking)
                <div class="entry one-third">
                    <figure>
                        <img src="{{ $cooking->image }}" alt=""  height="250px" width="300px"/>
                        <figcaption>
                            <a href="{{ $cooking->id }}"><i class="ico i-view"></i> <span>{{ trans('sites.view') }}</span></a>
                        </figcaption>
                    </figure>
                    <div class="container">
                        <h2><a href=""> {{ $cooking->name }}</a></h2>
                        <div class="actions">
                            <div>
                                <div class="difficulty"><i class="ico i-hard"></i> {{ $cooking->level->name }}</div>
                                <div class="time"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $cooking->time }}</div>
                                <div class="rate"><i class="fa fa-star-half-o" aria-hidden="true"></i> {{ $cooking->rate_point }} </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div>
                <a href="{{ route('site.cooking', $allData['id'] ) }}" class="btn btn-success"><i class="fa fa-forward" aria-hidden="true"></i> {{ trans('sites.continue') }}</a>
            </div>
        </div>
        <!--my favorites-->
        <div class="tab-content" id="post">
            <div class="entries row">
                <!--item-->
                @foreach($allData->posts as $post)
                <div class="entry one-third">
                    <figure>
                        <img src="{{ $post->image }}" height="250px" width="300px" />
                        <figcaption><a href="{{ route('site.blog.show', [$post->id] ) }}"><i class="ico i-view"></i> <span>{{ trans('sites.view') }}</span></a></figcaption>
                    </figure>
                    <div class="container">
                        <h2><a href="{{ route('site.blog.show', [$post->id] ) }}">{{ $post->title }}</a></h2>
                        <div class="actions">
                            <div class="excerpt">
                                <p>{{ $post->description }}</p>
                                <div class="date">
                                    <i class="ico i-date"></i>{{ $post->created_at }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--item-->
            </div>
            <div>
                <a href="{{ route('site.listPost', $allData['id'] ) }}" class="btn btn-success">
                <i class="fa fa-forward" aria-hidden="true"></i> {{ trans('sites.continue') }}</a>
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
                        </div>
                    </div>
                    @endforeach
                </div>
                <div>
                    <a href="{{ route('site.follow', $allData['id'] ) }}" class="btn btn-success"><i class="fa fa-forward" aria-hidden="true"></i> {{ trans('sites.continue') }}</a>
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
                    <a href="{{ route('site.byfollow', $allData['id'] ) }}" class="btn btn-success"><i class="fa fa-forward" aria-hidden="true"></i> {{ trans('sites.continue') }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</main> 
@include('sites._sections.footer')
@endsection
