
<?php $__env->startSection('title', 'Categories'); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-left">
        <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-success waves-effect waves-light">+ Add Category</a>
    </div>
    <div class="card">
        <h5 class="card-header">Category Table</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Category Name</th>
                        <th>Description</th>
                        <th>Category Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td>
                           <img src="<?php echo e(asset($category->image)); ?>" style="width:40px; height: 40px;" alt="image"/>
                        </td>
                        <td><?php echo e($category->name); ?></td>
                        <td><?php echo e($category->description); ?></td>
                        <td><?php echo e($category->category_type); ?></td>

                        <td>
                            <!-- View Category -->
                            <form action="<?php echo e(route('categories.show', $category->id)); ?>" method="GET" style="display:inline-block;">
                                <button type="submit" style="background: none; border: none; color: #007bff; cursor: pointer;" title="View Category">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </form>

                            <!-- Edit Category -->
                            <form action="<?php echo e(route('categories.edit', $category->id)); ?>" method="POST" style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('GET'); ?>
                                <button type="submit" style="background: none; border: none; color: #ffc107; cursor: pointer;" title="Edit Category">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </form>

                            <!-- Delete Category -->
                            <form action="<?php echo e(route('categories.destroy', $category->id)); ?>" method="POST" style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" style="background: none; border: none; color: red; cursor: pointer;" onclick="return confirm('Are you sure?')" title="Delete Category">
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

<?php echo $__env->make('dashboard.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\MP\msterPiece\resources\views/dashboard/categories/index.blade.php ENDPATH**/ ?>