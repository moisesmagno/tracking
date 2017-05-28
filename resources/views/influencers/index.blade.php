@extends('templates.app')

@section('content')

    <div class="container">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-1">
                    <h4 class="page-title">Influenciadores</h4>
                    <p>Administre os seus influenciadores vinculados a campanha.</p>
                    <ol class="breadcrumb">
                        <li>
                            <a href="">Marcas</a>
                        </li>
                        <li>
                            <a href="">Campanhas</a>
                        </li>
                        <li>
                            Influenciadores
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div style="min-height: 1000px;">

            <!-- corpo -->
            <h1>{{ $campaign->name }}</h1>
            <br>

            <div class="panel">
                <div class="panel-body">
                    <div class="col-sm-12">
                        <div class="m-b-30 pull-right">
                            <a href="#custom-modal" class="btn btn-primary btn-md waves-effect waves-light " data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Adicionar URL</a>
                        </div>
                    </div>
                    <div class="row col-sm-12" id="register-influencer">
                        <!-- Alerts -->
                        @include('includes.alerts')
                        @include('includes.alerts_js')
                    </div>
                    <div class="">
                        <table class="table table-striped table-bordered dt-responsive display nowrap" id="dt-influencers" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Influenciador</th>
                                <th>Destino</th>
                                <th>URL Curto</th>
                                <th>Pixel</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($influencers as $influencer)
                                <tr class="gradeU"  id="tr_{{ $influencer->id }}">
                                    <td><a href="{{ route('results', ['id' => $influencer->id]) }}" class="text-description-name">{{ $influencer->name }}</a></td>
                                    <td>{{ $influencer->destiny_url }}</td>
                                    <td>{{ $influencer->short_url }}</td>
                                    <td>{{ $pixel->name or '--'}}</td>
                                    <td class="actions">
                                        <a href="#modal_edit_influencer" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-id-edit="{{ $influencer->id }}" data-overlayColor="#36404a" class="edit_influencer"><i class="fa fa-pencil"></i></a>
                                        <a href="#" class="on-default remove-row delete_influencer" data-id-delete="{{ $influencer->id }}"><i class="fa fa-trash-o"></i></a>
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

    </div> <!-- container -->

    </div> <!-- content -->

@endsection

@section('modals')

    <!-- Modal - Register Incluencer -->
    <div id="custom-modal" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Fechar</span>
        </button>
        <h4 class="custom-modal-title">Adicionar Influenciador</h4>
        <div class="custom-modal-text text-left">

            <div class="validate-forms">

                @include('includes.alerts_validations')

                <form role="form" action="{{ route('register_influencer') }}" method="post">

                    <!-- Security token -->
                    {{ csrf_field() }}
                    <input type="hidden" name="id_campaign" value="{{ $campaign->id }}">

                    <div class="form-group">
                        <label for="name">Nome do influenciador:</label>
                        <input type="text" class="required form-control" id="name" name="name" placeholder="Nome do influenciador">
                    </div>
                    <div class="form-group">
                        <label for="name">URL de destino:</label>
                        <input type="text" class="required form-control" id="destiny_url" name="destiny_url" placeholder="http://sitedestino.com.br">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-default waves-effect waves-light validate">Salvar</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- Modal - Edit Influencer -->
    <div id="modal_edit_influencer" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Fechar</span>
        </button>
        <h4 class="custom-modal-title">Editar Influenciador</h4>
        <div class="custom-modal-text text-left">

            <div class="validate-forms">

                @include('includes.alerts_validations')

                <form role="form">

                    <input type="hidden" id="id_campaign" name="id_campaign" value="{{ $campaign->id }}">

                    <input type="hidden" id="id_influencer" name="id_influencer" value="">

                    <div class="form-group">
                        <label for="name">Nome do influenciador :</label>
                        <input type="text" class="required form-control" id="name" name="name" placeholder="Nome do influencer">
                    </div>
                    <div class="form-group">
                        <label for="name">URL de destino:</label>
                        <input type="text" class="form-control" id="destiny_url" name="destiny_url" placeholder="http://sitedestino.com.br" disabled="true">
                    </div>
                    <div class="form-group">
                        <label for="name">URL curto:</label>

                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" class="form-control short_url_generated" id="short_url" name="short_url" placeholder="Ex.: http://sitedestino.com.br" readonly="true">
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-success waves-effect waves-light" id="btn_copy_short_url">
                                    <span class="btn-label"><i class="fa fa-copy"></i></span>Copiar URL</button>
                            </div>
                        </div>

                    </div>
                    <br>
                    <button type="button" class="btn btn-default waves-effect waves-light validate" id="form_update_influencer">Salvar</button>
                    <button class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancelar</button>

                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->
@endsection
