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
                            <a href="">Home</a>
                        </li>
                        <li class="active">
                            <a href="">Campanhas</a>
                        </li>
                        <li class="active">
                            URLs
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div style="min-height: 1000px;">

            <!-- corpo -->
            <h1><?php echo e($campaign->name); ?></h1>
            <br>
            <!-- influenciador add com sucesso -->
            
                
                    
                        
                    
                    
                        
                        
                        
                        
                        
                    
                    
                
                
                    
                        
                        
                        
                            
                        
                        
                            
                                
                        
                    
                
            
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
                                <a href="#custom-modal" class="btn btn-primary btn-md waves-effect waves-light " data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Adicionar URL</a>
                            </div>
                        </div>
                        <div class="row col-sm-12" id="register-url">
                            <!-- Alerts -->
                            <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php echo $__env->make('includes.alerts_js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                        <div class="">
                            <table class="table table-striped" id="_datatable-editable">
                                <thead>
                                <tr>
                                    <th>URL</th>
                                    <th>Destino</th>
                                    <th>URL Curto</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="gradeU"  id="tr_<?php echo e($url->id); ?>">
                                            <td><a href="<?php echo e(route('url_results', ['id' => $url->id])); ?>" class="text-description-url"><?php echo e($url->description); ?></a></td>
                                            <td><?php echo e($url->destiny_url); ?></td>
                                            <td><?php echo e($url->short_url); ?></td>
                                            <td class="actions">
                                                <a href="#modal_edit_url" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-id-edit="<?php echo e($url->id); ?>" data-overlayColor="#36404a" class="edit_url"><i class="fa fa-pencil"></i></a>
                                                <a href="#" onclick="return confirm('Deseja realmente excluir esta URL?');" class="on-default remove-row delete_url" data-id-delete="<?php echo e($url->id); ?>"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end: page -->

                </div> <!-- end Panel -->

                <!-- corpo teste -->

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

    <!-- Modal - Register URL -->
    <div id="custom-modal" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Fechar</span>
        </button>
        <h4 class="custom-modal-title">Adicionar URL</h4>
        <div class="custom-modal-text text-left">
            
            <div class="validate-forms">

                <?php echo $__env->make('includes.alerts_validations', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <form role="form" action="<?php echo e(route('register_url')); ?>" method="post">
                    
                        <!-- Security token -->
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="id_campaign" value="<?php echo e($campaign->id); ?>">
                        <div class="form-group">
                            <label for="name">Descrição :</label>
                            <input type="text" class="required form-control" id="description" name="description" placeholder="Descrição da URL">
                        </div>
                        <div class="form-group">
                            <label for="name">URL de destino:</label>
                            <input type="text" class="required form-control" id="destiny_url" name="destiny_url" placeholder="Ex.: http://sitedestino.com.br">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-default waves-effect waves-light validate">Salvar</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- Modal - Edit URL -->
    <div id="modal_edit_url" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Fechar</span>
        </button>
        <h4 class="custom-modal-title">Editar URL</h4>
        <div class="custom-modal-text text-left">
            
            <div class="validate-forms">
                <?php echo $__env->make('includes.alerts_validations', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <form role="form">
                    
                    <input type="hidden" id="id_campaign" name="id_campaign" value="<?php echo e($campaign->id); ?>">
                    <input type="hidden" id="id_url" name="id_url" value="">
                    <div class="form-group">
                        <label for="name">Descrição :</label>
                        <input type="text" class="required form-control" id="description" name="description" placeholder="Descrição da URL">
                    </div>
                    <div class="form-group">
                        <label for="name">URL de destino:</label>
                        <input type="text" class="form-control" id="destiny_url" name="destiny_url" placeholder="Ex.: http://sitedestino.com.br" disabled="true">
                    </div>
                    <div class="form-group">
                        <label for="name">URL curto:</label>
                        <input type="text" class="form-control" id="short_url" name="short_url" placeholder="Ex.: http://sitedestino.com.br" disabled="true">
                    </div>
                    <br>
                    <button type="button" class="btn btn-default waves-effect waves-light validate" id="form_update_url">Salvar</button>
                    <button class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancelar</button>
                
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>