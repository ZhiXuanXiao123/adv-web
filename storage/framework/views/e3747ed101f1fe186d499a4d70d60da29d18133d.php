<?php $__env->startSection('content'); ?>

    <h1 class="title"> Employee Message</h1>
    <div class="box">
        <div style="margin-bottom: 1em;" class="field">
            <div style="font-size:20px"> Employee Name:</div>
            <div style="color:#F00; font-size:15px"> <?php echo e($employees->employeename); ?></div>
            <div style="font-size:20px"> Department:</div>
            <div class="link" style="color:#F00; font-size:15px"> <?php echo e($employees->department); ?></div>
        </div>
    </div>
    <div class="box">
        <div style="margin-bottom: 1em;" class="field">

            <form method="POST" action="/employees/<?php echo e($employees->id); ?>/tasks">
                <?php echo csrf_field(); ?>
                <div class="field" style="margin-bottom: 1em;">
                    <label class="label" for="description">Description</label>
                    <div>
                        <input type="text" class="input" name="description" placeholder="Description">
                    </div>
                </div>

                <div class="field" style="margin-bottom: 1em;">
                    <div class="control">
                        <button type="submit" class="button is-link">Adding</button>
                    </div>
                </div>
            </form>
            <?php if($employees->tasks->count()): ?>
                <div style="margin-bottom: 2em;">
                    <?php $__currentLoopData = $employees->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <form method="POST" action="/tasks/<?php echo e($task->id); ?>">
                                <?php echo method_field('PATCH'); ?>
                                <?php echo csrf_field(); ?>
                                <label class="checkbox" for="completed">
                                    <input type="checkbox" name="completed"
                                           onChange="this.form.submit()" <?php echo e($task->completed ? 'checked' :''); ?>>
                                    <?php echo e($task->description); ?>

                                </label>
                            </form>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <td>

            </td>
        </div>

    </div>


    <form method="GET" action="/employees/<?php echo e($employees->id); ?>/edit" style="margin-bottom: 1em;">
        <?php echo csrf_field(); ?>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Edit</button>
            </div>
        </div>
    </form>
    <form method="GET" action="/employees" style="margin-bottom: 1em;">
        <?php echo csrf_field(); ?>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Back</button>
            </div>
        </div>
    </form>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>