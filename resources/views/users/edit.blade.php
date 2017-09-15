@extends('template.main')

@section('title', 'Editar usuarios')

@section('content')
	<div class="container myContainer">
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
   				{!! Form::password('password',['class' => 'form-control', 'name' => 'pass', 'placeholder' => '**************' ,'required']) !!}
   			</div>

   			<div class="form-group">
   				{!! Form::label('confirm', 'Confirmar contraseña:') !!}
   				{!! Form::password('password',['class' => 'form-control', 'name' => 'confirm' ,'placeholder' => '**************' ,'required']) !!}
   			</div>

   			<div class="form-group">
   				{!! Form::submit('Editar',['class' => 'btn btn-primary', 'onclick' => 'comprobarClave()']) !!}
   			</div>

		{!! Form::close() !!}
	</div>
@endsection