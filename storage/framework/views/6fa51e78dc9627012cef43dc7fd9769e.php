

<?php $__env->startSection('title', 'System Setup Required'); ?>

<?php $__env->startSection('content'); ?>
<div class="account-pages my-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8 col-xl-7">
                <div class="card overflow-hidden">
                    <div class="card-body pt-0">
                        <div class="p-4 text-center">

                            <div class="mb-4">
                                <i class="mdi mdi-alert-circle-outline text-warning"
                                   style="font-size: 64px;"></i>
                            </div>

                            <h4 class="text-uppercase fw-bold">
                                System Setup Required
                            </h4>

                            <p class="text-muted fs-5 mt-3">
                                The system cannot start because the default
                                user was not found in the database.
                            </p>

                            <div class="mt-4">
                                <p class="mb-2 fs-6 fw-bold">
                                    How to resolve this issue
                                </p>

                                <p class="text-muted small fs-6">
                                    Run the database migrations and ensure
                                    that the default user has been created.
                                </p>

                                <div class="bg-light rounded p-3 my-4">
                                    <code>php artisan migrate</code>
                                </div>

                                <p class="text-muted small">
                                    If the problem persists, contact your
                                    system administrator.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="text-center mt-3">
                    <p class="text-muted small">
                        System Initialization Error
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\const\Documents\System\logistics\resources\views/errors/no-setup.blade.php ENDPATH**/ ?>