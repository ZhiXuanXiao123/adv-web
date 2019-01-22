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
        Employee Searching
    </div>

    <div style="margin-bottom: 1em;" class="links">
        <a href="<?php echo e(url('/')); ?>">Home</a>
        <a href="<?php echo e(url('/employees')); ?>">Employee</a>
        <a href="<?php echo e(url('/employees/record')); ?>">Add Employees</a>
    </div>
    <form action="/search" method="POST" role="search">
        <?php echo e(csrf_field()); ?>

        <div class="input-group">
            <input type="text" class="form-control" name="q"
                   placeholder="Search users"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search">Search</span>
            </button>
        </span>
        </div>
    </form>

    <div class="container">
        <?php if(isset($details)): ?>
            <p> The Search results for your query <b> <?php echo e($query); ?> </b> are :</p>
            <table border="2px" cellpadding="3" cellspacing="0" style="width: 60%;margin:auto">
                <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Department</th>
                    <th>update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employees): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($employees->employeeid); ?></td>
                        <td><?php echo e($employees->employeename); ?></td>
                        <td><?php echo e($employees->department); ?></td>
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
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>


</body>

</html>
