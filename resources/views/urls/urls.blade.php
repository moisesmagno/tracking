@extends('templates.app')

@section('content')

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
            <h1>{{ $campaign->name }}</h1>
            <br>
            <!-- influenciador add com sucesso -->
            {{--<div class="portlet">--}}
                {{--<div class="portlet-heading bg-custom">--}}
                    {{--<h3 class="portlet-title">--}}
                        {{--URL--}}
                    {{--</h3>--}}
                    {{--<div class="portlet-widgets">--}}
                        {{--<a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>--}}
                        {{--<span class="divider"></span>--}}
                        {{--<a data-toggle="collapse" data-parent="#accordion1" href="#bg-primary1"><i class="ion-minus-round"></i></a>--}}
                        {{--<span class="divider"></span>--}}
                        {{--<a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>--}}
                    {{--</div>--}}
                    {{--<div class="clearfix"></div>--}}
                {{--</div>--}}
                {{--<div id="bg-primary1" class="panel-collapse collapse in">--}}
                    {{--<div class="portlet-body">--}}
                        {{--Agora é só compartilhar essa url com o influenciador, ela já vai indexar todas as redes assim que for inserida nos post das redes.--}}
                        {{--<div class="control-label m-b-10 m-t-10"><b>Url gerada:</b></div>--}}
                        {{--<div style="max-width: 300px">--}}
                            {{--<input type="text" class="form-control" readonly="" value="http://celebryts.com/coca-cola/21">--}}
                        {{--</div>--}}
                        {{--<div class="control-label m-b-10 m-t-10">--}}
                            {{--<button type="button" class="btn btn-success waves-effect waves-light">--}}
                                {{--<span class="btn-label"><i class="fa fa-copy"></i></span>Copiar url</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
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
                        <div class="row col-sm-12">
                            <!-- Alerts -->
                            @include('includes.alerts')
                            @include('includes.alerts_js')
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
                                    @foreach($urls as $url)
                                        <tr class="gradeU"  id="tr_{{ $url->id }}">
                                            <td><a href="" class="text-description-url">{{ $url->description }}</a></td>
                                            <td>{{ $url->destiny_url }}</td>
                                            <td>{{ $url->short_url }}</td>
                                            <td class="actions">
                                                <a href="#modal_edit_url" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-id-edit="{{ $url->id }}" data-overlayColor="#36404a" class="edit_url"><i class="fa fa-pencil"></i></a>
                                                <a href="#" onclick="return confirm('Deseja realmente excluir esta URL?');" class="on-default remove-row delete_url" data-id-delete="{{ $url->id }}"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end: page -->

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
                        {{--<a href="planos.html" class="btn btn-default waves-effect waves-light"> <span>Fazer Upgrade</span> </a>--}}
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

    <!-- Modal - Register URL -->
    <div id="custom-modal" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Fechar</span>
        </button>
        <h4 class="custom-modal-title">Adicionar URL</h4>
        <div class="custom-modal-text text-left">
            <form role="form" action="{{ route('register_url') }}" method="post">
                <!-- Security token -->
                {{ csrf_field() }}
                <input type="hidden" name="id_campaign" value="{{ $campaign->id }}">
                <div class="form-group">
                    <label for="name">Descrição :</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Descrição da URL">
                </div>
                <div class="form-group">
                    <label for="name">URL de destino:</label>
                    <input type="text" class="form-control" id="destiny_url" name="destiny_url" placeholder="Ex.: http://sitedestino.com.br">
                </div>
                <br>
                <button type="submit" class="btn btn-default waves-effect waves-light">Salvar</button>
                <button type="button" class="btn btn-danger waves-effect waves-light m-l-10">Cancelar</button>
            </form>
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
            <form role="form">
                <input type="hidden" id="id_campaign" name="id_campaign" value="{{ $campaign->id }}">
                <input type="hidden" id="id_url" name="id_url" value="">
                <div class="form-group">
                    <label for="name">Descrição :</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Descrição da URL">
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
                <button type="button" class="btn btn-default waves-effect waves-light" id="form_update_url">Salvar</button>
                <button class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancelar</button>
            </form>
        </div>
    </div>
    <!-- end modal -->
@endsection
