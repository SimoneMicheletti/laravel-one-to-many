@extends('layouts.main-layout')

@section('content')

	<a href="{{ route('employees-index') }}">ALL EMPLOYEES</a> <br>
	<a href="{{ route('tasks-index') }}">ALL TASKS</a> <br>
	<a href="{{ route('typologies-index') }}">ALL TYPOLOGIES</a>

	<h1>Task: {{ $task -> id }}</h1>

	<a href="{{ route('task-edit', $task -> id) }}">EDIT</a>

	<ul>
		<li>Title: {{ $task -> title }}</li>
		<li>Description: {{ $task -> description }}</li>
		<li>Priority: {{ $task -> priority }}</li>
		<li>Assigned to: 
			<a href="{{ route('employee-show', $task -> employee -> id) }}">
				{{ $task -> employee -> name }} {{ $task -> employee -> lastname }}
			</a>
		</li>
		<li>Typology:
			<ul>
				@foreach ($task -> typologies as $typology)
					<li>
						<a href="{{ route('typology-show', $typology -> id) }}">
							{{ $typology -> name }}
						</a>				
					</li>
				@endforeach
			</ul>
		</li>
	</ul>

@endsection