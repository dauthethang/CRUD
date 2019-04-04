<?php $__env->startSection('content'); ?>
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        <?php if(session()->get('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session()->get('success')); ?>

            </div><br />
        <?php endif; ?>
        <a href="http://localhost/shares/create" class="btn btn-primary">Add</a>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Age</td>
                <td>Phone</td>
                <td>Image</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $shares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $share): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($share->id); ?></td>
                    <td><?php echo e($share->name); ?></td>
                    <td><?php echo e($share->age); ?></td>
                    <td><?php echo e($share->phone); ?></td>
                    <td><img style="width: 30px" src="/../upload/<?php echo e($share->avatar); ?>"></td>
                    <td><a href="<?php echo e(route('shares.edit',$share->id)); ?>" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="<?php echo e(route('shares.destroy', $share->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>



            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /var/www/resources/views/shares/index.blade.php */ ?>