<?php $__env->startSection('content'); ?>

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-1">
                    <h4 class="page-title">Influenciadores</h4>
                    <p>Crie seus influenciadores para despois agregar diversos links.</p>
                    <ol class="breadcrumb">
                        <li>
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
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <form role="form">
                                <div class="form-group contact-search m-b-30">
                                    <input type="text" id="search" class="form-control" placeholder="Buscar...">
                                    <button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
                                </div> <!-- form-group -->
                            </form>
                        </div>
                        <div class="col-sm-4">
                            <div class="m-b-30">
                                <a href="#custom-modal" class="btn btn-primary btn-md waves-effect waves-light " data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Criar influenciador</a>
                            </div>
                        </div>
                        <div class="row col-sm-12" id="register">
                            <!-- Alerts -->
                            <?php echo $__env->make('includes.alerts_js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php echo $__env->make('includes.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                        <div class="">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Influenciador</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $influencers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $influencer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="gradeU" id="tr_<?php echo e($influencer->id); ?>">
                                        <td><a href="<?php echo e(route('urls', ['id' => $influencer->id])); ?>" class="text-name-influencer"><?php echo e($influencer->name); ?></a></td>
                                        <td class="actions">
                                            <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                            <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                            <a href="#modal_edit_influencer" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-id-edit="<?php echo e($influencer->id); ?>" data-overlayColor="#36404a" class="edit_influencer"><i class="fa fa-pencil"></i></a>
                                            <a href="" class="on-default remove-row delete_influencer" data-id-delete="<?php echo e($influencer->id); ?>"><i class="fa fa-trash-o"></i></a>
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

    <!-- Modal register new influencer -->
    <div id="custom-modal" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Fechar</span>
        </button>

        <h4 class="custom-modal-title">Criar Influenciador</h4>
        <div class="custom-modal-text text-left">

            <div class="validate-forms">

                <?php echo $__env->make('includes.alerts_validations', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <form role="form" method="POST" action="<?php echo e(route('register_influencer')); ?>">

                    <?php echo e(csrf_field()); ?>


                    <div class="form-group">

                        <input type="hidden" name="id_campaign" value="<?php echo e($campaign->id); ?>">

                        <label for="name">Nome do influenciador:</label>
                        <input type="text" class="required form-control" id="name" name="name" placeholder="Ex.: Ana Maria Brogui">
                    </div>

                    <button type="submit" class="btn btn-default waves-effect waves-light validate">Salvar</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancelar</button>

                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- Modal edit influencer-->
    <div id="modal_edit_influencer" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Fechar</span>
        </button>
        <h4 class="custom-modal-title">Editar Influenciador</h4>
        <div class="custom-modal-text text-left">

            <?php echo $__env->make('includes.alerts_validations', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <form role="form">

                <input type="hidden" id="id_influencer" name="id_influencer" value="">
                <input type="hidden" name="id_campaign" id="id_campaign" value="">

                <div class="form-group">
                    <label for="name">Nome do influenciador:</label>
                    <input type="text" class="form-control" id="name_influencer" name="name" required="" placeholder="Ex.: Ana Maria Brogui">
                </div>

                <button type="button" id="form_update_influencer" class="btn btn-default waves-effect waves-light">Salvar</button>
                <button class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancelar</button>
            </form>
        </div>
    </div>
    <!-- end modal -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>