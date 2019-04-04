<?php $__env->startSection('content'); ?>
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Share
        </div>
        <div class="card-body">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div><br />
            <?php endif; ?>
            <form method="post" action="<?php echo e(route('shares.update', $share->id)); ?>" enctype="multipart/form-data">
                <?php echo method_field('PATCH'); ?>
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="name">Name :</label>
                    <input type="text" class="form-control" name="name" value=<?php echo e($share->name); ?> />
                </div>
                <div class="form-group">
                    <label for="price">Age :</label>
                    <input type="text" class="form-control" name="age" value=<?php echo e($share->age); ?> />
                </div>
                <div class="form-group">
                    <label for="quantity">Phone :</label>
                    <input type="text" class="form-control" name="phone" value=<?php echo e($share->phone); ?> />
                </div>
                <div class="custom-file">
                    <?php echo e(csrf_field()); ?>

                    <input type="file" name="avatar" >
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /var/www/resources/views/shares/edit.blade.php */ ?>