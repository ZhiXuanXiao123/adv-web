<?php $__env->startSection('content'); ?>

<head>

    <title>Employee</title>

</head>



<h1 class="title">Employee Record</h1>


<form method="POST" action="/employees" style="margin-bottom: 1em;">
    <?php echo csrf_field(); ?>
    <div class="field">
        <label class="label" for="title">Employee ID</label>
        <div class="control">
            <input type="text" class="input <?php echo e($errors->has('employeeid')? ' is-danger' : ''); ?>" name="employeeid" placeholder="Employee ID" value="<?php echo e(old('employeeid')); ?>">
        </div>
    </div>

    <div class="field">
        <label class="label" for="title">Employee Name</label>
        <div class="control">
        <input type="text" class="input <?php echo e($errors->has('employeename')? ' is-danger' : ''); ?>" name="employeename" placeholder="Employee name" value="<?php echo e(old('employeename')); ?>">
    </div>
    </div>

    <div class="field">
        <label class="label" for="department">Department</label>
        <div class="control">
        <input name="department" class="input <?php echo e($errors->has('department')? ' is-danger' : ''); ?>" placeholder="Department" value="<?php echo e(old('department')); ?>">
    </div>
    </div>
    <div class="field">

        <div class="control">
        <button type="submit" class="button is-link">record</button>
    </div>
    </div>


    <?php if($errors ->all()): ?>
    <div class="notification is-danger">
        <ul>
            <?php $__currentLoopData = $errors-> all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
        <?php endif; ?>
</form>
<form method="GET" action="/employees"  style="margin-bottom: 1em;">
    <?php echo csrf_field(); ?>
    <div class="field">
        <div class="control">
            <button type="submit"  class="button is-link">Cancel</button>
        </div>
    </div>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>