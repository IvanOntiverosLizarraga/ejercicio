@extends('template.main')

@section('title', 'Editar autores')

@section('content')
	<div class="container myContainer">
		{!! Form::open(['route' => ['admin.autores.update', $autor->id], 'method' => 'PUT']) !!}
			
			<div class="form-group">
				{!! Form::label('name', 'Nombre') !!}
				{!! Form::text('name', $autor->name,['class' => 'form-control', 'placeholder' => 'Ej. Iván Ontiveros', 'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}
	</div>
@endsection