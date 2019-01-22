<?php $__env->startSection('content'); ?>

    <h1 class="title">Edit Employee</h1>

    <form method="POST" action="/employees/<?php echo e($employees->id); ?>" style="margin-bottom: 1em;" >
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>

        <div class="field">

            <label class="label" for="title">Employee Name</label>


            <div class="control">

                <input type="text" class="input" name="employeename" placeholder="Employee Name" value="<?php echo e($employees->employeename); ?>">

            </div>

        </div>

        <div class="field">

            <label class="label" for="department">Department</label>


            <div class="control">

                <input type="text" class="input" name="department" placeholder="Department" value="<?php echo e($employees->department); ?>">

            </div>

        </div>

        <div class="field">

            <div class="control">

                <button type="submit" class="button is-link">Update</button>

            </div>

        </div>



    </form>


    <form method="POST" action="/employees/<?php echo e($employees->id); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>

        <div class="field">

            <div class="control">

                <button type="submit" class="button is-link">Delete</button>

            </div>

        </div>
    </form>








<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>