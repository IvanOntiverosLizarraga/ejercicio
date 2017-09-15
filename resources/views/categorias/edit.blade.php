@extends('template.main')

@section('title', 'Editar categorías')

@section('content')

	<div class="container myContainer">
		
		{!! Form::open(['route'=>['admin.categorias.update',$categoria->id], 'method'=>'PUT']) !!}

			<div class="form-group">
				{!! Form::label('name', 'Nombre:') !!}
				{!! Form::text('name', $categoria->name,['class'=>'form-control', 'placeholder'=>'Ej. Categoría','required' ]) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}

	</div>

@endsection