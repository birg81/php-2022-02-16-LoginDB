<!-- file: ./register.php -->
<?php
session_start();
if(isset($_SESSION['user'])) {
	header('location: ./welcome.php');
	die;
}
?>
<html>
<head>
<title>Register</title>
<link rel="icon" type="image/png" href="https://emojipedia-us.s3.dualstack.us-west-1.amazonaws.com/thumbs/60/facebook/304/slot-machine_1f3b0.png" />
</head>
<body>
<?= (isset($_REQUEST['msg'])) ?  trim($_REQUEST['msg']) : '' ?>
<form method="get" action="signup.php">
<input
	type="text"
	name="firstname"
	required
	placeholder="(nome)"/>
<br/>
<input
	type="text"
	name="lastname"
	required
	placeholder="(cognome)"/>
<br/>
<select name="gender" required>
	<option/>
	<option value="m"><b>M</b>ale &#x2642;</option>
	<option value="f"><b>F</b>emale &#x2640;</option>
</select>
<br/>
<input
	type="email"
	name="username"
	required
	placeholder="(username)"/>
<br/>
<input
	type="password"
	name="password"
	required
	placeholder="(password)"/><br/>
<input
	type="password"
	name="password2"
	required
	placeholder="(rewrite password)"/><br/>
<input type="submit" value="sign up"/>
<a href="./login.php">sign in</a>
</form>
</body>
</html>