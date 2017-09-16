@extends('template.main')

@section('title', 'Editar usuarios')

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
   

		{!! Form::open(['route' => ['admin.users.update',$user->id], 'name' => 'form' , 'method' => 'PUT']) !!}
   			
   			<div class="form-group">
   				{!! Form::label('name', 'Nombre:') !!}
   				{!! Form::text('name', $user->name ,['class' => 'form-control', 'required'] ) !!}
   			</div>

   			<div class="form-group">
   				{!! Form::label('email' , 'Correo:') !!}
   				{!! Form::email('email',$user->email,['class' => 'form-control', 'required']) !!}
   			</div>

            <div class="form-group">
               {!! Form::label('type', 'Tipo de usuario:') !!}
               {!! Form::select('type', ['admin' => 'Administrador', 'member' => 'Miembro'], $user->type, [ 'class' => 'form-control', 'required']) !!}
            </div>

   			<div class="form-group">
   				{!! Form::label('password', 'Contraseña:') !!}
   				{!! Form::password('password',['class' => 'form-control', 'placeholder' => '**************' ,'required']) !!}
   			</div>

   			<div class="form-group">
   				{!! Form::label('password-confirm', 'Confirmar contraseña:') !!}
   				{!! Form::password('password-confirm',['class' => 'form-control', 'name' => 'password_confirmation' ,'placeholder' => '**************' ,'required']) !!}
   			</div>

   			<div class="form-group">
   				{!! Form::submit('Editar',['class' => 'btn btn-primary', 'onclick' => 'comprobarClave()']) !!}
   			</div>

		{!! Form::close() !!}
	</div>
@endsection