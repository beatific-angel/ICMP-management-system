<?php $__env->startSection('title', 'Tickets'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content">
        <div class="page-bar">
            <div class="page-title-breadcrumb">
                <div class=" pull-left">
                    <div class="page-title">Ticket List</div>
                </div>
                <ol class="breadcrumb page-breadcrumb pull-right">
                    <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                           href="<?php echo e(route('home')); ?>">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li><a class="parent-item" href="<?php echo e(route('ticket.index')); ?>">Ticket</a>&nbsp;<i class="fa fa-angle-right"></i>
                    </li>
                    <li class="active">Ticket List</li>
                </ol>
            </div>
        </div>
        <?php echo $__env->make('common.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="card-box">
                    <div class="card-head">
                        <header>Ticket List</header>
                        <button id="sdntmenu" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                data-upgraded=",MaterialButton">
                            <i class="material-icons">more_vert</i>
                        </button>
                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            data-mdl-for="sdntmenu">
                            <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
                            </li>
                            <li class="mdl-menu__item"><i class="material-icons">print</i>Another action
                            </li>
                            <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
                                here</li>
                        </ul>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6">
                                <div class="btn-group">
                                    <a href="<?php echo e(route('ticket.create')); ?>" id="addRow" class="btn btn-primary">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php if($tickets->isEmpty()): ?>
                            <h3 class="text-center">You have not yet any Tickets.</h3>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Ticket Id</th>
                                        <th>Title</th>
                                        <th>Assigned Customer</th>
                                        <th>Status</th>
                                        <th>Last Update</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>
                                                <span><?php echo e($ticket->ticket_id); ?></span>
                                            </td>
                                            <td>
                                                <span><?php echo e($ticket->title); ?></span>
                                            </td>
                                            <td>
                                                <span> <?php
                                                    $selectedcustomer = DB::select(DB::raw('select * from customers where id = ' . $ticket->customer_id));
                                                    echo $selectedcustomer[0]->short_name;
                                                    ?>
                                                    </span>
                                            </td>
                                            <td>
                                    <span class="badge badge-dot mr-4">
                                        <?php if($ticket->status == "open" || $ticket->status == "in-progress" || $ticket->status == "ready-to-bill"): ?>
                                            <span class="badge badge-info"> <?php echo e($ticket->status); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-danger"> <?php echo e($ticket->status); ?></span>
                                        <?php endif; ?>
                                    </span>
                                            </td>
                                            <td>
                                                <?php echo e(\Carbon\Carbon::parse($ticket->updated_at)->diffForHumans()); ?>

                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('ticket.edit', ['ticket_id' => $ticket->ticket_id])); ?>" class="tblEditBtn">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a class="tblDelBtn" href="<?php echo e(route('ticket.delete', ['id' => $ticket->id])); ?>" id="ticketdelete">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php echo e($tickets->render()); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('styles'); ?>
<style>
    #panel > div.container-fluid.mt--6 > div.container-fluid.mt--6 > div > div > div > div > h2 > span > a {
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
    .thead-light tr {
        background: rgb(55, 59, 99) !important;
        color: white;
    }
    thead tr th {
        padding: 20px;
        font-size: 15px;
    }
    thead tr th:first-child {
        border-radius: 15px 0px 0px 15px;
    }
    thead tr th:last-child {
        border-radius: 0px 15px 15px 0px;
    }
    #panel > div.container-fluid.mt--6 > div.container-fluid.mt--6 > div > div > div > div.card-header.border-0 > h2 > span {
        margin-top:20px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/tickets/index.blade.php ENDPATH**/ ?>