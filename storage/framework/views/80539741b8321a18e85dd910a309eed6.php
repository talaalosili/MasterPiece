
<?php $__env->startSection('title','Edit Product'); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-left">
        <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary p-2 float-start">Back to List</a>
    </div>

    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Edit Product</h5>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="card-body demo-vertical-spacing demo-only-element">

                    <!-- Product Name -->
                    <div class="mb-3">
    <label for="name" class="form-label">Product Name:</label>
    <input type="text" id="name" name="name" class="form-control" required>
</div>


                    <!-- Product Description -->
                    <div class="form-floating form-floating-outline mb-6">
                        <textarea name="description" class="form-control" id="description" placeholder="Product Description" rows="4" required><?php echo e($product->description); ?></textarea>
                        <label for="description">Description</label>
                    </div>

                    <!-- Product Price -->
                    <div class="form-floating form-floating-outline mb-6">
                        <input type="number" name="price" value="<?php echo e($product->price); ?>" class="form-control" id="price" placeholder="Price" step="0.01" required>
                        <label for="price">Price</label>
                    </div>

                    <div class="mb-3">
    <label for="category_id" class="form-label">Category:</label>
    <select id="category_id" name="category_id" class="form-control" required>
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->id); ?>" <?php echo e($category->id == $product->category_id ? 'selected' : ''); ?>>
                <?php echo e($category->category_type); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>


                    <!-- Upload Image -->
                    <div class="mb-3">
                    <label>Upload File/Image</label>
                    <input type="file" name="image" class="form-control" />
                </div>
                    <button class="btn btn-success">Update Product</button>

                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\MP\msterPiece\resources\views/dashboard/products/edit.blade.php ENDPATH**/ ?>