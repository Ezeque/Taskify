	
	@extends('html_structure')
	@section('css link')
	<link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
	@endsection('css link')

	@section('content')
	@include('subviews.navbar')

	<div class="painel d-flex flex-column justify-content-center">
		<img src="images/taskify_logo.png" style="width: 20%; margin:auto; margin-top: 0px; margin-bottom: 0px;">;
	<h1 id="titulo">Hello!</h1>
	<div class="subtitle roboto">
		Welcome to Taskify, where every action counts...
	</div>
	</div>

<div id="corpo">
	@guest
		<ul style="height: 300px" class="w-100 pt-0 d-flex align-content-around justify-content-center painel_mids">
			<li class="roboto login justify-content-between d-flex align-items-center flex-column" style="background-image: url(images/Login_painel.png);"><span>Already have an account?</span> <br>
				<button class="b_apresentative"><a href="/login" style="margin-top: 170px;"><h2>Log-in</h2></a></button>
			</li>
			<li class="roboto login justify-content-between d-flex align-items-center flex-column" style="background-image: url(images/Signin_painel.png);"><span>Haven't signed in yet?</span> <br>
				<button class="b_apresentative"><a href="/register"><h2>Sign in</h2></a></button>
			</li>
			<li class="roboto login justify-content-between d-flex align-items-center flex-column" style="background-image: url(images/waw_painel.png);"><span>Don't know Taskify yet?</span> <br>
				<button class="b_apresentative"><a href="/unfinished"><h2>Who Are We</h2></a></button>
			</li>
		</ul>
	@endguest

	<div class="h-75" id="main">
		@include('subviews.painel_principal')
	@auth
		<div id="user_pannel" class="d-flex flex-column align-items-center justify-content-around border border-dark">
			<div class="border border-dark" style="background-color:#551974; background-image: url({{$request->user()->profile_photo_url}});
			background-size: cover; background-position: center; border-radius: 50%; width:100px; height:100px">
			</div>
			<ul class="w-100 flex-column align-items-start">
				<li><span class="fw-bold">Username:</span> {{$request->user()->name}}</li>
				<li><span class="fw-bold">Rank:</span> </li>
			</ul>
			<a href="/profile/edit">Change profile</a>
		</div>
	</div>
	@endauth

</div>
@endsection('content')


