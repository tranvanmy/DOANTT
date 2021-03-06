<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sites._sections.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<main class="main profile"  id="profile" role="main">
    <!--wrap-->
    <div class="wrap clearfix">
        <!--breadcrumbs-->
        <nav class="breadcrumbs">
            <ul>
                <li>
                    <a href=""><?php echo e(trans('sites.home')); ?></a>
                </li>
                <li><?php echo e($allData['name']); ?></li>
            </ul>
        </nav>
        <!--content-->
        <section class="content col-md-12">
            <!--row-->
            <div class="row">
                <div class="panel panel-widget panel-default my_account one-fourth wow fadeInLeft img-circle col-md-3">
                    <div class="form-group">
                        <div class="text-center col-md-8" id="avatarProfile" style="margin-top: 15px;">
                            <img src="<?php echo e($allData['avatar']); ?>" class=""/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="profile_user text-center">
                        <h3 class="user_name_max"><?php echo e($allData['name']); ?></h3>
                        <p><?php echo e($allData['email']); ?></p>
                    </div>
                    <div class="profile_user text-center">
                    <?php if(Auth::check()): ?>
                        <?php if((Auth::user()->id) == ($allData['id'])): ?>
                        <a v-on:click="editItem(<?php echo e($allData['id']); ?>)" type="button" class="btn btn-default btn-sm ">
                            <span class="text-danger editPostSpan">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i> <?php echo e(trans('sites.manegeAcount')); ?>

                            </span>
                        </a>
                        <a v-on:click="creatItem()" type="button" class="btn btn-default btn-sm">
                            <span class="text-success">
                                <i class="fa fa-key" aria-hidden="true"></i> <?php echo e(trans('sites.changePass')); ?>

                            </span>
                        </a>
                        <br/>
                        <?php else: ?>
                        <div id="followUser">
                            <div>
                                <a v-on:click="follow(<?php echo e($allData['id']); ?>)" type="button" class="btn btn-default">
                                    <span v-if="statusFollow == 0" class="text-success">
                                        <i class="fa fa-rss-square" aria-hidden="true"></i> <?php echo e(trans('admin.follows')); ?>

                                    </span>
                                    <span v-else="statusFollow == 0" class="text-danger" >
                                        <i class="fa fa-rss" aria-hidden="true"></i> <?php echo e(trans('sites.unfollows')); ?>

                                    </span>
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    </div>
                </div>
                <div id="edititem" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> <?php echo e(trans('sites.manegeAcount')); ?></h4>
                            </div>
                            <div class="modal-body">
                               <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.id)">
                                <div class="form-group">
                                    <div class="form-group col-md-6" >
                                        <label for="name"><?php echo e(trans('sites.name')); ?></label>
                                        <input type="text" name="name" class="form-control" v-model="fillItem.name" />
                                        <span v-if="formErrorsUpdate['name']" class="error text-danger">{{ formErrorsUpdate['name'][0] }}</span><br>
                                        <br/>
                                    </div>
                                    <div class="form-group col-md-6" >
                                        <label for="name"><?php echo e(trans('sites.phone')); ?></label>
                                        <input type="text" name="phone" class="form-control" v-model="fillItem.phone" />
                                        <span v-if="formErrorsUpdate['phone']" class="error text-danger">{{ formErrorsUpdate['phone'][0] }}</span><br>
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
                                     <span v-if="formErrorsUpdate['avatar']" class="error text-danger">{{ formErrorsUpdate['avatar'][0] }}</span><br>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-md-3 pull-right submitProfile">
                                    <button type="submit" class="btn btn-success"><?php echo e(trans('sites.update')); ?></button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('sites.close')); ?></button>
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
                                    <i class="fa fa-paint-brush" aria-hidden="true"></i> <?php echo e(trans('sites.addPost')); ?>

                                </h4>
                            </div>
                            <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="createPost">
                                <div class="form-group">
                                    <div class="form-group col-md-12" >
                                        <label for="name"><?php echo e(trans('sites.title')); ?></label>
                                        <input type="text" name="title" class="form-control" v-model="postItem.title" />
                                        <span v-if="formPostErrors['title']" class="error text-danger">{{ formPostErrors['title'][0] }}</span><br>
                                        <br/>
                                    </div>
                                    <div>
                                        <div class="file-upload-form">
                                            <input type="file" @change="previewImage" accept="image/*" name="image">
                                        </div>
                                        <div class="image-preview" v-if="imageData.length > 0">
                                            <img class="preview" :src="imageData">
                                        </div>
                                        <span v-if="formPostErrors['image']" class="error text-danger">{{ formPostErrors['image'][0] }}</span>
                                    </div>
                                        <br/>
                                    <div class="form-group col-md-12" >
                                        <label for="name"><?php echo e(trans('sites.description')); ?></label>
                                        <textarea type="text" name="description" class="form-control" v-model="postItem.description" cols="10"></textarea>
                                        <span v-if="formPostErrors['description']" class="error text-danger">{{ formPostErrors['description'][0] }}</span>
                                        <br/>
                                    </div>
                                        <br/>
                                    <div class="form-group col-md-12" >
                                        <label for="name"><?php echo e(trans('sites.content')); ?></label>
                                        <textarea class="ckeditor" id="my-editor" name="content" class="form-control" v-model="postItem.content"  rows="10" ></textarea> 
                                        <span v-if="formPostErrors['content']" class="error text-danger">{{ formPostErrors['content'][0] }}</span><br>
                                        <br/>
                                    </div>
                                    <script>
                                        CKEDITOR.replace('my-editor', options);
                                    </script>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-md-3 pull-right submitProfile">
                                    <button type="submit" class="btn btn-success"><?php echo e(trans('sites.post')); ?></button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('sites.close')); ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="editpass" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-key" aria-hidden="true"></i><?php echo e(trans('sites.editpass')); ?></h4>
                        </div>
                        <div class="clearfix"></div>
                        <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="updatePass(<?php echo e($allData['id']); ?>)">
                            <div class="col-md-6" >
                                <label for="name"><?php echo e(trans('admin.password')); ?></label>
                                <input type="password" name="password" class="form-control" v-model="passItem.password" />
                                <span v-if="formErrorsUpdate['password']" class="error text-danger">{{ formErrorsUpdate['password'][0] }}</span>
                            </div>
                            <div class="col-md-6" >
                                <label for="name"><?php echo e(trans('admin.confirm_pass')); ?></label>
                                <input type="password" name="confirm_pass" class="form-control" v-model="passItem.confirm_pass" />
                                <span v-if="formErrorsUpdate['confirm_pass']" class="error text-danger">{{ formErrorsUpdate['confirm_pass'][0] }}</span><br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('sites.close')); ?></button>
                                <button type="submit" class="btn btn-success"><?php echo e(trans('sites.update')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="three-fourth wow fadeInRight">
                <nav class="tabs">
                    <ul>
                        <li class="active"><a href="#about" title="About me"><?php echo e(trans('sites.aboutMe')); ?></a></li>
                        <li><a href="#recipes"   title="My recipes"><?php echo e(trans('sites.myRicepes')); ?></a></li>
                        <li><a href="#post" title="My post"><?php echo e(trans('sites.myPost')); ?></a></li>
                        <li><a href="#follows" title="My follows"><?php echo e(trans('sites.follow')); ?></a></li>
                    </ul>
                </nav>
                <!--about-->
                <div class="tab-content" id="about">
                    <div class="row">
                        <div class="col-md-8">
                            <dl class="basic two-third">
                                <dt><?php echo e(trans('sites.name')); ?></dt>
                                <dd><?php echo e($allData->name); ?></dd>
                                <dt><?php echo e(trans('sites.gmail')); ?></dt>
                                <dd><?php echo e($allData->email); ?></dd>
                                <dt><?php echo e(trans('sites.phone')); ?></dt>
                                <dd><?php echo e($allData->phone); ?></dd>
                                <dt><?php echo e(trans('sites.level')); ?></dt>
                                <?php if($allData->level): ?>
                                <dd><?php echo e($allData->level->name); ?></dd>
                                <?php else: ?>
                                <dd><?php echo e(trans('sites.newUser')); ?></dd>
                                <?php endif; ?>
                                <dt><?php echo e(trans('sites.totalPost')); ?></dt>
                                <dd><?php echo e($totalPost); ?></dd>
                                <dt><?php echo e(trans('sites.totalCookings')); ?></dt>
                                <dd><?php echo e($totalCookings); ?></dd>
                            </dl>
                        </div>
                    <?php if(Auth::check()): ?>
                        <?php if((Auth::user()->id) == $allData['id']): ?>)
                        <div class="col-md-4">
                            <div class="panel panel-info">
                                <div class="panel-heading text-center"> <?php echo e(trans('sites.addPost')); ?></div>
                                <div class="panel-body text-center">
                                    <dd>
                                        <a v-on:click="addPost()"  class="btn btn-default">
                                        <span class="text-success">
                                            <i class="fa fa-bookmark" aria-hidden="true"></i>
                                            <?php echo e(trans('sites.creatpost')); ?>

                                        </span>
                                        </a>
                                    </dd>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    </div>
                </div>
                <!--my recipes-->
                <div class="tab-content" id="recipes">
                    <div class="entries row">
                        <?php $__currentLoopData = $allData->cookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cooking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="entry one-third">
                                    <figure>
                                        <img src="/<?php echo e($cooking->image); ?>" alt=""/>
                                            <figcaption>
                                            <?php if( $cooking->status != 2 ): ?>
                                                <a href="<?php echo e(asset('/site/cooking/'.$cooking->id)); ?>"><i class="ico i-view"></i> <span><?php echo e(trans('sites.view')); ?></span></a>
                                            <?php else: ?>
                                                <a href="javascript:void(0)" v-on:click="alertEdit">
                                                    <i class="ico i-view"></i> <span>Đang Chỉnh Sửa</span>
                                                </a>
                                            <?php endif; ?>
                                            </figcaption>
                                    </figure>
                                    <div class="container">
                                        <h2 class="ellipis"><?php echo e($cooking->name); ?></h2>
                                        <div class="actions">
                                            <div>
                                                <div class="difficulty">
                                                    <?php echo e($cooking->level->name); ?>

                                                </div>
                                                <div class="time">
                                                   Thời Gian:
                                                    <?php echo e($cooking->time); ?> h
                                                </div>
                                                <div class="rate">
                                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                     <?php echo e($cooking->rate_point); ?>

                                                </div>
                                            </div>
                                        <?php if(Auth::check()): ?>
                                            <?php if(Auth::user()->id == $allData['id']): ?>
                                                <?php if( $cooking->status == 0 ): ?>
                                                <div class="rate">
                                                <a href="<?php echo e(route('editcooking', $cooking->id )); ?>">
                                                    <span class="label label-danger"><?php echo e(trans('admin.recipe_pending')); ?></span>
                                                </a>
                                                </div>
                                                <?php elseif($cooking->status == 1): ?>
                                                <div class="rate">
                                                <a href="<?php echo e(asset('/site/cooking/'.$cooking->id)); ?>">
                                                    <span class="label label-success"><?php echo e(trans('admin.recipe_show')); ?></span>
                                                </a>
                                                </div>
                                                <?php elseif($cooking->status == 2): ?>
                                                    <div class="rate">
                                                     <a href="<?php echo e(asset('/cooking')); ?>">
                                                        <span class="label label-warning"><?php echo e(trans('admin.recipe_editing')); ?></span>
                                                    </a>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="rate">
                                                    <span class="label label-success"><?php echo e(trans('admin.recipe_order')); ?></span>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div>
                        <a href="<?php echo e(route('site.cooking', $allData['id'] )); ?>" class="btn btn-default">
                            <i class="fa fa-forward" aria-hidden="true"></i>
                            <span class="text-success"><?php echo e(trans('sites.continue')); ?></span>
                        </a>
                    </div>
                </div>
                <!--my favorites-->
                <div class="tab-content" id="post">
                    <div class="entries row">
                        <!--item-->
                        <?php $__currentLoopData = $allData->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="entry one-third">
                                    <figure style="height: 150px;">
                                        <img src="<?php echo e($post->image); ?>"/>
                                        <figcaption><a href="<?php echo e(route('site.blog.show', [$post->id] )); ?>"><i class="ico i-view"></i> <span>Xem bài viết</span></a></figcaption>
                                    </figure>
                                    <div class="container">
                                        <h2 class="ellipis"><a href="<?php echo e(route('site.blog.show', [$post->id] )); ?>"><?php echo e($post->title); ?></a></h2>
                                        <div class="actions">
                                            <div class="excerpt">
                                                <div class="date">
                                                    <i class="ico i-date"></i><?php echo e($post->created_at); ?></a>
                                                </div>
                                                    <?php if(Auth::check()): ?>
                                                        <?php if(Auth::user()->id == $allData['id']): ?>
                                                            <?php if($post->status == 1): ?>
                                                                <div class="prouser">
                                                                    <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                                                    <span class="label label-danger"><?php echo e(trans('sites.unapproved')); ?></span>
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="prouser">
                                                                    <i class="fa fa-hand-pointer-o" aria-hidden="true"></i> 
                                                                    <span class="label label-success"><?php echo e(trans('sites.approved')); ?></span>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?> 
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!--item-->
                    </div>
                        <div>
                            <a href="<?php echo e(route('site.listPost', $allData['id'] )); ?>" class="btn btn-default">
                                <i class="fa fa-forward" aria-hidden="true"></i>
                                <span class="text-success"><?php echo e(trans('sites.continue')); ?></span>
                            </a>
                        </div>
                    </div>
                    <div class="tab-content" id="follows">
                        <div class="entries row">
                            <nav class="tabs" id="followTabs1">
                                <ul>
                                    <li class="active">
                                        <a href="#follow" id="followU"><?php echo e(trans('sites.follow')); ?></a>
                                    </li>
                                    <li>
                                        <a href="#byfollow" id="follows" ><?php echo e(trans('sites.byfollow')); ?></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="tab-content" id="follow">
                            <div class="entries row">
                            
                                <?php $__currentLoopData = $allData->follows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($follow->userFollow): ?>
                                    <div class="entry one-third">
                                        <figure>
                                            <img src="<?php echo e(($follow->userFollow->avatar)); ?>" alt=""  height="250px" width="300px"/>
                                            <figcaption>
                                                <a href="<?php echo e(($follow->userFollow->id)); ?>"><i class="ico i-view"></i> <span>Xem thông tin</span></a>
                                            </figcaption>
                                        </figure>
                                        <div class="container">
                                            <h2><a href="<?php echo e(($follow->userFollow->id)); ?>"><i class="fa fa-user-md" aria-hidden="true"></i> <?php echo e(($follow->userFollow->name)); ?></a></h2>
                                            <p><i class="fa fa-address-book" aria-hidden="true"></i> | <?php echo e($follow->userFollow->email); ?></p>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div>
                                <a href="<?php echo e(route('site.follow', $allData['id'] )); ?>" class="btn btn-default">
                                    <i class="fa fa-forward" aria-hidden="true"></i>
                                    <span class="text-success"><?php echo e(trans('sites.continue')); ?></span>
                                </a>
                            </div>
                        </div>
                        <div class="tab-content" id="byfollow">
                            <div class="entries row">
                                <?php $__currentLoopData = $allData->followBys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $byFollow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($byFollow->user): ?>
                                    <div class="entry one-third">
                                        <figure>
                                            <img src="<?php echo e(($byFollow->user->avatar)); ?>" alt=""  height="250px" width="300px"/>
                                            <figcaption>
                                                <a href="<?php echo e(($byFollow->user->id)); ?>">
                                                    <i class="ico i-view"></i>
                                                    <span>Xem thông tin</span>
                                                </a>
                                            </figcaption>
                                        </figure>
                                        <div class="container">
                                            <h2>
                                                <a href="<?php echo e(($byFollow->user->id)); ?>">
                                                    <i class="fa fa-user-md" aria-hidden="true"></i> <?php echo e(($byFollow->user->name)); ?>

                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div>
                                <a href="<?php echo e(route('site.byfollow', $allData['id'] )); ?>" class="btn btn-default">
                                    <i class="fa fa-forward" aria-hidden="true"></i>
                                    <span class="text-success"><?php echo e(trans('sites.continue')); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <?php echo $__env->make('sites._sections.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
    <?php echo e(Html::script('bower/ckeditor/ckeditor.js')); ?>

    <script>
      var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    </script>
        <?php if(Auth::check()): ?>
            <script>
                followView.statusFollow = <?php echo e($statusfollow ? 1 : 0); ?>;
            </script>
        <?php endif; ?>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('sites.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>