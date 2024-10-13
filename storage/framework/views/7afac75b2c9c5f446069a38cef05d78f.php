
<?php $__env->startSection('title', 'Edit Company'); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-left">
        <button class="btn">
            <a href="<?php echo e(route('companies.index')); ?>" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>

    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Edit Company</h5>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('companies.update', $company->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="card-body demo-vertical-spacing demo-only-element">

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="company_name" value="<?php echo e($company->company_name); ?>" class="form-control" id="companyNameInput" placeholder="Company Name" required>
                        <label for="companyNameInput">Company Name</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <textarea name="description" class="form-control" id="descriptionInput" rows="3" placeholder="Company Description" required><?php echo e($company->description); ?></textarea>
                        <label for="descriptionInput">Description</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="phone" value="<?php echo e($company->phone); ?>" class="form-control" id="phoneInput" placeholder="Company Phone" required>
                        <label for="phoneInput">Phone</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="text" name="address" value="<?php echo e($company->address); ?>" class="form-control" id="addressInput" placeholder="Company Address" required>
                        <label for="addressInput">Address</label>
                    </div>

                    <div class="form-floating form-floating-outline mb-6">
                        <input type="email" name="email" value="<?php echo e($company->email); ?>" class="form-control" id="emailInput" placeholder="Company Email" required>
                        <label for="emailInput">Email address</label>
                    </div>

                    

                    <button class="btn btn-success">Update</button>

                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\MP\sterPiece\resources\views/dashboard/companies/edit.blade.php ENDPATH**/ ?>