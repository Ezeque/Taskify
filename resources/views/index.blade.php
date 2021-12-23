	
	@extends('html_structure')
	@section('css link')
	<link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
	@endsection('css link')

	@section('content')

	<div class="painel d-flex flex-column justify-content-center">
		<img src="images/taskify_logo.png" style="width: 20%; margin:auto; margin-top: 0px; margin-bottom: 0px;">;
	<h1 id="titulo">Hello!</h1>
	<div class="subtitle roboto">
		Welcome to Taskify, where every action counts...
	</div>
	</div>

<div id="corpo">
	<ul class=" h-50 w-100 pt-0 d-flex align-content-around justify-content-center painel_mids">
		<li class="roboto login h-25 d-flex align-items-center flex-column" style="background-image: url(images/Login_painel.png);"><span>Already have an account?</span> <br>
			<button class="b_apresentative"><a href="/login" style="margin-top: 170px;"><h2>Log-in</h2></a></button>
		</li>
		<li class="roboto login h-25 d-flex align-items-center flex-column" style="background-image: url(images/Signin_painel.png);"><span>Haven't signed in yet?</span> <br>
			<button class="btn b_apresentative"><a href="/signin"><h2>Sign in</h2></a></button>
		</li>
		<li class="roboto login h-25 d-flex align-items-center flex-column" style="background-image: url(images/waw_painel.png);"><span>Don't know Taskify yet?</span> <br>
			<button class="b_apresentative"><a href="/unfinished"><h2>Who Are We</h2></a></button>
		</li>
	</ul>
	<div id="main">
		<div id="painel_principal">
		<nav>
			<ul>
				<li>
					<a href="unfinished.html"><img class="nav_icon" src="images/icons/user_icon.png"><br>
					<span class="roboto" style="color: #8332AC; font-weight: 900;">Perfil</span>
					</a>
				</li>

				<li>
					<a href="unfinished.html"><img class="nav_icon" src="images/icons/taskify_icon.png"><br>
					<span class="roboto" style="color: #8332AC; font-weight: 900;">Taskify</span>
					</a>
				</li>

				<li>
					<a href="unfinished.html"><img class="nav_icon" src="images/icons/rank_icon.png"><br>
					<span class="roboto" style="color: #8332AC; font-weight: 900;">Rank</span>
					</a>
				</li>

			</ul>
		</nav>


	</div>
		<div id="user_pannel">
		</div>
	</div>

</div>
@endsection('content')


