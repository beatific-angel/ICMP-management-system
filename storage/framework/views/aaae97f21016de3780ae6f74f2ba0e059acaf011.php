<?php $__env->startSection('title', 'Create Customer'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Create Customer</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="<?php echo e(route('home')); ?>">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="<?php echo e(route('customers.index')); ?>">Employees</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Create Customer</li>
                </ol>
            </div>
        </div>
        <?php echo $__env->make('common.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-sm-12">
                <form accept-charset="UTF-8" action="<?php echo e(route('customers.store')); ?>" class="form-horizontal"
                      id="customer_form" enctype="multipart/form-data"
                      method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="card-box">
                        <div class="card-head">
                            <header>Basic Information</header>
                            <button id="panel-button"
                                    class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                    data-upgraded=",MaterialButton">
                                <i class="material-icons">more_vert</i>
                            </button>
                            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                data-mdl-for="panel-button">
                                <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
                                </li>
                                <li class="mdl-menu__item"><i class="material-icons">print</i>Another action
                                </li>
                                <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
                                    here
                                </li>
                            </ul>
                        </div>
                        <div class="card-body row">
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="first_name" name="first_name" value="<?php echo e(old('first_name')); ?>">
                                    <label class="mdl-textfield__label">First Name</label>
                                    <?php if($errors->has('first_name')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('first_name')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="last_name" name="last_name" value="<?php echo e(old('last_name')); ?>">
                                    <label class="mdl-textfield__label">Last Name</label>
                                    <?php if($errors->has('last_name')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('last_name')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="short_name" name="short_name" value="<?php echo e(old('short_name')); ?>">
                                    <label class="mdl-textfield__label">ShortName</label>
                                    <?php if($errors->has('short_name')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('short_name')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="email" id="email" name="email" value="<?php echo e(old('email')); ?>">
                                    <label class="mdl-textfield__label" for="email">Email</label>
                                    <span class="mdl-textfield__error">Enter Valid Email Address!</span>
                                    <?php if($errors->has('email')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text"
                                           pattern="-?[0-9]*(\.[0-9]+)?" id="phone" name="phone" value="<?php echo e(old('phone')); ?>">
                                    <label class="mdl-textfield__label" for="phone">Mobile Number</label>
                                    <span class="mdl-textfield__error">Number required!</span>
                                    <?php if($errors->has('phone')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('phone')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="address" name="address" value="<?php echo e(old('address')); ?>">
                                    <label class="mdl-textfield__label" for="address">Address</label>
                                    <span class="mdl-textfield__error">Number required!</span>
                                    <?php if($errors->has('address')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('address')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-12 p-t-20 text-center">
                                <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">
                                    Submit
                                </button>
                                <a href="<?php echo e(route('customers.index')); ?>"
                                   class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-danger">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/customers/create.blade.php ENDPATH**/ ?>