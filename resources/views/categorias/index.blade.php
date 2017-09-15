@extends('template.main')

@section('title', 'Categorías')

@section('content')
	
	<div class="container myContainer">		
		<a class="btn btn-primary myButton" href="{{ route('admin.categorias.create') }}">
		Registrar una nueva categoría</a>
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
			@foreach($categorias as $categoria)
			    <tr>
			      <th scope="row">{{ $categoria->id }}</th>
			      <td>{{ $categoria->name }}</td>
			      <td>
			      	<a class="btn btn-warning" onclick="return confirm('¿Desea editar esta categoría?')" href="{{ route('admin.categorias.edit', $categoria->id) }}">Editar</a>
			      	<a class="btn btn-danger" onclick="return confirm('¿Desea eliminar esta categoria?')" href="{{ route('admin.categorias.destroy', $categoria->id) }}">Eliminar</a>
			      </td>
			    </tr>
			@endforeach
		  </tbody>
		</table>
		
		{!! $categorias->links() !!}

	</div>

@endsection