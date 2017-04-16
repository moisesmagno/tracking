@extends('templates.app')

@section('content')

    <div class="container">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-1">
                    <h4 class="page-title">Pixel de conversão</h4>
                    <p>Para mensurar o resultado da conversão, crie o pixel e adicione em todas as páginas do site de destino.</p>
                    <ol class="breadcrumb">
                        <li>
                            <a href="#">Configurações</a>
                        </li>
                        <li class="active">
                            Pixels
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
                                    <input type="text" id="search" class="form-control" placeholder="Search...">
                                    <button type="submit" class="btn btn-white"><i class="fa fa-search"></i></button>
                                </div> <!-- form-group -->
                            </form>
                        </div>

                        <div class="col-sm-4">
                            <div class="m-b-30">
                                <a href="#custom-modal" class="btn btn-primary btn-md waves-effect waves-light " data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Criar novo pixel de conversão</a>
                            </div>
                        </div>

                        <div class="">
                            <table id="demo-foo-row-toggler" class="table toggle-circle table-hover">

                                <thead>
                                <tr>
                                    <th>Nome da conversão</th>
                                    <th>Conversões</th>
                                    <th>Valor</th>
                                    <th>Criado em</th>
                                    <th>Janela</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="gradeU">
                                    <td><a href="links_campanha.html">Cadastro do Site Coca-Cola</a></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>18/12/2016</td>
                                    <td>15 dias</td>
                                    <td class="actions">
                                        <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                        <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                        <a href="#" class="on-default edit-row" data-toggle="modal" data-target="#myModal"><i class="typcn typcn-code"></i></a>
                                        <a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                        <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                </tbody>

                                <tbody>
                                <tr class="gradeU">
                                    <td><a href="links_campanha.html">Compra no site Avon</a></td>
                                    <td>3.200</td>
                                    <td>R$ 125.900,00</td>
                                    <td>10/12/2016</td>
                                    <td>15 dias</td>
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

        </div> <!-- container -->

    </div> <!-- content -->

@endsection

@section('footer')

    <footer class="footer text-right">
        © 2016. All rights reserved.
    </footer>

@endsection

@section('modals')

    <!-- Modal -->
    <div id="custom-modal" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Fechar</span>
        </button>
        <h4 class="custom-modal-title">Criar Pixel de conversão</h4>
        <div class="custom-modal-text text-left">
            <form role="form">
                <div class="form-group">
                    <label for="name">Nome do pixel:</label>
                    <input type="text" class="form-control" id="name" placeholder="Ex.: Cadastro no site do cliente">
                </div>

                <div class="form-group m-b-30">
                    <label for="name">Janela de conversão:</label>
                    <select class="form-control select2">
                        <option>Selecione</option>
                        <option value="">24 horas</option>
                        <option value="">7 dias</option>
                        <option value="">15 dias</option>
                        <option value="">30 dias</option>
                        <option value="">40 dias</option>
                        <option value="">50 dias</option>
                        <option value="">60 dias</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-default waves-effect waves-light">Salvar</button>
                <button type="button" class="btn btn-danger waves-effect waves-light m-l-10">Cancelar</button>
            </form>
        </div>
    </div>
    <!-- end modal -->

    <!-- Modal com o código js para embed na página do cliente -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Código da conversão</h4>
                </div>
                <div class="modal-body">
                    <h4><b>Pixel:</b> Cadastro do site Coca-Cola</h4>
                    <p>Copie e cole a url abaixo em todas as páginas ca campanha. Na página de conversão, onde o cliente compra ou se cadastra, adicione a variável da conversão como explicado abaixo.</p>
                    <hr>
                    <h4>Código:</h4>

                    <div class="col-md-10 m-b-30">
                        <input type="text" class="form-control" readonly="" value="código js aqui">
                    </div>

                    <p style="clear:both">Utilize o código comentado acima para adicionar um valor fixo ou uma variável do seu sistema que retorne o valor da conversão.</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light">Copiar código</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- end modal com js para embed na página do cliente -->

@endsection