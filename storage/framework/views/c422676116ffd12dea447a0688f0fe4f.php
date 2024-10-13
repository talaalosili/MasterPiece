
<?php $__env->startSection('title','View User'); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-left">
        <button class="btn">
            <a href="<?php echo e(route('users.index')); ?>" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            User Info
        </div>
        <div class="card-body">
            <h5 class="card-title">User Name: <?php echo e($user->fullname); ?></h5> 

            <p class="card-text">
                <?php if($user->image): ?>
                    <img src="<?php echo e(asset('storage/' . $user->image)); ?>" alt="User Image" style="width: 150px; height: 150px;">
                <?php else: ?>
                    <img src="<?php echo e(asset('images/default-user.png')); ?>" alt="Default User Image" style="width: 150px; height: 150px;">
                <?php endif; ?>
            </p>

            <p class="card-text"><b>User Email:</b> <?php echo e($user->email); ?></p>
            <p class="card-text"><b>User Mobile:</b> <?php echo e($user->phone); ?></p> 

            <p class="card-text"><b>User Role:</b>
                <?php if($user->role == '0'): ?> <?php echo e('User'); ?> <?php endif; ?>
                <?php if($user->role == '1'): ?> <?php echo e('Admin'); ?> <?php endif; ?>
                <?php if($user->role == '-1'): ?> <?php echo e('Super Admin'); ?> <?php endif; ?>
            </p>
        </div>
    </div>

    <h5 class="mt-4">User Reviews:</h5>

    <div class="row">
        <?php if($user->testimonials && $user->testimonials->count() > 0): ?>
            <?php $__currentLoopData = $user->testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo e($user->fullname); ?></h4>
                            <p class="card-text">User Review: <?php echo e($testimonial->review); ?></p>
                            <p class="card-text">Created At: <?php echo e($testimonial->created_at->format('Y-m-d H:i')); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p class="text-muted">No reviews found for this user.</p>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\MP\sterPiece\resources\views/users/show.blade.php ENDPATH**/ ?>