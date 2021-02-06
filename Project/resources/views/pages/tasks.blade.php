@extends('layouts.main-layout')

@section('content')

	<a href="{{ route('employees-index') }}">ALL EMPLOYEES</a> <br>
	<a href="{{ route('task-create') }}">CREATE NEW TASK</a>

	<h1>Tasks:</h1>

	<ul>
		@foreach ($tasks as $task)
			<a href="{{ route('task-show', $task -> id) }}">
				<li>{{ $task -> id }}: {{ $task -> title }}</li>
			</a>
		@endforeach	
	</ul>	

@endsection