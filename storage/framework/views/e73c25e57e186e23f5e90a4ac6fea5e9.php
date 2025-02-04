<?php $__env->startSection('content'); ?>
    <h1>Categories</h1>

    <?php if(session('success')): ?>
        <div style="color:green;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('admin.categories.create')); ?>">Create New Category</a>

    <table border="1" cellpadding="10" cellspacing="0" style="margin-top:20px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Meta Title</th>
                <th>Meta Description</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($category->name); ?></td>
                <td><?php echo e($category->meta_title); ?></td>
                <td><?php echo e($category->meta_description); ?></td>
                <td><?php echo e($category->created_at->format('Y-m-d')); ?></td>
                <td>
                    <a href="<?php echo e(route('admin.categories.edit', $category->id)); ?>">Edit</a>
                    <form action="<?php echo e(route('admin.categories.destroy', $category->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo e($categories->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/deepak/Desktop/deep_laravel/blogproject/resources/views/admin/categories/index.blade.php ENDPATH**/ ?>