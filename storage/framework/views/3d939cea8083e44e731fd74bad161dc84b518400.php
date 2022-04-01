<?php $__env->startSection('title', 'Edit Customer'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Edit Customer</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="<?php echo e(route('home')); ?>">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="<?php echo e(route('customers.index')); ?>">Customers</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Edit Customer</li>
                </ol>
            </div>
        </div>
        <?php echo $__env->make('common.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-sm-12">
                <form accept-charset="UTF-8" action="<?php echo e(route('customers.update')); ?>" class="form-horizontal"
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
                        </div>
                        <div class="card-body row">
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="first_name" name="first_name" value="<?php echo e($customer->first_name); ?>">
                                    <label class="mdl-textfield__label">First Name</label>
                                    <?php if($errors->has('first_name')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('first_name')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="last_name" name="last_name" value="<?php echo e($customer->last_name); ?>">
                                    <label class="mdl-textfield__label">Last Name</label>
                                    <?php if($errors->has('last_name')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('last_name')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="short_name" name="short_name" value="<?php echo e($customer->short_name); ?>">
                                    <label class="mdl-textfield__label">Short Name</label>
                                    <?php if($errors->has('short_name')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('short_name')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="email" id="email" name="email" value="<?php echo e($customer->email); ?>">
                                    <label class="mdl-textfield__label">Email</label>
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
                                           pattern="-?[0-9]*(\.[0-9]+)?" id="phone" name="phone" value="<?php echo e($customer->phone); ?>">
                                    <label class="mdl-textfield__label" for="text5">Mobile Number</label>
                                    <span class="mdl-textfield__error">Number required!</span>
                                    <?php if($errors->has('phone')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('phone')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="address" name="address" value="<?php echo e($customer->address); ?>">
                                    <label class="mdl-textfield__label" for="text5">Address</label>
                                    <?php if($errors->has('address')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('address')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="city" name="city" value="<?php echo e($customer->city); ?>">
                                    <label class="mdl-textfield__label" for="city">City</label>
                                    <?php if($errors->has('city')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('city')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="state" name="state" value="<?php echo e($customer->state); ?>">
                                    <label class="mdl-textfield__label" for="state">State</label>
                                    <?php if($errors->has('state')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('state')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="postcode" name="postcode" value="<?php echo e($customer->postcode); ?>">
                                    <label class="mdl-textfield__label" for="postcode">Post Code</label>
                                    <?php if($errors->has('postcode')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('postcode')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <input class="mdl-textfield__input" type="hidden" id="customerid"
                                   name="customerid" value="<?php echo e($customer->id); ?>">
                            <div class="col-lg-12 p-t-20 text-center">
                                <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">
                                    Update
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/customers/edit.blade.php ENDPATH**/ ?>