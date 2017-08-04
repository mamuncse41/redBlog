<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Colored  an Admin Panel Category Flat Bootstrap Responsive Website Template | Login :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('adminAssets/css/bootstrap.css')}}">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('adminAssets/css/style.css')}}" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('adminAssets/css/font.css')}}" type="text/css"/>
<link href="{{asset('adminAssets/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
</head>
<body class="signup-body">
		<div class="agile-signup">	
			
			<div class="content2">
                            <h3 style="color:red">
                                <?php
                                $exception=Session::get('exception');
                                if($exception){
                                    echo $exception;
                                    Session::put('exception','');
                                }
                                ?>
                            </h3>
                            <h2 style="color:green">
                                <?php
                                $message=Session::get('message');
                                if($message){
                                    echo $message;
                                    Session::put('message','');
                                }
                                ?>
                            </h2>
				<div class="grids-heading gallery-heading signup-heading">
					<h2>Login</h2>
				</div>
                            {!! Form::open(['url'=>'/admin/login','method'=>'post']) !!}
                            <span class="text-danger">{{$errors->has('admin_email')? $errors->first('admin_email'):''}}</span>
                            <input type="email" name="admin_email" value="E-mail">
                            <span class="text-danger">{{$errors->has('admin_password')? $errors->first('admin_password'):''}}</span>
                            <input type="password" name="admin_password" value="Password">
                            <input type="submit" class="register" value="Login">
                            {!! Form::close() !!}
				<div class="signin-text">
					<div class="text-left">
						<p><a href="#"> Forgot Password? </a></p>
					</div>
					<div class="text-right">
						<p><a href="{{url('/signup')}}"> Create New Account</a></p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<h5>- OR -</h5>
				<div class="footer-icons">
					<ul>
						<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="twitter facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="twitter chrome"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#" class="twitter dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<a href="{{url('/')}}">Back To Home</a>
			</div>
			
			<!-- footer -->
			<div class="copyright">
				<p>© 2016 Colored . All Rights Reserved . Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
			<!-- //footer -->
			
		</div>
	
</body>
</html>


