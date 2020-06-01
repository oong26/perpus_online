<!DOCTYPE html>
<html>
<head>
	<title>Perpus - Log In</title>
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/login-style.css')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="{{asset('assets/images/login/wave.png')}}">
	<div class="container">
		<div class="img">
			<img src="{{asset('assets/images/login/bg.svg')}}">
		</div>
		<div class="login-content">
			<form action="login" method="POST">
				{{csrf_field()}}
				<img src="{{asset('assets/images/login/avatar.svg')}}">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username, email or phone</h5>
           		   		<input type="text" class="input" name="username">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
</body>
<script type="text/javascript" src="{{asset('assets/js/login-main.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/fontawesome.js')}}"></script>
{{-- <script src="https://kit.fontawesome.com/a81368914c.js"></script> --}}
</html>
