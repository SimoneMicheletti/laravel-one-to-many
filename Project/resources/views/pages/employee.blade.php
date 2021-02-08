@extends('layouts.main-layout')

@section('content')

	<a href="{{ route('employees-index') }}">ALL EMPLOYEES</a> <br>
	<a href="{{ route('tasks-index') }}">ALL TASKS</a> <br>
	<a href="{{ route('typologies-index') }}">ALL TYPOLOGIES</a>

	<h1>Employee: {{ $employee -> name }} {{ $employee -> lastname }}</h1>

	<a href="{{ route('employee-edit', $employee -> id) }}">EDIT</a>

	<ul>
		<li>Firstname: {{ $employee -> name }}</li>
		<li>Lastname: {{ $employee -> lastname }}</li>
		<li>Date of birth: {{ $employee -> dateOfBirth }}</li>
		<li>Tasks: 
			<ul>
				@foreach ($employee -> tasks as $task)
					<li>
						<a href="{{ route('task-show', $task -> id) }}">
							{{ $task -> title }}
						</a>
					</li>
				@endforeach
			</ul>
		</li>
	</ul>

@endsection