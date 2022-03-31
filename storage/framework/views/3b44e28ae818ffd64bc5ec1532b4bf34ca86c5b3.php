<?php $__env->startSection('title', 'Create Device'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Add Device</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="index.html">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Device</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Add Device</li>
                </ol>
            </div>
        </div>
        <?php echo $__env->make('common.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-sm-12">
                <form accept-charset="UTF-8" action="<?php echo e(route('device.store')); ?>" class="form-horizontal"
                      id="device_form" enctype="multipart/form-data"
                      method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="card-box">
                        <div class="card-head">
                            <header>Add Device</header>
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
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width <?php echo e($errors->has('devicename') ? ' has-error' : ''); ?>" >
                                    <input class="mdl-textfield__input" type="text" id="devicename" name="devicename" value="<?php echo e(old('devicename')); ?>">
                                    <label class="mdl-textfield__label">Device Name</label>
                                    <?php if($errors->has('devicename')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('devicename')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width <?php echo e($errors->has('username') ? ' has-error' : ''); ?>">
                                    <input class="mdl-textfield__input" type="text" id="customername" name="customername" readonly
                                           tabIndex="-1">
                                    <label for="customername" class="pull-right margin-0">
                                        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    </label>
                                    <label for="customername" class="mdl-textfield__label">Select Customer</label>
                                    <ul data-mdl-for="customername" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="mdl-menu__item" data-val="<?php echo e($customer->id); ?>" ><?php echo e($customer->short_name); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <?php if($errors->has('customername')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('customername')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width <?php echo e($errors->has('groupname') ? ' has-error' : ''); ?>">
                                    <input class="mdl-textfield__input" type="text" id="groupname" name="groupname" readonly
                                           tabIndex="-1">
                                    <label for="groupname" class="pull-right margin-0">
                                        <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                    </label>
                                    <label for="groupname" class="mdl-textfield__label">Select Group</label>
                                    <ul data-mdl-for="groupname" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="mdl-menu__item" data-val="<?php echo e($group->id); ?>" ><?php echo e($group->name); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <?php if($errors->has('groupname')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('groupname')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div
                                    class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width <?php echo e($errors->has('ipaddress') ? ' has-error' : ''); ?>">
                                    <input class="mdl-textfield__input" type="text" id="ipaddress" name="ipaddress" value="<?php echo e(old('ipaddress')); ?>">
                                    <label class="mdl-textfield__label">IP Address</label>
                                    <?php if($errors->has('ipaddress')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('ipaddress')); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-6 p-t-20">
                                <div class="mdl-textfield mdl-js-textfield txt-full-width">
                                    <textarea class="mdl-textfield__input" rows="3" id="devicedescription" name="devicedescription"></textarea>
                                    <label class="mdl-textfield__label" for="text7">Device Description</label>
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20 text-center">
                                <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-circle btn-primary">
                                    Submit
                                </button>
                                <a href="<?php echo e(route('device.index')); ?>"
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/device/create.blade.php ENDPATH**/ ?>