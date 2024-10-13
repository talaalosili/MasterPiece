<!doctype html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free" data-style="light">
    
    <!-- Include the head section (title, meta, styles) -->
    <?php echo $__env->make('dashboard.include.top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu (Sidebar) -->
                <?php echo $__env->make('dashboard.include.side', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    <?php echo $__env->make('dashboard.include.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Main Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="row gy-6">
                                <!-- Yield the content section to be filled in other Blade views -->
                                <?php echo $__env->yieldContent('content'); ?>
                            </div>
                        </div>
                        <!-- / Content -->

                        <!-- Footer -->
                        <?php echo $__env->make('dashboard.include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- / Footer -->
                        
                        <!-- Overlay for mobile navigation -->
                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- / Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>
            <!-- Overlay for mobile menu -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->

        <!-- Include necessary bottom scripts -->
        <?php echo $__env->make('dashboard.include.bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </body>
</html>
<?php /**PATH C:\Users\user\Desktop\MP\sterPiece\resources\views/dashboard/layout/master.blade.php ENDPATH**/ ?>