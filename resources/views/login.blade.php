<!-- resources/views/login.blade.php -->

<html>  
	<head>  
		<title>ChocoNote</title>
		<link href="/css/style.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>  
	<body>
		<div class="container">  
			<header>
				<h1>ChocoNote</h1>
				<h3>A Superior Notes Management System</h3>
				<p>For certain (inaccurate) definitions of the word "Superior"</p>
			</header>
			<form action="login" method="post" class="form-horizontal">
				<div class="form-group">
					<label for="loginEmail">Email address</label>
					<input type="email" class="form-control" id="loginEmail" name="email" placeholder="Email">
				</div>
				<div class="form-group">
					<label for="loginPassword">Password</label>
					<input type="password" class="form-control" id="loginPassword" name="pass" placeholder="Password">
				</div>
				<button type="submit" class="btn btn-primary">Login</button>
			</form>
		@isset($invalid)
			<label class="alert alert-danger">Invalid Login</label>
		@endisset
		</div>  
	</body>  
</html>  