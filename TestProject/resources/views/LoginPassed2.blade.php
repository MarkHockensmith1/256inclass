@extends('layouts.appmaster')
@section('title', 'Login Passed Page')

@section('content')
	@if($UserModel->getUsername() == 'Mark')
		<h3>you have logged in</h3>
	@else
		<h3>someone else logged in successfully</h3>
	@endif
		<br>
		<a href="login2">Login Again</a>
	@endsection
	
	
	