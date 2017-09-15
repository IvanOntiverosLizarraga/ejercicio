@extends('template.main')

@section('title', 'Autores')

@section('content')
	
	<div class="container myContainer">	
		<a class="btn btn-primary myButton" href="{{ route('admin.autores.create') }}">Registrar un nuevo autor</a>
		@include('flash::message')
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th>ID</th>
		      <th>Nombre</th>
		      <th>Acción</th>
		    </tr>
		  </thead>
		  <tbody>
			@foreach($autores as $autor)
			    <tr>
			      <th scope="row">{{ $autor->id }}</th>
			      <td>{{ $autor->name }}</td>
			      <td>
			      	<a class="btn btn-warning" href="{{ route('admin.autores.edit', $autor->id) }}" onclick="return confirm('¿Desea editar este autor?')">Editar</a>
			      	<a class="btn btn-danger" href="{{ route('admin.autores.destroy',$autor->id) }}" onclick="return confirm('¿Desea editar este autor?')">Eliminar</a>
			      </td>
			    </tr>
			@endforeach
		  </tbody>
		</table>

		{!! $autores->links() !!}

	</div>

@endsection