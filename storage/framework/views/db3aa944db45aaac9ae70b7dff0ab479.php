
<?php $__env->startSection('title', 'View Company'); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-left">
        <a href="<?php echo e(route('companies.index')); ?>" class="btn btn-primary p-2">Back to List</a>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            Company Information
        </div>
        <div class="card-body">
            <!-- Company Name -->
            <h5 class="card-title">Company Name: <?php echo e($company->company_name); ?></h5>

            <!-- Company Image -->
            <!-- <p class="card-text">
                <?php if($company->image): ?>
                    <img src="<?php echo e(asset('storage/' . $company->image)); ?>" alt="Company Image" style="width: 150px; height: 150px; object-fit: cover;">
                <?php else: ?>
                    <img src="<?php echo e(asset('images/default-company.png')); ?>" alt="Default Company Image" style="width: 150px; height: 150px; object-fit: cover;">
                <?php endif; ?>
            </p> -->

            <!-- Company Email -->
            <p class="card-text"><b>Company Email:</b> <?php echo e($company->email); ?></p>

            <!-- Company Phone -->
            <p class="card-text"><b>Company Phone:</b> <?php echo e($company->phone); ?></p>

            <!-- Company Address -->
            <p class="card-text"><b>Company Address:</b> <?php echo e($company->address); ?></p>

            <!-- Company Description -->
            <p class="card-text"><b>Company Description:</b> <?php echo e($company->description); ?></p>
        </div>
    </div>

    <!-- Company Reviews Section -->
    <h5 class="mt-4">Company Reviews:</h5>

    <div class="row">
        <?php if($company->testimonials && $company->testimonials->count() > 0): ?>
            <?php $__currentLoopData = $company->testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h6 class="card-title"><?php echo e($testimonial->title); ?></h6>
                            <p class="card-text">Review: <?php echo e($testimonial->review); ?></p>
                            <p class="card-text text-muted">Created At: <?php echo e($testimonial->created_at->format('Y-m-d H:i')); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p class="text-muted">No reviews found for this company.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\MP\sterPiece\resources\views/dashboard/companies/show.blade.php ENDPATH**/ ?>