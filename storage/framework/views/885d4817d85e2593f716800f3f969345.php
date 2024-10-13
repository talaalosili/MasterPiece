
<?php $__env->startSection('title','Edit User'); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-left">
        <button class="btn">
            <a href="<?php echo e(route('users.index')); ?>" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>

    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Edit User</h5>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('users.update', $user->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="card-body demo-vertical-spacing demo-only-element">

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="name" value="<?php echo e($user->name); ?>" class="form-control" id="exampleFormControlInput1" placeholder="Mohammad" required>
                        <label for="exampleFormControlInput1">Name</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="email" name="email" value="<?php echo e($user->email); ?>" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
                        <label for="exampleFormControlInput1">Email address</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="mobile" value="<?php echo e($user->mobile); ?>" class="form-control" id="exampleFormControlInput1" placeholder="079" required>
                        <label for="exampleFormControlInput1">Phone Number</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <select class="form-select" name="role" id="exampleFormControlSelect1" aria-label="Default select example">
                            <option value="0" <?php echo e($user->role == 0 ? 'selected' : ''); ?>>User</option>
                            <option value="1" <?php echo e($user->role == 1 ? 'selected' : ''); ?>>Admin</option>
                        </select>
                        <label for="exampleFormControlSelect1">User Permissions</label>
                    </div>

                   
                <div class="mb-3">
                    <label>Upload File/Image</label>
                    <input type="file" name="image" class="form-control" />
                </div>

                  

                    <button class="btn btn-success">Update</button>

                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\MP\sterPiece\resources\views/dashboard/users/edit.blade.php ENDPATH**/ ?>