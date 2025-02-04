<?php $__env->startSection('content'); ?>
    <h1>Create New Post</h1>

    <?php if($errors->any()): ?>
        <div style="color:red;">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.posts.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div>
            <label for="title">Title:</label><br>
            <input type="text" name="title" id="title" value="<?php echo e(old('title')); ?>" required>
        </div>
        <br>
        <div>
            <label for="description">Description:</label><br>
            <textarea name="description" id="description" rows="5" required><?php echo e(old('description')); ?></textarea>
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
        <div>
            <label for="category_id">Category:</label><br>
            <select name="category_id" id="category_id">
                <option value="">-- Select Category --</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"
                        <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
                        <?php echo e($category->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <br>
        <button type="submit">Save Post</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/deepak/Desktop/deep_laravel/blogproject/resources/views/admin/posts/create.blade.php ENDPATH**/ ?>