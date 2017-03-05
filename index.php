<!--	Author: Arpith K
				arpith.xyz
		Source: https://github.com/arpith20/oth
-->

<?php
session_start();
require_once("config.php");


$usn=clean_nospace($_POST['usn']);		//unique serial 
$password=$_POST['password'];			//email
$valid_pass = 0;

if($usn!=NULL && $password != null)
{
	$data=mysql_query("SELECT password FROM sheet where usn='$usn'") 
			or die(mysql_error());
	$info = mysql_fetch_array( $data );
	if(password_verify($password, $info[password])){
		$valid_pass = 1;
	}
	if ($valid_pass == 1)
	{
		session_start();
		$_SESSION["USN"] = $usn;
		$sql="update sheet set session='".session_id()."' where usn='$usn'";
		if (!mysql_query($sql,$con))
	  	{
			die('Error: ' . mysql_error());
	  	}
		redirect('respawn.php');
	}
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>QUEST FOR D NEXT</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/login.css" />
		<link rel="shortcut icon" type="image/png" href="favicon.ico"/>
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<script src='https://www.google.com/recaptcha/api.js'></script>
	</head>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main">
						<header>
							<img src="images/csa.png" alt="" height="81"/>
							<hr/>
							<h1>QUEST FOR D NEXT</h1>
							<h2>Online Treasure Hunt</h2>
							<p class="small">Ahoy, Mateys!<br/>
							Welcome to the Online Treasure Hunt.<br/>
							Play Sherlock Holmes on the expanse of the Internet!<br/>
							Crawl the web to find secret troves of knowledge and unlock the next clue!</p>
						</header>
						<hr />
						</footer>
						<?
							if($valid_pass == 0 && $password != null) {
									echo "<p style=\"color:red;\">The username or password is incorrect";
									echo "<hr />";
							}
						?>
						<p class="small">LOGIN</p>
						<form method="post" action="index.php">
							<div class="field">
								<input type="text" name="usn" placeholder="Username" maxlength="15"/>
							</div>
							<div class="field">
								<input type="password" name="password" placeholder="Password" maxlength="40"/>
							</div>
							<input type="submit" value="Log in"> 
						</form>
						<hr />
						<footer>
							<ul class="icons">
								<li><a href="register.php" class="fa-sign-in" title="Register">Register</a></li>
								<a href="register.php"><p>To Create an account, register.</p></a>
							</ul>
						</footer>
						<hr />
						<footer>
							<ul class="icons">
								<li><a href="leaderboard.php" class="fa-child" title="Leaderboard" target="_blank">Leaderboard</a></li>
								<li><a href="rules.php" class="fa-asterisk" title="Rules" target="_blank">Rules</a></li>
								<li><a href="https://www.facebook.com" class="fa-facebook" title="Hints" target="_blank">Hints</a></li>
							</ul>
						</footer>
					</section>
					<footer id="footer">
						<p><span style="opacity: 0.5;">Adapted from a template by HTML5Up</span></p>
					</footer>
			</div>

			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>

	</body>

</html>
