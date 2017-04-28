<?php $__env->startSection('content'); ?>

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-1">
                    <h4 class="page-title">Resultado do influencidor</h4>
                    <p>Veja como está o resultado do influenciador</p>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="active">
                            <a href="">Campanhas</a>
                        </li>
                        <li class="active">
                            <a href="">URLs</a>
                        </li>
                        <li class="active">
                            Relatório
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div style="min-height: 1000px;">

            <!-- corpo -->

            <h2><?php echo e($url->description); ?></h2>
            <p>
                <strong>Primeiro link identificado:</strong> 12/11/2016
                <br>
                <strong>Pixel de conversão:</strong> Compra no site
            </p>
            <br>
            <div class="panel">
                <div class="panel-body">
                    <div class="">
                        <table class="table table-striped" id="_datatable-editable">
                            <thead>
                                <tr>
                                    <th>Rede</th>
                                    <th>Cliques</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $url_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $urlResult): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="gradeU">
                                        <td><a href=""><?php echo e(($urlResult->referer == 'Outro') ? $urlResult->referer.'s' : $urlResult->referer); ?></a></td>
                                        <td><?php echo e($urlResult->id); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end: page -->
            </div> <!-- end Panel -->

            

            
                
                    
                        
                        
                        
                            
                            
                            
                        
                    

                    
                        
                            
                            
                                
                                
                            
                            
                            
                            
                                
                                
                            
                            
                            
                            
                                
                                
                            
                            
                            
                            
                                
                                
                            
                            
                        
                    
                

                

            

            <br>
            <p>Exportar para:</p>
            <div class="dt-buttons btn-group">
                <a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons"><span>CSV</span></a>
                <a class="btn btn-default buttons-excel buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons"><span>Excel</span></a>
                <a class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons"><span>PDF</span></a>
                <a class="btn btn-default buttons-print btn-sm" tabindex="0" aria-controls="datatable-buttons"><span>Print</span></a>
            </div>

            <br><br>

            
                
								 
									 
								 
                    
            

            <!-- corpo teste -->
        </div>

        
            
                
            
            
                
                    
                
                
                    
                
            
        
    </div> <!-- container -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>

    <footer class="footer text-right">
        © 2016. All rights reserved.
    </footer>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>