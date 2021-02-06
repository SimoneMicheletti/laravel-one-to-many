@extends('layouts.main-layout')

@section('content')

	<h1>NEW TASK:</h1>

	<form action="{{ route('task-store') }}" method="post">

		@csrf
		@method('POST')

		<label for="title">Title</label>
		<input name="title" type="text">

		<br>

		<label for="description">Description</label>
		<input name="description" type="text">

		<br>

		<label for="priority">Priority</label>
		<select name="priority">
			@for ($i = 1; $i <= 5; $i++)
				<option value="{{$i}}">{{$i}}</option>				
			@endfor
		</select>

		<br>

		<label for="employee_id">Assigned to</label>
		<select name="employee_id">
			@foreach ($employees as $employee)
				<option value="{{ $employee -> id }}">{{ $employee -> name }} {{ $employee -> lastname }}</option>				
			@endforeach
		</select>

		<br>

		<input type="submit" value="SAVE">

	</form>

@endsection