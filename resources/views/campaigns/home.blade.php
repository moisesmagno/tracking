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
                            <a href="">Home</a>
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
                        <div class="row col-sm-12">
                            <!-- Alerts -->
                            @include('includes.alerts')
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

                                    @foreach($campaigns as $campaign)
                                        <tr class="gradeU">
                                            <td><a href="links_campanha.html">{{$campaign->name}}</a></td>
                                            <td class="actions">
                                                <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                                <a href="#" style="display: left;" class="on-default edit-row"><i class="fa fa-pencil"></i></a>

                                                <form action="{{ route('delete_campaign', ['id' => $campaign->id]) }}" method="post" style="display: inline;">

                                                    {{--Envia token via post--}}
                                                    {{ csrf_field() }}

                                                    {{--Informa o tipo de método será executado.--}}
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit" style="padding: 0; border: none; background: transparent; "><a onclick="return confirm('Deseja realmente excluir esta campanha?');" class="on-default remove-row"><i class="fa fa-trash-o"></i></a></button>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

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
            <form role="form" method="POST" action="{{ route('register_campaign') }}">

                <!-- Security token -->
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Nome da campanha:</label>
                    <input type="text" class="form-control" id="name" name="name" required="" placeholder="Ex.: Produto para cabelo">
                </div>

                <button type="submit" class="btn btn-default waves-effect waves-light">Salvar</button>
                <button type="button" class="btn btn-danger waves-effect waves-light m-l-10">Cancelar</button>
            </form>
        </div>
    </div>
    <!-- end modal -->
@endsection
