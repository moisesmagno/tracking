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

                    <!-- Cria o token de segurança -->
                    {{ csrf_field() }}

                    <!-- Define que o método de envio é PUT -->
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
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection