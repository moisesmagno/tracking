@extends('templates.app_external')

@section('content')

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class=" card-box">
            <div class="panel-heading">
                <h3 class="text-center"> Alterar senha </h3>
            </div>
            <div class="panel-body">
                <form method="post" action="#" role="form" class="text-center">

                    {{ csrf_field() }}

                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×
                        </button>
                        Enviamos para o seu <b>e-mail</b> as instruções para criar uma nova senha.
                    </div>
                    <div class="form-group m-b-0">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Digite seu e-mail" required="">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-pink w-sm waves-effect waves-light">
                                    Gerar nova senha
                                </button>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection