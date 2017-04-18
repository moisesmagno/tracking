@extends('templates.app_external')

@section('content')

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class=" card-box">
            <div class="panel-heading">
                <h3 class="text-center"> Login no <strong class="text-custom">Tracking Celebryts</strong> </h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal m-t-20" action="">

                    {{ csrf_field() }}

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="E-mail">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" placeholder="Senha">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup">
                                    Manter logado
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Entrar</button>
                        </div>
                    </div>
                    <div class="form-group m-t-30 m-b-0">
                        <div class="col-sm-12">
                            <a href="{{ route('recover-password') }}" class="text-dark"><i class="fa fa-lock m-r-5"></i> Perdeu a senha?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>Não é cadastrado ainda? <a href="{{ route('register') }}" class="text-primary m-l-5"><b>Cadastre-se</b></a></p>
            </div>
        </div>
    </div>

@endsection