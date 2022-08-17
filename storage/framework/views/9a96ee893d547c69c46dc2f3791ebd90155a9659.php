<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <?php if(auth()->guard('admin')->check()): ?>
        <li class="nav-item d-flex flex-row align-items-center">
           <?php echo e(__('messages.welcome')); ?> <?php echo e(Auth::guard('admin')->user()->name); ?> :
            <a class="nav-link" href="<?php echo e(route('backend.logout')); ?>" role="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <?php echo e(__('messages.logout')); ?>

                <form id="logout-form" action="<?php echo e(route('backend.logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </a>
        </li>
        <?php endif; ?>
    </ul>
</nav><?php /**PATH D:\xampp\sample_project\resources\views/backend/partials/commons/_navbar.blade.php ENDPATH**/ ?>