@extends('html_structure')
@section('css link')
	<link rel="stylesheet" type="text/css" href="{{ url('css/signin.css') }}">
@endsection('css link')
@section('content')

<div id="painel" class="mt-3">
	<img src="images/icons/male_user.png" width="30%" style="margin: 0 auto 5% auto;">

	<h2>Log-In to Taskify!</h2> <br><br>

	<form method="POST">
		@csrf
		<input type="email" name="email" placeholder="Email">
		<input type="password" name="password" placeholder="Password">

		<input class="b_apresentative" type="submit" name="envio" value="Submit">
	</form>

</div>
@endsection('content')