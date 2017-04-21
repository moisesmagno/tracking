@extends('templates.app')

@section('content')

    <div class="container">
        <div style="min-height: 1000px;">

            <!-- corpo -->
            <h1>Perfil do usuário</h1>

            <br>

            <!-- Change Password -->
            <div class="portlet">
                <div class="portlet-heading bg-custom">
                    <h3 class="portlet-title">
                        Alterar senha
                    </h3>
                    <div class="portlet-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a data-toggle="collapse" data-parent="#accordion1" href="#bg-primary1"><i class="ion-minus-round"></i></a>
                        <span class="divider"></span>
                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="bg-primary1" class="panel-collapse collapse in">
                    <div class="portlet-body">
                        <div class="panel-body center-block" style="width: 50%;">

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

                            <form class="form-horizontal m-t-20" method="POST"  action="{{ route('change_password', ['id' => session('id')]) }}">

                                <!-- Security token -->
                                {{ csrf_field() }}

                                <!-- Sets the sending method is PUT -->
                                {{ method_field('PUT') }}

                                <div class="form-group ">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" name="password" required="" placeholder="Nova senha">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" name="password_confirmation" required="" placeholder="Confirme sua senha">
                                    </div>
                                </div>
                                <div class="form-group text-center m-t-40">
                                    <div class="col-xs-12">
                                        <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit">Alterar senha</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End change password -->

            <!-- Generate token -->
            <div class="portlet">
                <div class="portlet-heading bg-custom">
                    <h3 class="portlet-title">
                        Token
                    </h3>
                    <div class="portlet-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a data-toggle="collapse" data-parent="#accordion1" href="#bg-primary1"><i class="ion-minus-round"></i></a>
                        <span class="divider"></span>
                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="bg-primary1" class="panel-collapse collapse in">
                    <div class="portlet-body">
                        <div class="control-label m-b-10 m-t-10"><b>Token gerado:</b></div>
                        <div style="max-width: 520px">
                            <input type="text" class="form-control" readonly="" value="$2y$10$a2PN9hPZVWq55Ldwm0vCFOjLSCIdyGKrELw2ImnbzmHjLG0jZJ/G6">
                        </div>
                        <div class="control-label m-b-10 m-t-10">
                            <button type="button" class="btn btn-success waves-effect waves-light">
                                <span class="btn-label"><i class="fa fa-copy"></i></span>Copiar token</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End generate token -->

        </div>
    </div>

@endsection

@section('footer')
    <footer class="footer text-right">
        © 2016. All rights reserved.
    </footer>
@endsection