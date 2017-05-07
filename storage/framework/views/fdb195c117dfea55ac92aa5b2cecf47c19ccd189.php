<?php $__env->startSection('content'); ?>

    <div class="container">
        <div style="min-height: 1000px;">

            <!-- corpo -->
            <h1>Perfil do usuário</h1>

            <br>

            <!-- Change Password -->
            <div class="portlet">
                <div class="portlet-heading bg-custom">
                    <h3 class="portlet-title">
                        Alterar senha
                    </h3>
                    <div class="portlet-widgets">
                        
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="bg-primary1" class="panel-collapse collapse in">
                    <div class="portlet-body">
                        <div class="panel-body center-block" style="width: 50%;">

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

                            <form class="form-horizontal m-t-20" method="POST"  action="<?php echo e(route('change_password')); ?>">

                                <!-- Security token -->
                                <?php echo e(csrf_field()); ?>


                                <!-- Sets the sending method is PUT -->
                                <?php echo e(method_field('PUT')); ?>


                                <div class="form-group ">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" name="password" required="" placeholder="Nova senha">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" name="password_confirmation" required="" placeholder="Confirme sua senha">
                                    </div>
                                </div>
                                <div class="form-group text-center m-t-40">
                                    <div class="col-xs-12">
                                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Alterar senha</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End change password -->

            <!-- Generate token -->
            <div class="portlet">
                <div class="portlet-heading bg-custom">
                    <h3 class="portlet-title">
                        Token
                    </h3>
                    <div class="portlet-widgets">
                        
                        
                        
                        
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="bg-primary1" class="panel-collapse collapse in">
                    <div class="portlet-body">
                        <div class="control-label m-b-10 m-t-10"><b>Token gerado:</b></div>
                        <div style="max-width: 520px">
                            <input type="text" class="form-control" id="token" readonly="" value="<?php echo e(session('token_user')); ?>">
                        </div>
                        <div class="control-label m-b-10 m-t-10">
                            <button type="button" class="btn btn-success waves-effect waves-light" id="btn_copy_token">
                                <span class="btn-label"><i class="fa fa-copy"></i></span>Copiar token</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End generate token -->

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <footer class="footer text-right">
        © 2016. All rights reserved.
    </footer>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>