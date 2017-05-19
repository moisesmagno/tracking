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
                <div class="row" style="text-align: center;">
                    <span> Por favor insira o seu e-mail, enviaremos uma senha temporária no e-mail cadastrado. </span>
                </div>
                <br>

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

                <form method="post" action="{{ route('update_password') }}" role="form" class="text-center">

                    <!-- Security token -->
                    {{ csrf_field() }}

                    <!-- Sets the sending method is PUT -->
                    {{ method_field('PUT') }}

                    <div class="form-group m-b-0">

                        <div class="input-group">
                            <input type="email" required="" class="form-control" name="email" placeholder="Digite seu e-mail">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-pink w-sm waves-effect waves-light">
                                    Gerar nova senha
                                </button>
                            </span>
                        </div>
                        <br><br>
                        <div class="row">
                            <div>
                                <a href="{{ route('login') }}"><span><i class="fa fa-chevron-left" aria-hidden="true"></i> Voltar</span></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection