

<?php $__env->startSection('content'); ?>
    <h1>Feedbacks</h1>
    <a href="<?php echo e(route('feedback.create')); ?>" class="btn btn-primary">Create Feedback</a>

    <?php if($feedbacks->isEmpty()): ?>
        <p>No feedbacks found.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($feedback->id_feedback); ?></td>
                        <td><?php echo e($feedback->full_name); ?></td>
                        <td><?php echo e($feedback->email); ?></td>
                        <td><?php echo e($feedback->message); ?></td>
                        <td>
                        
    <form action="<?php echo e(route('feedback.edit', $feedback->id_feedback)); ?>" method="POST" style="display:inline-block;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('GET'); ?>
        <button type="submit" style="background: none; border: none; color: #ffc107; cursor: pointer;" title="Edit User">
            <i class="fas fa-edit"></i>
        </button>
    </form>

    <form action="<?php echo e(route('feedback.destroy', $feedback->id_feedback)); ?>" method="POST" style="display:inline-block;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" style="background: none; border: none; color: red; cursor: pointer;" onclick="return confirm('Are you sure?')" title="Delete User">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\MP\msterPiece\resources\views/dashboard/feedbacks/index.blade.php ENDPATH**/ ?>