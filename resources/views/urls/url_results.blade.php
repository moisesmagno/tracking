@extends('templates.app')

@section('content')

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
                            <a href="">Influenciadores</a>
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

            <h2>Brogui</h2>
            <p>
                <strong>Primeiro link identificado:</strong> 12/11/2016
                <br>
                <strong>Pixel de conversão:</strong> Compra no site
            </p>
            <br>
            <div class="panel">
                <div class="panel-body">
                    <div class="">
                        <table class="table table-striped" id="datatable-editable">
                            <thead>
                                <tr>
                                    <th>Rede</th>
                                    <th>Cliques</th>
                                    <th>Cliques Únicos</th>
                                    <th>Engajamento</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="gradeU">
                                    <td><a href="#url_do_post_na_rede">Instagram</a></td>
                                    <td>12.092</td>
                                    <td>10.092</td>
                                    <td>10.092</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
                <!-- end: page -->
            </div> <!-- end Panel -->

            {{--<h4 class="m-b-20 m-t-30">Detalhes</h4>--}}

            {{--<div class="panel">--}}
                {{--<div class="panel-body">--}}
                    {{--<div class="btn-group dropdown">--}}
                        {{--<button type="button" class="btn btn-success waves-effect waves-light">Instagram</button>--}}
                        {{--<button type="button" class="btn btn-success dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"><i class="caret"></i></button>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><a href="#">Facebook</a></li>--}}
                            {{--<li><a href="#">Youtube</a></li>--}}
                            {{--<li><a href="#">Outros</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}

                    {{--<div class="m-t-10">--}}
                        {{--<table class="table table-striped" id="datatable-editable">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th>Tipo</th>--}}
                                {{--<th>Total</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--<tr class="gradeU">--}}
                                {{--<td>Like</td>--}}
                                {{--<td>13.332</td>--}}
                            {{--</tr>--}}
                            {{--</tbody>--}}
                            {{--<tbody>--}}
                            {{--<tr class="gradeU">--}}
                                {{--<td>Play</td>--}}
                                {{--<td>13.332</td>--}}
                            {{--</tr>--}}
                            {{--</tbody>--}}
                            {{--<tbody>--}}
                            {{--<tr class="gradeU">--}}
                                {{--<td>Comentário</td>--}}
                                {{--<td>13.332</td>--}}
                            {{--</tr>--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<!-- end: page -->--}}

            {{--</div> <!-- end Panel -->--}}

            <br>
            <p>Exportar para:</p>
            <div class="dt-buttons btn-group">
                <a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons"><span>CSV</span></a>
                <a class="btn btn-default buttons-excel buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons"><span>Excel</span></a>
                <a class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0" aria-controls="datatable-buttons"><span>PDF</span></a>
                <a class="btn btn-default buttons-print btn-sm" tabindex="0" aria-controls="datatable-buttons"><span>Print</span></a>
            </div>

            <br><br>

            {{--<div style="clear:both" class="p-t-10">--}}
                {{--<button type="button" class="btn btn-danger waves-effect waves-light">--}}
								 {{--<span class="btn-label">--}}
									 {{--<i class="fa fa-times"></i>--}}
								 {{--</span>--}}
                    {{--Remover influenciador</button>--}}
            {{--</div>--}}

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

@endsection

@section('footer')

    <footer class="footer text-right">
        © 2016. All rights reserved.
    </footer>

@endsection