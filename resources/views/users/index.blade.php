@extends('template.main')

@section('title', 'Usuarios')

@section('content')
	<div class="container myContainer">			
		<a href="{{ route('admin.users.create') }}" class="btn btn-primary myButton">Registrar un nuevo usuario</a>
		@include('flash::message')
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th>ID</th>
		      <th>Nombre</th>
		      <th>Correo</th>
		      <th>Tipo</th>
		      <th>Acción</th>
		    </tr>
		  </thead>
		  <tbody>
			@foreach($users as $user)
			    <tr>
			      <th scope="row"> {{ $user->id }} </th>
			      <td> {{ $user->name }} </td>
			      <td> {{ $user->email }} </td>
			      <td> {{ $user->type }} </td>
			      <td> 
			      	<a class="btn btn-warning" href="{{ route('admin.users.edit', $user->id) }}" onclick="return confirm('¿Desea editar este usuario?')">Editar</a> 
			      	<a class="btn btn-danger" href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('¿Desea eliminar este usuario?')" >Eliminar</a> 
			      </td>
			    </tr>
			@endforeach
		  </tbody>
		</table>			
		{!! $users->links() !!}
	</div>
@endsection