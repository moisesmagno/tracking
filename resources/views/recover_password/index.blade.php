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
                <form method="post" action="{{ route('update_password') }}" role="form" class="text-center">

                    {{ csrf_field() }}

                    <!-- Define que o método de envio é PUT -->
                    {{ method_field('PUT') }}

                    @if(session()->has('message-success'))
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                ×
                            </button>

                            {!! session()->get('message-success') !!}
                        </div>
                    @endif

                    @if(session()->has('message-warning'))
                        <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                ×
                            </button>

                            {!! session()->get('message-warning') !!}
                        </div>
                    @endif

                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error  }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

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