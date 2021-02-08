@extends('layouts.main-layout')

@section('content')

	<a href="{{ route('tasks-index') }}">ALL TASKS</a> <br>
	<a href="{{ route('typologies-index') }}">ALL TYPOLOGIES</a> <br><br>
	<a href="{{ route('employee-create') }}">CREATE NEW EMPLOYEE</a>

	<h1>Employees:</h1>

	<ul>
		@foreach ($employees as $employee)
			<li>
				<a href="{{ route('employee-show', $employee -> id) }}">
					{{ $employee -> name }} {{ $employee -> lastname }}
				</a>
				<ul>
					@foreach ($employee -> tasks as $task)
						<li>
							<a href="{{ route('task-show', $task -> id) }}">
								Task {{ $task -> id }}: {{ $task -> title }}
							</a>
						</li>
					@endforeach
				</ul>
			</li>
		@endforeach
	</ul>
	
@endsection