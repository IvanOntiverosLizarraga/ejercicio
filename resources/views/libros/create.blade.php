@extends('template.main')

@section('title', 'Registrar libros')

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
		
		{!! Form::open(['route'=>'admin.libros.store', 'method'=>'POST']) !!}
			
			<div class="form-group">
				{!! Form::label('name','Nombre:') !!}
				{!! Form::text('name', null,['class'=>'form-control','placeholder'=>'Ej. Laravel Framework','required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('autor_id','Autor:') !!}
				{!! Form::select('autor_id', $autores,null ,[ 'class' => 'form-control', 'placeholder' => 'Seleccione el autor...' , 'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('categoria_id','Categoría:') !!}
				{!! Form::select('categoria_id', $categorias,null ,[ 'class' => 'form-control', 'placeholder' => 'Seleccione la categoría...' , 'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}

	</div>

@endsection