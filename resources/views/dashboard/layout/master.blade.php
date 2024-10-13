<!doctype html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free" data-style="light">
    
    <!-- Include the head section (title, meta, styles) -->
    @include('dashboard.include.top')

    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu (Sidebar) -->
                @include('dashboard.include.side')
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->
                    @include('dashboard.include.nav')
                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Main Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="row gy-6">
                                <!-- Yield the content section to be filled in other Blade views -->
                                @yield('content')
                            </div>
                        </div>
                        <!-- / Content -->

                        <!-- Footer -->
                        @include('dashboard.include.footer')
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
        @include('dashboard.include.bottom')

    </body>
</html>
