
<?php $__env->startSection('title', 'Companies'); ?>

<?php $__env->startSection('content'); ?>
    <div class="text-left">
        <a href="<?php echo e(route('companies.create')); ?>" class="btn btn-success">+ Add Company</a>
    </div>

    <div class="card mt-4">
        <div class="card-header">Companies List</div>
        <div class="card-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($company->company_name); ?></td>
                        <td><?php echo e($company->email); ?></td>
                        <td><?php echo e($company->phone); ?></td>
                        <td>
    <form action="<?php echo e(route('companies.show', $company->id)); ?>" method="GET" style="display:inline-block;">
        <button type="submit" style="background: none; border: none; color: #007bff; cursor: pointer;" title="View Company">
            <i class="fas fa-eye"></i>
        </button>
    </form>

    <form action="<?php echo e(route('companies.edit', $company->id)); ?>" method="POST" style="display:inline-block;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('GET'); ?>
        <button type="submit" style="background: none; border: none; color: #ffc107; cursor: pointer;" title="Edit Company">
            <i class="fas fa-edit"></i>
        </button>
    </form>

    <form action="<?php echo e(route('companies.destroy', $company->id)); ?>" method="POST" style="display:inline-block;">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" style="background: none; border: none; color: red; cursor: pointer;" onclick="return confirm('Are you sure?')" title="Delete User">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\user\Desktop\MP\sterPiece\resources\views/dashboard/companies/index.blade.php ENDPATH**/ ?>