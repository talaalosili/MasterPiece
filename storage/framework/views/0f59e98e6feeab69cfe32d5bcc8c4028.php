
<?php $__env->startSection('title', 'Products List'); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-left">
        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-success">+ Add Product</a>
    </div>

    <div class="card mt-3">
        <h5 class="card-header">Products List</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($products->isEmpty()): ?>
                        <tr>
                            <td colspan="7">No products found.</td>
                        </tr>
                    <?php else: ?>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td>
                           <img src="<?php echo e(asset($product->image)); ?>" style="width:40px; height: 40px;" alt="image"/>
                        </td>
                                <td><?php echo e($product->name); ?></td>
                                <td><?php echo e($product->description); ?></td>
                                <td><?php echo e($product->price); ?></td>
                                <td><?php echo e($product->category->category_type); ?></td>
                                                                
<td>
    <form action="<?php echo e(route('products.show', $product->id)); ?>" method="GET" style="display:inline-block;">
        <button type="submit" style="background: none; border: none; color: #007bff; cursor: pointer;" title="View User">
            <i class="fas fa-eye"></i>
        </button>
    </form>

    <form action="<?php echo e(route('products.edit',$product->id)); ?>" method="POST" style="display:inline-block;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('GET'); ?>
        <button type="submit" style="background: none; border: none; color: #ffc107; cursor: pointer;" title="Edit User">
            <i class="fas fa-edit"></i>
        </button>
    </form>

    <form action="<?php echo e(route('products.destroy',$product->id)); ?>" method="POST" style="display:inline-block;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" style="background: none; border: none; color: red; cursor: pointer;" onclick="return confirm('Are you sure?')" title="Delete User">
            <i class="fas fa-trash-alt"></i>
        </button>
    </form>
</td>


                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\MP\msterPiece\resources\views/dashboard/products/index.blade.php ENDPATH**/ ?>