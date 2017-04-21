<?php $__env->startSection('content'); ?>

    <div class="container">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-1">
                    <h4 class="page-title">Lista de influenciadores</h4>
                    <p>Administre os influenciadores da campanha</p>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo e(route('home')); ?>">Home</a>
                        </li>
                        <li class="active">
                            <a href="<?php echo e(route('home')); ?>">Campanhas</a>
                        </li>
                        <li class="active">
                            Influenciadores
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div style="min-height: 1000px;">

            <!-- corpo -->
            <h1>Coca-cola Verão</h1>
            <br>
            <!-- influenciador add com sucesso -->
            <div class="portlet">
                <div class="portlet-heading bg-custom">
                    <h3 class="portlet-title">
                        URL para o influenciador Brogui
                    </h3>
                    <div class="portlet-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a data-toggle="collapse" data-parent="#accordion1" href="#bg-primary1"><i class="ion-minus-round"></i></a>
                        <span class="divider"></span>
                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="bg-primary1" class="panel-collapse collapse in">
                    <div class="portlet-body">
                        Agora é só compartilhar essa url com o influenciador, ela já vai indexar todas as redes assim que for inserida nos post das redes.
                        <div class="control-label m-b-10 m-t-10"><b>Url gerada:</b></div>
                        <div style="max-width: 300px">
                            <input type="text" class="form-control" readonly="" value="http://celebryts.com/coca-cola/21">
                        </div>
                        <div class="control-label m-b-10 m-t-10">
                            <button type="button" class="btn btn-success waves-effect waves-light">
                                <span class="btn-label"><i class="fa fa-copy"></i></span>Copiar url</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end influenciador add com sucesso -->

            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <form role="form">
                                <div class="form-group contact-search m-b-30">
                                    <input type="text" id="search" class="form-control" placeholder="Search...">
                                    <button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
                                </div> <!-- form-group -->
                            </form>
                        </div>
                        <div class="col-sm-4">
                            <div class="m-b-30">
                                <a href="#custom-modal" class="btn btn-primary btn-md waves-effect waves-light " data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Adicionar influenciador</a>
                            </div>
                        </div>
                        <div class="">
                            <table class="table table-striped" id="datatable-editable">
                                <thead>
                                <tr>
                                    <th>Influenciador</th>
                                    <th>Links</th>
                                    <th>Engajamento</th>
                                    <th>View</th>
                                    <th>Conversão</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="gradeU">
                                    <td><a href="<?php echo e(route('result_influencers')); ?>">Brogui</a></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td class="actions">
                                        <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                        <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                        <a href="#" class="on-default edit-row"><i class="typcn typcn-code"></i></a>
                                        <a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                        <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <tr class="gradeU">
                                    <td><a href="<?php echo e(route('result_influencers')); ?>">Primo Rico</a></td>
                                    <td>10</td>
                                    <td>2090</td>
                                    <td>100.000</td>
                                    <td>99</td>
                                    <td class="actions">
                                        <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                        <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                        <a href="#" class="on-default edit-row"><i class="typcn typcn-code"></i></a>
                                        <a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                        <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                <tr class="gradeU">
                                    <td><a href="<?php echo e(route('result_influencers')); ?>">Manual do Mundo</a></td>
                                    <td>32</td>
                                    <td>30.020</td>
                                    <td>1.323M</td>
                                    <td>350</td>
                                    <td class="actions">
                                        <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                        <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                        <a href="#" class="on-default edit-row"><i class="typcn typcn-code"></i></a>
                                        <a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                        <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end: page -->

                </div> <!-- end Panel -->

                <!-- corpo teste -->

            </div>

            <div class="panel panel-border panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Limite de links criados</h3>
                </div>
                <div class="panel-body">
                    <p>
                        Você já possui 3 links criados. Para criar novos links é necessário fazer upgrade da conta.
                    </p>
                    <p>
                        <a href="planos.html" class="btn btn-default waves-effect waves-light"> <span>Fazer Upgrade</span> </a>
                    </p>
                </div>
            </div>

        </div> <!-- container -->

    </div> <!-- content -->

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
        <h4 class="custom-modal-title">Adicionar influenciador</h4>
        <div class="custom-modal-text text-left">
            <form role="form">
                <div class="form-group">
                    <label for="name">Nome do influenciador:</label>
                    <input type="text" class="form-control" id="name" placeholder="Não é necessário ser exato">
                </div>

                <div class="form-group">
                    <label for="name">URL de destino da campanha:</label>
                    <input type="text" class="form-control" id="name" placeholder="Ex.: http://meusite.com/campanha">
                </div>

                <div class="form-group">
                    <span for="name">Pixel de conversão: </span>
                    <div class="btn-group dropdown">
                        <button type="button" class="btn btn-link waves-effect waves-light">Selecione o pixel</button>
                        <button type="button" class="btn btn-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><i class="caret"></i></button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Lead Coca</a></li>
                            <li><a href="#">Compra no site</a></li>
                            <li><a href="#">Cadastro no site</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Criar novo pixel</a></li>
                        </ul>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-default waves-effect waves-light">Salvar</button>
                <button type="button" class="btn btn-danger waves-effect waves-light m-l-10">Cancelar</button>
            </form>
        </div>
    </div>
    <!-- end modal -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>