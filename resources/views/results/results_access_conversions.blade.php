@extends('templates.app')

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-1">
                    <h4 class="page-title">Resultados</h4>
                    <p>Veja como está os resultados do seu influenciador</p>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{ route('home') }}">Marcas</a>
                        </li>
                        <li class="active">
                            <a href="{{ route('list_campaigns', ['' => session('id_mask')]) }}">Campanhas</a>
                        </li>
                        <li class="active">
                            <a href="{{ route('list_influencers', ['id' => session('id_campaign')]) }}">Influenciadores</a>
                        </li>
                        <li class="active">
                            Relatório
                        </li>
                    </ol>
                </div>
            </div>
        </div>

        <h2>{{ $influencer->name }}</h2>
        <br>
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-8">
                <div class="page-header-1">
                    <h4 class="page-title">URL</h4>
                    <p>Quantidade de cliques por rede e conversões de acordo ao processo completo.</p>

                </div>
            </div>
        </div>

        <div style="min-height: 1000px;">

            <!-- corpo -->
            <div class="panel">
                <div class="panel-body">
                    <div class="">
                        <table class="table table-striped table-bordered dt-responsive display nowrap" id="dt-results" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Rede</th>
                                    <th>Cliques</th>
                                    <th>Cliques únicos</th>
                                    <th>Conversões</th>
                                    <th>Valor Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($url_results as $urlResult)
                                    <tr class="gradeU">
                                        <td><a>{{ ($urlResult->referer == 'Outro') ? $urlResult->referer.'s' : $urlResult->referer}}</a></td>
                                        <td>{{ $urlResult->total_clicks }}</td>
                                        <td>{{ $urlResult->unique_clicks or 0}}</td>
                                        <td>{{ $urlResult->conversao or '--' }}</td>
                                        <td>{{ ($urlResult->valor_total)? 'R$' . $urlResult->valor_total : '--'}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end: page -->

            </div> <!-- end Panel -->

            <br><br>

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-8">
                    <div class="page-header-1">
                        <h4 class="page-title">Pixel de conversão</h4>
                        <p>Quantidade de acessos e conversões referentes apenas ao Pixel de conversão.</p>

                    </div>
                </div>

            </div>

            <div style="min-height: 1000px;">

                <!-- corpo -->
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">

                            <div class="row col-sm-12" id="crud-pixel-conversion">
                                <!-- Alerts -->
                                @include('includes.alerts_js')
                                @include('includes.alerts')
                            </div>
                            <div class="">
                                <table class="table table-striped table-bordered dt-responsive display nowrap" id="dt-pixel-results" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Nome da conversão</th>
                                        <th>Conversões</th>
                                        <th>Valor</th>
                                        <th>Valor total</th>
                                        <th>Criado em</th>
                                        <th>Janela</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @if($pixel)
                                            <tr class="gradeU" id="tr_{{ $pixel->id }}">
                                                <td><a class="text-name-pixel">{{ $pixel->name }}</a></td>
                                                <td>{{ count($pixel->usersAccessInformations) }}</td>
                                                <td>R$ {{ number_format($pixel->value, 2, ',', '.') }}</td>
                                                <td>R$ {{ number_format(count($pixel->usersAccessInformations) * $pixel->value, 2, ',', '.') }}</td>
                                                <td>{{ $pixel->created_at->format('d/m/Y') }}</td>
                                                <td class="text-interval-pixel">{{ $pixel->time_interval . ' ' . $pixel->interval_type }}</td>
                                                <td class="actions">
                                                    <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                                    <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                                    <a href="#" class="on-default edit-row code_tags_js" data-toggle="modal" data-target="#code_pixel_conversion"  data-id-user="{{ session('id') }}" data-id-code="{{ $pixel->id }}"><i class="typcn typcn-code"></i></a>
                                                    <a href="#modal_edit_pixel" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-id-edit="{{ $pixel->id }}" data-overlayColor="#36404a" class="edit_pixel_conversion"><i class="fa fa-pencil"></i></a>
                                                    {{--<a href="#"  data-id-delete="{{ $pixel->id }}" class="on-default remove-row delete_pixel"><i class="fa fa-trash-o"></i></a>--}}
                                                </td>
                                            </tr>
                                        @endif

                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- end: page -->

                    </div> <!-- end Panel -->
                    <!-- corpo teste -->

                </div>
            </div> <!-- container -->
        </div>

@endsection

@section('modals')

    <!-- Modal edit pixel conversion -->
    <div id="modal_edit_pixel" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Fechar</span>
        </button>
        <h4 class="custom-modal-title">Editar pixel de conversão</h4>
        <div class="custom-modal-text text-left">

            <div class="validate-forms">

                @include('includes.alerts_validations')

                <form role="form" action="{{ route('register_pixel_conversion') }}" method="post">

                    <!-- Security token -->
                    {{ csrf_field() }}

                    <input type="hidden" id="id_pixel_conversion" name="id_pixel_conversion" value="">

                    <div class="form-group">
                        <label for="name">Nome do pixel:</label>
                        <input type="text" class="required form-control" id="name" name="name" placeholder="Ex.: Cadastro no site do cliente">
                    </div>

                    <div class="form-group">
                        <label for="value">Valor do pixel:</label>
                        <span class="real-money-pixel">R$</span>
                        <input type="text" class="required form-control money-mask" id="value" name="value" value="" placeholder="0,00">
                    </div>

                    <div class="form-group m-b-30">
                        <label for="interval">Janela de conversão:</label>
                        <select class="required form-control select2" name="interval" id="interval">
                            <option class="op_interval" value="24|horas">24 horas</option>
                            <option class="op_interval" value="7|dias">7 dias</option>
                            <option class="op_interval" value="15|dias">15 dias</option>
                            <option class="op_interval" value="30|dias">30 dias</option>
                            <option class="op_interval" value="40|dias">40 dias</option>
                            <option class="op_interval" value="50|dias">50 dias</option>
                            <option class="op_interval" value="60|dias">60 dias</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default waves-effect waves-light validate" id="update_px_conversion">Salvar</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" onclick="Custombox.close();">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <!-- Modal com o código js para embed na página do cliente -->
    <div id="code_pixel_conversion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
                    <div class="col-md-12 m-b-30">
                        <textarea class="form-control" readonly="" cols="30" rows="4" id="code_tags_js_px"></textarea>
                    </div>
                    <p style="clear:both">Utilize o código comentado acima para adicionar um valor fixo ou uma variável do seu sistema que retorne o valor da conversão.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" onclick="Custombox.close();">Fechar</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" id="btn_script_js">Copiar código</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- end modal com js para embed na página do cliente -->

@endsection

