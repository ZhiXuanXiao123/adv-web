<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card" >
                <div class="card-header">Function</div>
                <div class="card-body">
                    <form style="margin-bottom: 1em;">
                        <?php echo csrf_field(); ?>
                        <a href="<?php echo e(url('/employees/record')); ?>">Add Employees</a><p></p>
                        <a href="<?php echo e(url('/search')); ?>">Search Employees</a><p></p>
                        <a href="<?php echo e(url('/employees')); ?>">Employee</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>