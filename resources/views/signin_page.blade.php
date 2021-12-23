@extends('html_structure')
@section('css link')
	<link rel="stylesheet" type="text/css" href="{{ url('css/signin.css') }}">
	@endsection('css link')

@section('content')

<div id="painel">
	<img src="images/icons/male_user.png" width="30%" style="margin: 0 auto 5% auto;">

	<h2>Create You Taskify Account</h2> <br><br>

	<form>
		<input type="name" name="user" placeholder="Username">
		<input type="password" name="pass" placeholder="Password">

		<input class="b_apresentative" type="submit" name="envio" value="Submit">
	</form>

</div>
@endsection('content')