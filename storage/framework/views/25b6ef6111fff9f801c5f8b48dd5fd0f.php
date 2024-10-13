
<?php $__env->startSection('title','View Category'); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-left">
        <button class="btn">
            <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            Category Info
        </div>
        <div class="card-body">
            <!-- Category Name -->
            <h5 class="card-title">Category Name: <?php echo e($category->name); ?></h5> 

            <!-- Category Image -->
           
            <?php if($category->image): ?>
    <p><strong>Category Image:</strong></p>
    <img src="<?php echo e(asset( $category->image)); ?>" alt="Category Image" style="width: 150px; height: 150px;">
<?php else: ?>
    <p><strong>Category Image:</strong> No Image Available</p>
<?php endif; ?>

             
           
           
            <!-- Category Description -->
            <p class="card-text"><b>Description:</b> <?php echo e($category->description); ?></p>

            <!-- Category Type -->
            <p class="card-text"><b>Category Type:</b> <?php echo e($category->category_type); ?></p>

            <!-- Category Created By (User) -->
            <p class="card-text"><b>Created By (User ID):</b> <?php echo e($category->user_id); ?></p>
        </div>
    </div>

    <!-- Category Reviews Section -->
    <h5 class="mt-4">Category Reviews:</h5>

    <div class="row">
        <?php if($category->reviews && $category->reviews->count() > 0): ?>
            <?php $__currentLoopData = $category->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="card mt-2">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo e($review->title); ?></h4>
                            <p class="card-text">Review: <?php echo e($review->review); ?></p>
                            <p class="card-text">Created At: <?php echo e($review->created_at->format('Y-m-d H:i')); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p class="text-muted">No reviews found for this category.</p>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\MP\sterPiece\resources\views/dashboard/categories/show.blade.php ENDPATH**/ ?>