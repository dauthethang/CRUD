<?php $__env->startSection('content'); ?>
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add Share
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
            <form method="post" action="<?php echo e(route('shares.store')); ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <?php echo csrf_field(); ?>
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="price">Age :</label>
                    <input type="text" class="form-control" name="age"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Phone :</label>
                    <input type="text" class="form-control" name="phone"/>
                </div>
                <div class="custom-file">
                        <?php echo e(csrf_field()); ?>

                        <input type="file" name="avatar" required="true">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>

        </div>

    </div>


<?php $__env->startSection('jsCustom'); ?>
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            console.log(111);
            var fileName = $(this).val().split("\\").pop();
            console.log(fileName);
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /var/www/resources/views/shares/create.blade.php */ ?>