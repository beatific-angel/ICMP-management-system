<?php $__env->startSection('title', 'Create Ticket'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Add Ticket</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="<?php echo e(route('home')); ?>">Home</a>&nbsp;<i
                            class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="">Ticket</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Add Ticket</li>
                </ol>
            </div>
        </div>
        <?php echo $__env->make('common.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-sm-12">
                <form accept-charset="UTF-8" action="<?php echo e(route('ticket.store')); ?>" class="form-horizontal"
                      id="ticket_form" enctype="multipart/form-data"
                      method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="card-box">
                        <div class="card-head">
                            <header>Add Ticket</header>
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
                        <div class="card-body">

                            <form class="form-horizontal offset-sm-2" action="<?php echo e(route('ticket.store')); ?>" role="form" method="POST">
                                <?php echo csrf_field(); ?>


                                <div class="form-group row <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                    <label for="title" class="col-md-2 col-form-label form-control-label">Title</label>
                                    <div class="col-md-7">
                                        <input id="title" type="text" class="form-control" name="title"
                                               value="<?php echo e(old('title')); ?>">

                                        <?php if($errors->has('title')): ?>
                                            <span class="text-danger"><?php echo e($errors->first('title')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row <?php echo e($errors->has('customer_id') ? ' has-error' : ''); ?>">
                                    <label for="customer_id" class="col-md-2 col-form-label form-control-label">Select Customer</label>

                                    <div class="col-md-7">
                                        <select id="customer_id" type="category" class="form-control" name="customer_id">
                                            <option value="">Select Customer</option>
                                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->short_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <?php if($errors->has('customer_id')): ?>
                                            <span class="help-block">
                                                <span class="text-danger"><?php echo e($errors->first('customer_id')); ?></span>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row <?php echo e($errors->has('device_id') ? ' has-error' : ''); ?>">
                                    <label for="device_id" class="col-md-2 col-form-label form-control-label">Select Device</label>
                                    <div class="col-md-7">
                                        <select id="device_id" type="category" class="form-control" name="device_id">
                                            <option value="">Select Device</option>
                                            <?php $__currentLoopData = $devices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($device->id); ?>"><?php echo e($device->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <?php if($errors->has('device_id')): ?>
                                            <span class="help-block">
                                                <span class="text-danger"><?php echo e($errors->first('device_id')); ?></span>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row <?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                                    <label for="status" class="col-md-2 col-form-label form-control-label">Status</label>

                                    <div class="col-md-7">
                                        <select id="priority" type="" class="form-control" name="status">
                                            <option value="">Select Status</option>
                                            <option value="open">Open</option>
                                            <option value="in-progress">In-Progress</option>
                                            <option value="ready-to-bill">Ready-to-Bill</option>
                                            <option value="closed">Closed</option>
                                        </select>

                                        <?php if($errors->has('status')): ?>
                                            <span class="help-block">
                            <span class="text-danger"><?php echo e($errors->first('status')); ?></span>
                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row <?php echo e($errors->has('message') ? ' has-error' : ''); ?>">
                                    <label for="message" class="col-md-2 col-form-label form-control-label">Message</label>

                                    <div class="col-md-7">
                                        <textarea rows="5" id="message" class="form-control" name="message"></textarea>

                                        <?php if($errors->has('message')): ?>
                                            <span class="help-block">
                            <span class="text-danger"><?php echo e($errors->first('message')); ?></span>
                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row col-12">
                                    <div class="col-md-6 col-9" style="text-align: right">
                                        <button type="submit" class="btn btn-primary" >
                                            <i class="fas fa-ticket-alt"></i> Open Ticket
                                        </button>
                                    </div>
                                    <div class="col-md-6 col-3">
                                        <a href="<?php echo e(route('ticket.index')); ?>" class="btn btn-secondary">Cancel
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<style>
    .btn-primary {
        background: #07B9F9;
        box-shadow: 1px 1px 30px 0 rgb(0 0 0 / 20%);
        text-decoration: none;
        color: #fff;
        border-radius: 65px;
        padding: 10px 45px;
        font-size: 15px;
        font-weight: 600;
        display: inline-block;
    }
    .btn-secondary {
        box-shadow: 1px 1px 30px 0 rgb(0 0 0 / 20%);
        text-decoration: none;
        border-radius: 65px;
        padding: 10px 45px;
        font-size: 15px;
        font-weight: 600;
        display: inline-block;
    }
    @media (max-width: 768px) {
        .btn-primary {
            padding: 10px 20px;
        }
        .btn-secondary {
            padding: 10px 15px;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/tickets/create.blade.php ENDPATH**/ ?>