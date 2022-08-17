<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title'); ?> | JJ </title>

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('/css/backend.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/image-uploader.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/filter_multi_select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/css/leaflet.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>
</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" style="height: auto;">
    <div class="wrapper">
        <!-- Navbar -->
        <?php echo $__env->make('backend.partials.commons._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Main Sidebar Container -->
        <?php echo $__env->make('backend.partials.commons._sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- content -->
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php echo $__env->make('backend.partials.commons._bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <script src="<?php echo e(asset('/js/leaflet.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/backend.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/image-uploader.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/filter-multi-select-bundle.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <?php echo $__env->yieldContent('js'); ?>
</body>

</html>
<?php /**PATH D:\xampp\sample_project\resources\views/layouts/backend.blade.php ENDPATH**/ ?>