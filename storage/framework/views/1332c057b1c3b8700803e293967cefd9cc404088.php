<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <img src="<?php echo e(asset('assets/img/pages/signin.jpg')); ?>" alt="sing up image">
            </div>
            <div class="signin-form">
                <h2 class="form-title">Login</h2>
                <?php if(session('error')): ?>
                    <span class="text-danger"> <?php echo e(session('error')); ?></span>
                <?php endif; ?>
                <form method="POST" action="<?php echo e(route('login')); ?>" class="register-form" id="login-form">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <div class="">
                            <input id="email" type="email" class="form-control input-height <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="Enter Email Address.">
                        </div>

                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <div class="">
                            <input id="password" type="password" class="form-control input-height <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" placeholder="Password">
                        </div>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <input class="agree-term" type="checkbox" name="remember" id="customCheck" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                        <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                            me</label>
                    </div>
                    <div class="form-group form-button">
                        <button class="btn btn-round btn-primary" name="signin" id="signin">Login</button>
                    </div>
                </form>
                <div class="social-login">
                    <a class="small" href="<?php echo e(route('password.request')); ?>">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/auth/login.blade.php ENDPATH**/ ?>