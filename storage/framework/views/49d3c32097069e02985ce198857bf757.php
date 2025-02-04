<?php $__env->startSection('content'); ?>
    <h1>Blog Posts</h1>
    
    <?php if(session('success')): ?>
        <div style="color:green;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('admin.posts.create')); ?>">Create New Post</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($post->title); ?></td>
                <td><?php echo e($post->category ? $post->category->name : 'Uncategorized'); ?></td>
                <td><?php echo e($post->created_at->format('Y-m-d')); ?></td>
                <td>
                    <a href="<?php echo e(route('admin.posts.edit', $post->id)); ?>">Edit</a>
                    <form action="<?php echo e(route('admin.posts.destroy', $post->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php echo e($posts->links()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/deepak/Desktop/deep_laravel/blogproject/resources/views/admin/posts/index.blade.php ENDPATH**/ ?>