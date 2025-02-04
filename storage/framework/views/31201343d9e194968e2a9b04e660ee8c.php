<?php $__env->startSection('content'); ?>
    <h1>Create New Category</h1>

    <?php if($errors->any()): ?>
        <div style="color:red;">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.categories.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div>
            <label for="name">Category Name:</label><br>
            <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" required>
        </div>
        <br>
        <div>
            <label for="meta_title">Meta Title:</label><br>
            <input type="text" name="meta_title" id="meta_title" value="<?php echo e(old('meta_title')); ?>">
        </div>
        <br>
        <div>
            <label for="meta_description">Meta Description:</label><br>
            <textarea name="meta_description" id="meta_description" rows="3"><?php echo e(old('meta_description')); ?></textarea>
        </div>
        <br>
        <button type="submit">Save Category</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/deepak/Desktop/deep_laravel/blogproject/resources/views/admin/categories/create.blade.php ENDPATH**/ ?>