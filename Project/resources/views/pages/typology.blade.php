@extends('layouts.main-layout')

@section('content')

	<a href="{{ route('employees-index') }}">ALL EMPLOYEES</a> <br>
	<a href="{{ route('tasks-index') }}">ALL TASKS</a> <br>
	<a href="{{ route('typologies-index') }}">ALL TYPOLOGIES</a>

	<h1>Typology: {{ $typology -> id }}</h1>

	<a href="#">EDIT</a>

	<ul>
		<li>Name: {{ $typology -> name }}</li>
		<li>Description: {{ $typology -> description }}</li>
		<li>Tasks of this typology:
			<ul>
				@foreach ($typology -> tasks as $task)
					<li>
						<a href="{{ route('task-show', $task -> id) }}">
							Task {{ $task -> id }}: {{ $task -> title }}
						</a>									
					</li>
				@endforeach
			</ul>
		</li>
	</ul>

@endsection