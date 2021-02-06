@extends('layouts.main-layout')

@section('content')

	<h1>EDIT task number {{ $task -> id }}:</h1>

	<form action="{{ route('task-update', $task -> id) }}" method="post">

		@csrf
		@method('POST')

		<label for="title">Title</label>
		<input name="title" type="text" value="{{ $task -> title }}">

		<br>

		<label for="description">Description</label>
		<input name="description" type="text" value="{{ $task -> description }}">

		<br>

		<label for="priority">Priority</label>
		<select name="priority">
			@for ($i = 1; $i <= 5; $i++)
				<option value="{{$i}}"
					@if ($task -> priority == $i)
						selected
					@endif											
				>{{$i}}</option>
			@endfor
		</select>

		<br>

		<label for="employee_id">Assigned to</label>
		<select name="employee_id">
			@foreach ($employees as $employee)
				<option value="{{ $employee -> id }}"
						@if ($employee -> id == $task -> employee -> id)
							selected
						@endif
					>{{ $employee -> name }} {{ $employee -> lastname }}
				</option>				
			@endforeach
		</select>

		<br>

		<input type="submit" value="SAVE">

	</form>

@endsection