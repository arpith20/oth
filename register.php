<?php
require_once("config.php");


require_once("includes/recaptchalib.php");
// your secret key
$secret = "6Lf0LBYUAAAAAHjLdDfOAZP5rTYxayjAFw3tnHMh";
// empty response
$response = null;
// check secret key
$reCaptcha = new ReCaptcha($secret);
// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

//A flag to mark a username as taken
$taken=0;

//Current level of the player
$level=0;

$success=0; //the user has successfully registered.

$username_correct=0;

$name=clean($_POST['name']);	//name
$id=clean($_POST['id']);	//name
$usn=$_POST['usn'];		//unique serial 
$email=$_POST['email'];
$password=$_POST['password'];			//email
$college=clean($_POST['college']);
$phone=clean($_POST['phone']);
$captcha=$_POST['g-recaptcha-response'];

//validate the mail and set valid_mail=1 if it's okay
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $valid_mail = 1;
} else {
  $valid_mail = 0;
}

//validate username
if (preg_match('/^[a-z\d_]{1,20}$/i', $usn)) {
	$username_correct=1;
} else {
	$username_correct=0;
}

//start the game once required conditions are met
if($name!=NULL && $usn!=NULL && $username_correct == 1 && $valid_mail == 1 && $password!=NULL && $response != null && $response->success && $college!=NULL && $phone!=NULL && $id!=NULL)
{
	$level=0;
	//TODO: Hash password
	$password = password_hash($password, PASSWORD_DEFAULT);
	$sql="INSERT INTO sheet (usn,name,level,email,password,college,phone,id) VALUES('$usn','$name','$level','$email','$password','$college','$phone','$id')";
	if (!mysqli_query($con,$sql))
	{
		$taken = 1;
		mysqli_close($con);
	}else{
		//setcookie("USN", $usn, time()+60*60*24*30);
		//setcookie("NAME", $name, time()+60*60*24*30);
		mysqli_close($con);
		$success=1;
		//redirect('index.php');
	}
} else {
	$success=0;
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Quest for d Next</title>
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
								<?
							if($taken == 1) {
								echo "<p style=\"color:red;\">This username has been taken";
								echo "<hr />";
							}
							if($username_correct == 0 && $usn != NULL) {
								echo "<p style=\"color:red;\">The username has to be alphanumeric</p>";
								echo "<hr />";
							}
							if($valid_mail == 0 && $email != NULL) {
								echo "<p style=\"color:red;\">Email address is invalid</p>";
								echo "<hr />";
							}
							if($response == null && $usn != null) {
								echo "<p style=\"color:red;\">Robots are not invited to this party!! PLease solve the reCAPTCHA.</p>";
								echo "<hr />";
							}
							if($response != null && !$response->success) {
								echo "<p style=\"color:red;\">Robots are not invited to this party!! Correctly solve the reCAPTCHA.</p>";
								echo "<hr />";
							}
						?>
						<?
						if($success==1) {
							?>
							<h2>You have registered successfully<br/></h2>
							<p>USERNAME: <? echo $usn; ?><br/>
							NAME: <? echo $name; ?><br/>
							COLLEGE/ORG: <? echo $college; ?><br/>
							EMAIL: <? echo $email; ?><br/>
							PHONE: <? echo $phone; ?><br/>
							ID: <? echo $id; ?></p>
							
							<footer>
							<ul class="icons">
							<li><a href="index.php" class="fa-sign-in" title="Login">Login</a></li>
							<a href="index.php"><p>Login.</p></a>
							</ul>
						</footer>
							<hr/>
							<?
						}
						?>
						<h2>REGISTER</h2>
						<p style="font-size: small;">All Fields are Compulsory</p>
						<form method="post" action="register.php">
							<div class="field">
								<input type="text" name="usn" placeholder="Username" maxlength="15" value='<? echo $usn; ?>'/>
							</div>
							<div class="field">
								<input type="password" name="password" placeholder="Password" maxlength="40"/>
							</div>
							<div class="field">
								<input type="text" name="name" placeholder="Your Name" maxlength="25" value="<? echo $name; ?>"/>
							</div>
							<div class="field">
								<input type="text" name="college" placeholder="College" maxlength="50" value="<? echo $college; ?>"/>
							</div>
							<div class="field">
								<input type="email" name="email" placeholder="Email" maxlength="50" value="<? echo $email; ?>"/>
							</div>
							<div class="field">
								<input type="text" name="phone" placeholder="Phone Number" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<? echo $phone; ?>"/>
							</div>
							<div class="field">
								<input type="text" name="id" placeholder="Roll number as mentioned on your ID card" maxlength="40" value="<? echo $id; ?>"/>
								<p style="font-size: small;text-align:left;">This will be used to identify the winner</p>
							</div>
							<center>
							<div class="g-recaptcha" data-sitekey="6Lf0LBYUAAAAAF_i1r-Q6zg9CP6WkaXzwS1xqSlP"></div></center>
							<br/>
							<input type="submit" value="Register"> 
						</form>
						<hr />
						<footer>
							<ul class="icons">
							<li><a href="index.php" class="fa-sign-in" title="Login">Login</a></li>
							<a href="index.php"><p>Already Registered? Login.</p></a>
							</ul>
							<hr/>
						</footer>
						<footer>
							<ul class="icons">
								<li><a href="leaderboard.php" class="fa-child" title="Leaderboard" target="_blank">Leaderboard</a></li>
								<li><a href="rules.php" class="fa-asterisk" title="Rules" target="_blank">Rules</a></li>
								<li><a href="https://www.facebook.com/QuestForDNext" class="fa-facebook" title="Hints" target="_blank">Hints</a></li>
							</ul>
						</footer>
					</section>
					<footer id="footer">
						<p><span style="opacity: 0.1;">If you ever feel useless, just remember that this is a text that no one can see.</span></p>
					</footer>
			</div>

		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
			<script>
				if ('addEventListener' in window) {
					window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
					document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
				}
			</script>
			<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			  ga('create', 'UA-92167498-1', 'auto');
			  ga('send', 'pageview');

			</script>

	</body>
</html>