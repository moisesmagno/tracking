<?php $__env->startSection('content'); ?>

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class=" card-box">
            <div class="panel-heading">
                <h3 class="text-center"> Login no <strong class="text-custom">Tracking Celebryts</strong> </h3>
            </div>
            <div class="panel-body">

                <?php if(session()->has('message-danger')): ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×
                        </button>

                        <?php echo session()->get('message-danger'); ?>

                    </div>
                <?php endif; ?>

                <form class="form-horizontal m-t-20" method="POST"  action="<?php echo e(route('login_user')); ?>">

                    <?php echo e(csrf_field()); ?>


                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="email" required="" placeholder="E-mail">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" required="" placeholder="Senha">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup">
                                    Manter logado
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Entrar</button>
                        </div>
                    </div>
                    <div class="form-group m-t-30 m-b-0">
                        <div class="col-sm-12">
                            <a href="<?php echo e(route('recover-password')); ?>" class="text-dark"><i class="fa fa-lock m-r-5"></i> Perdeu a senha?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>Não é cadastrado ainda? <a href="<?php echo e(route('register')); ?>" class="text-primary m-l-5"><b>Cadastre-se</b></a></p>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.app_external', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>