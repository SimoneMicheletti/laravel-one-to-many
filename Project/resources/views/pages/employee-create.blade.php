@extends('layouts.main-layout')

@section('content')

	<h1>NEW EMPLOYEE:</h1>

	<form action="{{ route('employee-store') }}" method="post">

		@csrf
		@method('POST')

		<label for="name">Firstname</label>
		<input name="name" type="text">

		<br>

		<label for="lastname">Lastname</label>
		<input name="lastname" type="text">

		<br>

		<label for="dateOfBirth">Date of Birth</label>
		<input name="dateOfBirth" type="text">

		<br>

		<input type="submit" value="SAVE">

	</form>

@endsection