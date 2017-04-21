<?php $__env->startSection('content'); ?>

    <div class="container">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-1">
                    <h4 class="page-title">Planos</h4>
                    <p>Escolha o melhor plano para a sua empresa</p>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Campanhas</a>
                        </li>
                        <li class="active">
                            Fazer upgrade
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div style="min-height: 1000px;">

        <!-- corpo -->

            <div class="row">
                <!-- Pricing Item -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="pricing-item">
                        <div class="pricing-item-inner">
                            <div class="pricing-wrap">
                                <!-- Icon (Simple-line-icons) -->
                                <div class="pricing-icon">
                                    <i class="ion-plane text-success"></i>
                                </div>
                                <!-- Pricing Title -->
                                <div class="pricing-title text-success">
                                    Starter Pack
                                </div>
                                <!-- Pricing Features -->
                                <div class="pricing-features">
                                    <ul class="sf-list pr-list">
                                        <li>5 Projects</li>
                                        <li>1 GB Storage</li>
                                        <li>No Domain</li>
                                        <li>1 User</li>
                                        <li>Free Support</li>
                                    </ul>
                                </div>
                                <div class="pricing-num">
                                    <sup>$</sup>99
                                </div>
                                <div class="pr-per">
                                    per month
                                </div>
                                <!-- Button -->
                                <div class="pr-button">
                                    <button class="btn btn-success w-md waves-effect waves-light">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Pricing Item -->

                <!-- Pricing Item -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="pricing-item">
                        <div class="pricing-item-inner">
                            <div class="pricing-wrap">
                                <!-- Icon (Simple-line-icons) -->
                                <div class="pricing-icon">
                                    <i class="ion-trophy text-purple"></i>
                                </div>
                                <!-- Pricing Title -->
                                <div class="pricing-title text-purple">
                                    Professional Pack
                                </div>
                                <!-- Pricing Features -->
                                <div class="pricing-features">
                                    <ul class="sf-list pr-list">
                                        <li>5 Projects</li>
                                        <li>1 GB Storage</li>
                                        <li>No Domain</li>
                                        <li>1 User</li>
                                        <li>Free Support</li>
                                    </ul>
                                </div>
                                <div class="pricing-num">
                                    <sup>$</sup>199
                                </div>
                                <div class="pr-per">
                                    per month
                                </div>
                                <!-- Button -->
                                <div class="pr-button">
                                    <button class="btn btn-purple w-md waves-effect waves-light">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Pricing Item -->

                <!-- Pricing Item -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="pricing-item">
                        <div class="pricing-item-inner">
                            <div class="pricing-wrap">
                                <!-- Icon (Simple-line-icons) -->
                                <div class="pricing-icon">
                                    <i class="ion-umbrella text-pink"></i>
                                </div>
                                <!-- Pricing Title -->
                                <div class="pricing-title text-pink">
                                    Enterprise Pack
                                </div>
                                <!-- Pricing Features -->
                                <div class="pricing-features">
                                    <ul class="sf-list pr-list">
                                        <li>5 Projects</li>
                                        <li>1 GB Storage</li>
                                        <li>No Domain</li>
                                        <li>1 User</li>
                                        <li>Free Support</li>
                                    </ul>
                                </div>
                                <div class="pricing-num">
                                    <sup>$</sup>299
                                </div>
                                <div class="pr-per">
                                    per month
                                </div>
                                <!-- Button -->
                                <div class="pr-button">
                                    <button class="btn btn-pink w-md waves-effect waves-light">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Pricing Item -->

                <!-- Pricing Item -->
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="pricing-item">
                        <div class="pricing-item-inner">
                            <div class="pricing-wrap">
                                <!-- Icon (Simple-line-icons) -->
                                <div class="pricing-icon">
                                    <i class="ion-paper-airplane text-warning"></i>
                                </div>
                                <!-- Pricing Title -->
                                <div class="pricing-title text-warning">
                                    Unlimited Pack
                                </div>
                                <!-- Pricing Features -->
                                <div class="pricing-features">
                                    <ul class="sf-list pr-list">
                                        <li>5 Projects</li>
                                        <li>1 GB Storage</li>
                                        <li>No Domain</li>
                                        <li>1 User</li>
                                        <li>Free Support</li>
                                    </ul>
                                </div>
                                <div class="pricing-num">
                                    <sup>$</sup>399
                                </div>
                                <div class="pr-per">
                                    per month
                                </div>
                                <!-- Button -->
                                <div class="pr-button">
                                    <button class="btn btn-warning w-md waves-effect">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Pricing Item -->
            </div>

        <!-- corpo end -->

        </div>

    </div> <!-- container -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <footer class="footer text-right">
        © 2016. All rights reserved.
    </footer>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>

    <!-- Modal -->
    <div id="custom-modal" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Fechar</span>
        </button>
        <h4 class="custom-modal-title">Criar Campanha</h4>
        <div class="custom-modal-text text-left">
            <form role="form">
                <div class="form-group">
                    <label for="name">Nome da campanha:</label>
                    <input type="text" class="form-control" id="name" placeholder="Ex.: Produto para cabelo">
                </div>

                <button type="submit" class="btn btn-default waves-effect waves-light">Salvar</button>
                <button type="button" class="btn btn-danger waves-effect waves-light m-l-10">Cancelar</button>
            </form>
        </div>
    </div>
    <!-- end modal -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>