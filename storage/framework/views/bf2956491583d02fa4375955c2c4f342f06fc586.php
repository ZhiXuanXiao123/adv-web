<!doctype html>
<html>

<head>
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;

        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>

    <div class="content">
        <div class="title m-b-md">
            Employee List
        </div>

        <?php if(Route::has('login')): ?>

            <div class="links">
                <div style="margin-bottom: 1em;" class="links">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/')); ?>">Home</a>
                        <a href="<?php echo e(url('/home')); ?>">function</a>
                        <a href="<?php echo e(url('/search')); ?>">Search Employees</a>
                        <a href="<?php echo e(url('/employees/record')); ?>">Add Employees</a>
                </div>


                <tr></tr>
                <table border="2px" cellpadding="3" cellspacing="0" style="width: 60%;margin:auto">
                    <tr>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Department</th>
                        <th>update</th>
                        <th>Delete</th>
                    </tr>
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><a href="/employees/<?php echo e($employees->id); ?>"><?php echo e($employees->employeeid); ?></a></td>
                            <td><a> <?php echo e($employees->employeename); ?></a></td>
                            <td><a> <?php echo e($employees->department); ?></a></td>


                            <td>
                                <form method="GET" action="/employees/<?php echo e($employees->id); ?>/edit">
                                    <?php echo csrf_field(); ?>
                                    <div class="field">
                                        <div class="control">
                                            <button type="submit" class="button is-link">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="/employees/<?php echo e($employees->id); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <div class="field">
                                        <div class="control">
                                            <button type="submit" class="button is-link">Delete</button>
                                        </div>
                                    </div>
                                </form>
                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>


                <?php else: ?>
                    <h2>Please login!</h2>
                    <a href="<?php echo e(route('login')); ?>">Login</a>

                    <?php if(Route::has('register')): ?>
                        <a href="<?php echo e(route('register')); ?>">Register</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>


    </div>
</div>
</body>

</html>
