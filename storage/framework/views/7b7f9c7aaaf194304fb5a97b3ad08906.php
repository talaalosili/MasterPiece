
<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-left">
        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-success waves-effect waves-light">+ Add Product</a>
    </div>
    <div class="card">
        <h5 class="card-header">Product Table</h5>
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
                <tbody class="table-border-bottom-0">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td>
                           <img src="<?php echo e(asset($product->image)); ?>" style="width:40px; height: 40px;" alt="image"/>
                        </td>
                        <td><?php echo e($product->name); ?></td>
                        <td><?php echo e($product->description); ?></td>
                        <td><?php echo e(number_format($product->price, 2)); ?> $</td>
                        <td><?php echo e($product->category->name); ?></td> <!-- Assuming category relationship exists -->

                        <td>
                            <!-- View Product -->
                            <form action="<?php echo e(route('products.show', $product->id)); ?>" method="GET" style="display:inline-block;">
                                <button type="submit" style="background: none; border: none; color: #007bff; cursor: pointer;" title="View Product">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </form>

                            <!-- Edit Product -->
                            <form action="<?php echo e(route('products.edit', $product->id)); ?>" method="POST" style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('GET'); ?>
                                <button type="submit" style="background: none; border: none; color: #ffc107; cursor: pointer;" title="Edit Product">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </form>

                            <!-- Delete Product -->
                            <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="delete-btn" style="background: none; border: none; color: red; cursor: pointer;" title="Delete Product">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- SweetAlert Script for Confirm Delete -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); 
                    const form = button.closest('form');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); 
                        }
                    });
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\MP\sterPiece\resources\views/dashboard/products/index.blade.php ENDPATH**/ ?>