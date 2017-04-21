<?php $__env->startSection('content'); ?>

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class=" card-box">
            <div class="panel-heading">
                <h3 class="text-center"> Cadastre-se no <strong class="text-custom">Tracking Celebryts</strong> </h3>
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

                <form class="form-horizontal m-t-20" action="<?php echo e(route('register_new_user')); ?>" method="POST">

                    <?php echo e(csrf_field()); ?>


                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="email" placeholder="E-mail" required="" value="<?php echo e(old('email')); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" placeholder="Password" required="" value="<?php echo e(old('password')); ?>">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="name"placeholder="Nome completo" required="" value="<?php echo e(old('name')); ?>">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="company_name" placeholder="Nome da empresa" required="" value="<?php echo e(old('company_name')); ?>">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="telephone" placeholder="Telefone" required="" value="<?php echo e(old('telephone')); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox" checked="checked">
                                <label for="checkbox-signup">Eu aceito <a href="#">os termos de uso</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">
                                Cadastrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 text-center">
                <p>
                    Você já tem uma conta?<a href="<?php echo e(route('login')); ?>" class="text-primary m-l-5"><b>Entrar</b></a>
                </p>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.app_external', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>