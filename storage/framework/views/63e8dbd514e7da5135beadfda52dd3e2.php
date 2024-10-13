
<?php $__env->startSection('title', 'View Product'); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-left">
        <button class="btn">
            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary p-2 float-start">Back to List</a>
        </button>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            Product Info
        </div>
        <div class="card-body">
            <!-- Product Name -->
            <h5 class="card-title">Product Name: <?php echo e($product->name); ?></h5> 

            <!-- Product Image -->
            <?php if($product->image): ?>
                <p><strong>Product Image:</strong></p>
                <img src="<?php echo e(asset($product->image)); ?>" alt="Product Image" style="width: 150px; height: 150px;">
            <?php else: ?>
                <p><strong>Product Image:</strong> No Image Available</p>
            <?php endif; ?>

            <!-- Product Description -->
            <p class="card-text"><b>Description:</b> <?php echo e($product->description); ?></p>

            <!-- Product Price -->
            <p class="card-text"><b>Price:</b> <?php echo e(number_format($product->price, 2)); ?> $</p>

            <!-- Product Category -->
            <p class="card-text"><b>Category:</b> <?php echo e($product->category->name); ?></p> <!-- Assuming category relationship exists -->

            <!-- Product Created By (User) -->
            <p class="card-text"><b>Created By (User ID):</b> <?php echo e($product->user_id); ?></p>
        </div>
    </div>

    <!-- Product Reviews Section -->
    <h5 class="mt-4">Product Reviews:</h5>

    <div class="row">
        <?php if($product->reviews && $product->reviews->count() > 0): ?>
            <?php $__currentLoopData = $product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            <p class="text-muted">No reviews found for this product.</p>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\MP\msterPiece\resources\views/dashboard/products/show.blade.php ENDPATH**/ ?>