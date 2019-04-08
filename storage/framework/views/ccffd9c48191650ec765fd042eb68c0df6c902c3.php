<?php $__env->startSection('content'); ?>
<?php echo $__env->make('sites._sections.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="row">
    <div class="col-md-7 col-md-offset-3 login full-width">
        <div class="panel panel-default">
            <div class="panel-heading panel-login"><?php echo e(trans('sites.login')); ?></div>
            <div class="panel-body">
               <?php if(session()->has('message')): ?>
                    <div class="alert alert-danger messageLogin" role="alert"><?php echo session()->get('message'); ?></div>
               <?php endif; ?>
                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('postLogin')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <label for="email" class="col-md-4 control-label"><?php echo e(trans('sites.loginEmail')); ?></label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                            <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('email')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        <label for="password" class="col-md-4 control-label"><?php echo e(trans('sites.passWord')); ?></label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>
                            <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('password')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-3">
                            <div class="checkbox">
                                <label id="check_remember">
                                    <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> <?php echo e(trans('sites.remember')); ?>

                                </label>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn">
                                    <?php echo e(trans('sites.login')); ?>

                                </button>
                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(trans('sites.forgot')); ?>

                                </a>|
                                <a class="btn btn-link" href="<?php echo e(route('register')); ?>">
                                    <?php echo e(trans('sites.regiter')); ?>

                                </a>
                            </div>
                            <div class="clearfix"></div>
                            <hr/>
                            <div class="socialite">
                                <a class="btn btn-primary " href="<?php echo route('facebook.login'); ?>">
                                <i class="fa fa-facebook-square" aria-hidden="true"></i> <?php echo e(trans('sites.loginFacebook')); ?>

                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('sites._sections.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('sites.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>