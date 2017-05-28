<?php $__env->startSection('content'); ?>

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-1">
                    <h4 class="page-title">Marcas</h4>
                    <p>Crie suas marcas para organizar suas campanhas.</p>
                </div>
            </div>
        </div>

        <div style="min-height: 1000px;">
            <!-- corpo -->
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="m-b-30 pull-right">
                                <a href="#custom-modal" class="btn btn-primary btn-md waves-effect waves-light " data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Criar marca</a>
                            </div>
                        </div>
                        <div class="row col-sm-12" id="register">
                            <!-- Alerts -->
                            <?php echo $__env->make('includes.alerts_js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                        <div class="">
                            <table class="table table-striped table-bordered" id="dt-marks" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Nome da marca</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $__currentLoopData = $marks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="gradeU" id="tr_<?php echo e($mark->id); ?>">
                                            <td><a href="<?php echo e(route('list_campaigns', ['id' => $mark->id])); ?>" class="text-name-mark"><?php echo e($mark->name); ?></a></td>
                                            <td class="actions">
                                                <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                                <a href="#modal_edit_mark" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-id-edit="<?php echo e($mark->id); ?>" data-overlayColor="#36404a" class="edit_mark"><i class="fa fa-pencil"></i></a>
                                                <a href="" class="on-default remove-row delete_mark" data-id-delete="<?php echo e($mark->id); ?>"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                    </div><!-- end: page -->
                </div> <!-- end Panel -->

                <!-- corpo teste -->
            </div>
        </div> <!-- container -->
    </div> <!-- content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modals'); ?>

    <!-- Modal register new Mark -->
    <div id="custom-modal" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Fechar</span>
        </button>

        <h4 class="custom-modal-title">Criar marca</h4>
        <div class="custom-modal-text text-left">
            
            <div class="validate-forms">
               
                <?php echo $__env->make('includes.alerts_validations', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
               
                <form role="form" method="POST" action="<?php echo e(route('register_mark')); ?>">
                    
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <label for="name">Nome da marca:</label>
                            <input type="text" class="required form-control" id="name" name="name" placeholder="Ex.: Coca Cola">
                        </div>

                        <button type="submit" class="btn btn-default waves-effect waves-light validate">Salvar</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancelar</button>
                    
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- Modal edit mark -->
    <div id="modal_edit_mark" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Fechar</span>
        </button>
        <h4 class="custom-modal-title">Editar marca</h4>
        <div class="custom-modal-text text-left">

            <?php echo $__env->make('includes.alerts_validations', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <form role="form">
                <input type="hidden" id="id_mark" name="id_mark" value="">
                <div class="form-group">
                    <label for="name">Nome da marca:</label>
                    <input type="text" class="form-control" id="name_mark" name="name" required="" placeholder="Ex.: Coca Cola">
                </div>

                <button type="button" id="form_update_mark" class="btn btn-default waves-effect waves-light">Salvar</button>
                <button class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancelar</button>
            </form>
        </div>
    </div>
    <!-- end modal -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>