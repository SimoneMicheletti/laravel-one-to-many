@extends('layouts.main-layout')

@section('content')

	<h1>EDIT TYPOLOGY {{ $typology -> id }}:</h1>

	<form action="{{ route('typology-update', $typology -> id) }}" method="post">

		@csrf
		@method('POST')

		<label for="name">Name</label>
		<input name="name" type="text" value="{{ $typology -> name }}">

		<br>

		<label for="description">Description</label>
		<input name="description" type="text" value="{{ $typology -> description }}">

		<br>

		<label for="tasks[]">Add tasks to this typology:</label> <br>

		@foreach ($tasks as $task)
			<input name="tasks[]" type="checkbox" value="{{ $task -> id }}"
			
				@if ($typology -> tasks -> contains($task -> id))
					checked
				@endif

			> {{ $task -> title }} <br>
		@endforeach

		<br>

		<input type="submit" value="SAVE">

	</form>

@endsection