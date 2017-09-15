@extends('template.main')

@section('title', 'Bienvenido')

@section('content')
    <div class="container myContainer">
    	<div class="myWeolcome">
    		<h1>Bienvenido</h1>
				@if(!Auth::guest())
    			<h2>{{ Auth::user()->name }}</h2>
				@endif
    	</div>
    </div>
@endsection