<!-- JAVASCRIPT -->
<script src="<?php echo e(URL::asset('build/libs/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/metismenu/metisMenu.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/simplebar/simplebar.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/node-waves/waves.min.js')); ?>"></script>
<script>
    $('.fullscreen-btn').on('click', function () {
        if (!document.fullscreenElement) {
            document.documentElement.requestFullscreen().then(() => {
                $(this).find('i').removeClass('bx-fullscreen').addClass('bx-exit-fullscreen');
            });
        } else {
            document.exitFullscreen().then(() => {
                $(this).find('i').removeClass('bx-exit-fullscreen').addClass('bx-fullscreen');
            });
        }
    });
</script>

 <!-- Sweet Alerts js -->
 <script src="<?php echo e(URL::asset('build/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
 <!-- Sweet alert init js-->
 <script src="<?php echo e(URL::asset('build/js/pages/sweet-alerts.init.js')); ?>"></script>



<?php echo $__env->yieldContent('script'); ?>

    <!-- Required datatable js -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <!-- Buttons examples -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/pdfmake/build/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/pdfmake/build/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-buttons/js/buttons.colVis.min.js')); ?>"></script>

    <!-- Responsive examples -->
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>
    <!-- Datatable init js -->
    <script src="<?php echo e(URL::asset('build/js/pages/datatables.init.js')); ?>"></script>





<!-- App js -->
<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>



<?php echo $__env->yieldContent('script-bottom'); ?>
<?php /**PATH C:\Users\const\Documents\System\logistics\resources\views/layouts/vendor-scripts.blade.php ENDPATH**/ ?>