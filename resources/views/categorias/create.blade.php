@extends('template.main')

@section('title', 'Registrar categorías')

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
		
		{!! Form::open(['route'=>'admin.categorias.store', 'method'=>'POST']) !!}

			<div class="form-group">
				{!! Form::label('name', 'Nombre:') !!}
				{!! Form::text('name', null,['class'=>'form-control', 'placeholder'=>'Ej. Categoría','required' ]) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}

	</div>

@endsection