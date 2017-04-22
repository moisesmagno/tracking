@extends('templates.app')

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-1">
                    <h4 class="page-title">Campanhas</h4>
                    <p>Crie suas campanhas para organizar os influenciadores</p>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="active">
                            Campanhas
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
                                <a href="#custom-modal" class="btn btn-primary btn-md waves-effect waves-light " data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Criar campanha</a>
                            </div>
                        </div>
                        <div class="">
                            <table class="table table-striped" id="_datatable-editable">
                                <thead>
                                <tr>
                                    <th>Nome da campanha</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="gradeU">
                                    <td><a href="links_campanha.html">Coca-Cola Verão</a></td>
                                    <td class="actions">
                                        <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                        <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                        <a href="#" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                        <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- end: page -->
                </div> <!-- end Panel -->

                <!-- corpo teste -->
            </div>
            {{--<div class="panel panel-border panel-danger">--}}
                {{--<div class="panel-heading">--}}
                    {{--<h3 class="panel-title">Limite de links criados</h3>--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<p>--}}
                        {{--Você já possui 3 links criados. Para criar novos links é necessário fazer upgrade da conta.--}}
                    {{--</p>--}}
                    {{--<p>--}}
                        {{--<a href="{{ route('plans') }}" class="btn btn-default waves-effect waves-light"> <span>Fazer Upgrade</span> </a>--}}
                    {{--</p>--}}
                {{--</div>--}}
            {{--</div>--}}
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
@endsection
