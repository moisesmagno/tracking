<?php $__env->startSection('content'); ?>

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class=" card-box">
            <div class="panel-heading">
                <h3 class="text-center"> Alterar senha </h3>
            </div>
            <div class="panel-body">

                <!-- Alerts -->
                <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <!-- Alerts of errors and validations php -->
                <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?php echo e(route('update_password')); ?>" role="form" class="text-center">

                    <!-- Security token -->
                    <?php echo e(csrf_field()); ?>


                    <!-- Sets the sending method is PUT -->
                    <?php echo e(method_field('PUT')); ?>


                    <div class="form-group m-b-0">
                        <div class="input-group">
                            <input type="email" required="" class="form-control" name="email" placeholder="Digite seu e-mail">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-pink w-sm waves-effect waves-light">
                                    Gerar nova senha
                                </button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.app_external', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>