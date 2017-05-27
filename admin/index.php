<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Form</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Login to Book Store Administration</h1>
	<? if(isset($_GET['login']) and $_GET['login']=="failed"): ?>
	<div class="error">Login failed! User name or password incorrect.</div>
	<?endif;?>
	<form action="login.php" method="post">
		<label for="name">Name</label>
		<input type="text" name="name" id="name">

		<label for="password">Password</label>
		<input type="password" name="password" id="password">

		<input type="submit" name="login" value="Login">
	</form>
</body>
</html>