@extends('template.main')

@section('content')
<div class="container myContainer">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6">
                                <label for="name">Nombre:</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Ej. Iván Ontiveros">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6">
                                <label for="email" >Correo:</label>
                                <input id="email" type="email" class="form-control" name="email" placeholder="Ej. Correo@correo.com" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6">
                                <label for="password" >Contraseña:</label>
                                <input id="password" type="password" class="form-control" name="password" placeholder="******************">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            

                            <div class="col-md-6">
                                <label for="password-confirm" >Confirmar contraseña:</label>
                                <input id="password-confirm" type="password" class="form-control" placeholder="******************" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Registrarse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
         
        </div>
    </div>
</div>
@endsection
