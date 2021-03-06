@extends('templates.app_external')

@section('content')

    <div class="account-pages"></div>
    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class=" card-box">
            <div class="panel-heading">
                <h3 class="text-center"> Cadastre-se no <strong class="text-custom">Tracking Celebryts</strong> </h3>
            </div>
            <div class="panel-body">

                <!-- Alerts -->
                @include('includes.alerts')

                <!-- Alerts of errors and validations php -->
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="form-horizontal m-t-20" action="{{ route('register_new_user') }}" method="POST">

                    <!-- Security token -->
                    {{ csrf_field() }}

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="email" placeholder="E-mail" required="" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" placeholder="Password" required="" value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="name"placeholder="Nome completo" required="" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="company_name" placeholder="Nome da empresa" value="{{ old('company_name') }}">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control telephone-mask" type="text" name="telephone" placeholder="Telefone" value="{{ old('telephone') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox" checked="checked">
                                <label for="checkbox-signup">Eu aceito <a href="#">os termos de uso</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">
                                Cadastrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 text-center">
                <p>
                    Você já tem uma conta?<a href="{{ route('login') }}" class="text-primary m-l-5"><b>Entrar</b></a>
                </p>
            </div>
        </div>
    </div>

@endsection