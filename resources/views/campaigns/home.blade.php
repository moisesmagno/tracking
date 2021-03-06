@extends('templates.app')

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-1">
                    <h4 class="page-title">Campanhas</h4>
                    <p>Crie suas campanhas para organizar os influenciadores.</p>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('home') }}">Marcas</a>
                        </li>
                        <li>
                            Campanhas
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <div style="min-height: 1000px;">

            <!-- corpo -->
            <h2>{{ $mark->name }}</h2>

            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="m-b-30 pull-right">
                                <a href="#custom-modal" class="btn btn-primary btn-md waves-effect waves-light " data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a"><i class="md md-add"></i> Criar campanha</a>
                            </div>
                        </div>
                        <div class="row col-sm-12" id="register">
                            <!-- Alerts -->
                            @include('includes.alerts_js')
                            @include('includes.alerts')
                        </div>
                        <div class="">
                            <table class="table table-striped table-bordered dt-responsive display nowrap" id="dt-campaigns" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Nome da campanha</th>
                                    <th>Nome pixel</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @foreach($campaigns as $campaign)
                                        <tr class="gradeU" id="tr_{{ $campaign->id }}">
                                            <td><a href="{{ route('list_influencers', ['id' => $campaign->id])}}" class="text-name-campaign">{{$campaign->name}}</a></td>
                                            <td><a class="text-name-pixel">{{ (isset($campaign->getPixels[0])) ? $campaign->getPixels[0]->name : '--' }}</a></td>
                                            <td class="actions">
                                                <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                                <a href="#modal_edit_campaign" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-id-edit="{{ $campaign->id }}" data-overlayColor="#36404a" class="edit_campaign"><i class="fa fa-pencil"></i></a>
                                                @if(count($campaign->getInfluencers) <= 0)
                                                    <a href="" class="on-default remove-row delete_campaign" data-id-delete="{{ $campaign->id }}"><i class="fa fa-trash-o"></i></a>
                                                @endif
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
        </div> <!-- container -->
    </div> <!-- content -->

@endsection

@section('modals')

    <!-- Modal register new campaign -->
    <div id="custom-modal" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Fechar</span>
        </button>

        <h4 class="custom-modal-title">Criar Campanha</h4>
        <div class="custom-modal-text text-left">
            
            <div class="validate-forms">
               
                @include('includes.alerts_validations')
               
                <form role="form" method="POST" action="{{ route('register_campaign') }}">
                    
                        {{ csrf_field() }}

                        <input type="hidden" name="id_mark" value="{{ $mark->id }}">

                        <div class="form-group">
                            <label for="name">Nome da campanha:</label>
                            <input type="text" class="required form-control" id="name" name="name" placeholder="Ex.: Produto para cabelo">
                        </div>

                        <div class="form-group">
                            <label for="sel1">Pixel de conversão:</label>
                            <select class="form-control" name="pixel" id="pixel">
                                <option value="" disabled selected>Selecione</option>
                                @foreach($pixels as $pixel)
                                    <option value="{{ $pixel['id'] }}">{{ $pixel['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default waves-effect waves-light validate">Salvar</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- Modal edit campaign-->
    <div id="modal_edit_campaign" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Fechar</span>
        </button>
        <h4 class="custom-modal-title">Editar Campanha</h4>
        <div class="custom-modal-text text-left">

            <div class="validate-forms">

                @include('includes.alerts_validations')

                <form role="form">
                    <input type="hidden" name="id_mark" id="id_mark" value="{{ $mark->id }}">
                    <input type="hidden" id="id_campaign" name="id_campaign" value="">
                    <div class="form-group">
                        <label for="name">Nome da campanha:</label>
                        <input type="text" class="required form-control" id="name_campaign" name="name" required="" placeholder="Ex.: Produto para cabelo">
                    </div>
                    <div class="form-group">
                        <label for="sel1">Pixel de conversão:</label>
                        <select class="form-control" name="pixel" id="pixel">
                            <option class="op-pixel" value="" readonly="true">Selecione</option>
                            @foreach($pixels as $pixel)
                                <option class="op-pixel" value="{{ $pixel['id'] }}">{{ $pixel['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" id="form_update_campaign" class="btn btn-default waves-effect waves-light validate">Salvar</button>
                    <button class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->
@endsection