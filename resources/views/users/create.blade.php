@extends('template.main')

@section('title', 'Registrar usuarios')

@section('content')
	<div class="container myContainer">

      @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

		{!! Form::open(['route' => 'admin.users.store', 'name' => 'form' , 'method' => 'POST']) !!}
   			
   			<div class="form-group">
   				{!! Form::label('name', 'Nombre:') !!}
   				{!! Form::text('name', null ,['class' => 'form-control', 'placeholder' => 'Ej. Iván Ontiveros', 'required'] ) !!}
   			</div>

   			<div class="form-group">
   				{!! Form::label('email' , 'Correo:') !!}
   				{!! Form::email('email',null,['class' => 'form-control', 'placeholder' => 'Ej. Correo@correo.com', 'required']) !!}
   			</div>

            <div class="form-group">
               {!! Form::label('type', 'Tipo de usuario:') !!}
               {!! Form::select('type', ['admin' => 'Administrador', 'member' => 'Miembro'], null, [ 'class' => 'form-control', 'placeholder' => 'Seleccione el tipo de usuario...' , 'required']) !!}
            </div>

   			<div class="form-group">
   				{!! Form::label('password', 'Contraseña:') !!}
   				{!! Form::password('password',['class' => 'form-control', 'placeholder' => '*********', 'required']) !!}
   			</div>

   			<div class="form-group">
   				{!! Form::label('password-confirm', 'Confirmar contraseña:') !!}
   				{!! Form::password('password-confirm',['class' => 'form-control', 'name' => 'password_confirmation' ,'placeholder' => '*********', 'required']) !!}
   			</div>

   			<div class="form-group">
   				{!! Form::submit('Registrar',['class' => 'btn btn-primary', 'onclick' => 'comprobarClave()']) !!}
   			</div>

		{!! Form::close() !!}
	</div>
@endsection