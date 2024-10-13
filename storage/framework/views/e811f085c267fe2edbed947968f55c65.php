
<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-left">
        <a href="<?php echo e(route('users.create')); ?>" class="btn btn-success waves-effect waves-light">+Add User</a>
    </div>
    <div class="card">
        <h5 class="card-header">User Table</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td>
                           <img src="<?php echo e(asset($user->image)); ?>" style="width:40px; height: 40px;" alt="image"/>
                        </td>
                        <td><?php echo e($user->fullname); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td>
    <?php if($user->role == '0'): ?>
        <span class="badge bg-primary">User</span>
    <?php elseif($user->role == '1'): ?>
        <span class="badge bg-success">Admin</span>
    <?php elseif($user->role == '-1'): ?>
        <span class="badge bg-warning">Super Admin</span>
    <?php endif; ?>
</td>

                        <td>
                            <form action="<?php echo e(route('users.show', $user->id)); ?>" method="POST" style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" style="background: none; border: none; color: #007bff; cursor: pointer;" title="View User">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </form>

                            <form action="<?php echo e(route('users.edit', $user->id)); ?>" method="POST" style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('GET'); ?>
                                <button type="submit" style="background: none; border: none; color: #ffc107; cursor: pointer;" title="Edit User">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </form>

                            <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST" class="delete-form" style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="button" class="delete-btn" style="background: none; border: none; color: red; cursor: pointer;" title="Delete User">
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

    <!-- SweetAlert Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Wait until the DOM is fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent the form from submitting
                    const form = button.closest('form'); // Get the closest form

                    // Show SweetAlert confirmation
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
                            form.submit(); // Submit the form if confirmed
                        }
                    });
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\MP\sterPiece\resources\views/users/index.blade.php ENDPATH**/ ?>