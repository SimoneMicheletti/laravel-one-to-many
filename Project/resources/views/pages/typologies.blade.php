@extends('layouts.main-layout')

@section('content')

	<a href="{{ route('employees-index') }}">ALL EMPLOYEES</a> <br>
	<a href="{{ route('tasks-index') }}">ALL TASKS</a> <br><br>
	<a href="{{ route('typology-create') }}">CREATE NEW TYPOLOGY</a>

	<h1>Tasks' typologies:</h1>

	<ul>
		@foreach ($typologies as $typology)
			<a href="{{ route('typology-show', $typology -> id) }}">
				<li>{{ $typology -> name }}
					<ul>
						@foreach ($typology -> tasks as $task)
							<a href="{{ route('task-show', $task -> id) }}">
								<li>Task {{ $task -> id }}: {{ $task -> title }}</li>
							</a>									
						@endforeach
					</ul>
				</li>
			</a>
		@endforeach	
	</ul>	

@endsection