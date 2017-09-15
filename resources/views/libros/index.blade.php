@extends('template.main')

@section('title', 'Libros')

@section('content')

	<div class="container myContainer">
		@if(!Auth::guest())
		<a class="btn btn-primary myButton" href="{{ route('admin.libros.create') }}">Registrar un nuevo libro</a>
		@endif

		@include('flash::message')
		<table class="table table-striped">
		  <thead >
		    <tr>
		      <th>ID</th>
		      <th>Nombre</th>
		      <th>Autor</th>
		      <th>Categoría</th>
			@if(!Auth::guest())
		      <th>Acción</th>
			@endif
		    </tr>
		  </thead>
		  <tbody>
			@foreach($libros as $libro)
			    <tr>
			      <th scope="row">{{ $libro->id }}</th>
			      <td>{{ $libro->name }}</td>
			      <td>{{ $libro->autor->name }}</td>
			      <td>{{ $libro->categoria->name }}</td>
			      @if(!Auth::guest())
			      <td>			      	
			      	<a class="btn btn-warning" onclick="return confirm('¿Desea editar este libro?')" href="{{ route('admin.libros.edit',$libro->id) }}">Editar</a>
			      	<a class="btn btn-danger" onclick="return confirm('¿Desea eliminar este libro?')" href="{{ route('admin.libros.destroy',$libro->id) }}">Eliminar</a>
			      </td>
			      @endif
			    </tr>
			@endforeach
		  </tbody>
		</table>

		{!! $libros->links() !!}

	</div>

@endsection