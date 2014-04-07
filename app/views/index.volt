<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{ stylesheet_link("css/bootstrap.min.css") }}
	{{ stylesheet_link("css/style.css") }}
	<title>Phalcon PHP Framework</title>
</head>
<body>
	<div class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header pull-left">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">UM Mode</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav pull-right">
						<li class="active"><a href="#">Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="/user/register">Register</a></li>
								<li><a href="/user/login">Login</a></li>
								<li><a href="/user/logout">Logout</a></li>
								<li class="divider"></li>
								<li class="dropdown-header">Nav header</li>
								<li><a href="#">Separated link</a></li>
								<li><a href="#">One more separated link</a></li>
							</ul>
						</li>
						<li><a href="/">Contact</a></li>
					</ul>
					
				</div><!--/.nav-collapse -->
			</div>
		</div>

	<div class="container">
		{{ content() }}
	</div>

	<div id="footer">
		<div class="container">
			<p class="text-muted">Soare Daniel-Bogdan @2014</p>
		</div>
	</div>

	{{ javascript_include("js/jquery-2.1.0.min.js") }}
	{{ javascript_include("js/bootstrap.min.js") }}
</body>
</html>