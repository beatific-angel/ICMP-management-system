<?php $__env->startSection('title', 'Edit Employee'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Edit Employee</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="<?php echo e(route('home')); ?>">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="<?php echo e(route('users.index')); ?>">Employees</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Edit Employee</li>
                </ol>
            </div>
        </div>
        <?php echo $__env->make('common.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-sm-12">
                <form accept-charset="UTF-8" action="<?php echo e(route('users.update')); ?>" class="form-horizontal"
                      id="device_form" enctype="multipart/form-data"
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
                                    <input class="mdl-textfield__input" type="text" id="firstname" name="firstname" value="<?php echo e($user->firstname); ?>">
                                    <label class="mdl-textfield__label">First Name</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="lastname" name="lastname" value="<?php echo e($user->lastname); ?>">
                                    <label class="mdl-textfield__label">Last Name</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text" id="username" name="username" value="<?php echo e($user->username); ?>">
                                    <label class="mdl-textfield__label">Username</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                    <?php
                                    $selected_role = DB::select(DB::raw('select * from user_role where id = ' . $user->role_id));
                                    ?>
                                    <input class="mdl-textfield__input" type="text" id="user_role" name="user_role" readonly value="<?php echo $selected_role[0]->role_name; ?>"
                                           tabIndex="-1">
                                    <label for="user_role" class="pull-right margin-0">
                                        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    </label>
                                    <label for="user_role" class="mdl-textfield__label">Select User Role</label>
                                    <ul data-mdl-for="user_role" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="mdl-menu__item" data-val="<?php echo e($role->id); ?>" ><?php echo e($role->role_name); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="email" id="email" name="email" value="<?php echo e($user->email); ?>">
                                    <label class="mdl-textfield__label">Email</label>
                                    <span class="mdl-textfield__error">Enter Valid Email Address!</span>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="text"
                                           pattern="-?[0-9]*(\.[0-9]+)?" id="phone" name="phone" value="<?php echo e($user->phone); ?>">
                                    <label class="mdl-textfield__label" for="text5">Mobile Number</label>
                                    <span class="mdl-textfield__error">Number required!</span>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="password" id="password" name="password" >
                                    <label class="mdl-textfield__label">Password</label>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                    <input class="mdl-textfield__input" type="password" id="confirmpassword"
                                           name="confirmpassword">
                                    <label class="mdl-textfield__label">Confirm Password</label>
                                </div>
                            </div>

                            <input class="mdl-textfield__input" type="hidden" id="userid"
                                   name="userid" value="<?php echo e($user->id); ?>">
                            <div class="col-lg-12 p-t-20 text-center">
                                <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">
                                    Update
                                </button>
                                <a href="<?php echo e(route('users.index')); ?>"
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/users/edit.blade.php ENDPATH**/ ?>