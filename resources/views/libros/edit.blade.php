@extends('template.main')

@section('title', 'Editar libros')

@section('content')
	
	<div class="container myContainer">
		
		{!! Form::open(['route'=>['admin.libros.update',$libro->id], 'method'=>'PUT']) !!}
			
			<div class="form-group">
				{!! Form::label('name','Nombre:') !!}
				{!! Form::text('name', $libro->name ,['class'=>'form-control','placeholder'=>'Ej. Laravel Framework','required']) !!}
			</div>		

			<div class="form-group">
				{!! Form::label('autor_id','Autor:') !!}
				{!! Form::select('autor_id', $autores, $libro->autor->id ,[ 'class' => 'form-control', 'placeholder' => 'Seleccione el autor...' , 'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('categoria_id','Categoría:') !!}
				{!! Form::select('categoria_id', $categorias, $libro->categoria->id ,[ 'class' => 'form-control', 'placeholder' => 'Seleccione la categoría...' , 'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}

	</div>

@endsection