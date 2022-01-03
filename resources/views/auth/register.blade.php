@extends('html_structure')
@section('css link')
	<link rel="stylesheet" type="text/css" href="{{ url('css/signin.css') }}">
	@endsection('css link')

@section('content')

<div id="painel">
	<img src="images/icons/male_user.png" width="30%" style="margin: 0 auto 5% auto;">

	<h2>Create You Taskify Account</h2> <br><br>

	<form action="{{route('register')}}" method="POST">
        @csrf
		<input type="name" name="name" placeholder="Username">
		<input type="email" name="email" required placeholder="email">
		<input type="password" name="password" placeholder="Password">
		<input type="password" name="password_confirmation" required placeholder="Confirm Password">

		<input class="b_apresentative" type="submit" name="envio" value="Submit">
	</form>

</div>
@endsection('content')