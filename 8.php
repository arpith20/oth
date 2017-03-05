<? ob_start(); session_start();?>

<!DOCTYPE HTML>
<?php
$level=basename(__FILE__, ".php"); //level number (derived from file name) DO NOT MODIFY THIS
require_once("config.php");


//**************************************************************
//You may modify these values
//Directly modify the html (in this file) if you wish to make advanced changes
$question = "What's the answer? It's there!!";	//question
$correct="house of the undead::houseoftheundead";		//the correct answer

//name of image to be displayed (please give a unpredictable random string as the name of the image. This is so that the player does not guess the name of images in other level)
$image="";		

//End Of You may modify these values
//**************************************************************


require('./includes/check.php');

?>

<header>
	<h2 class = "itsthere" style="text-transform: none; text-align: center; color: blue; vertical-align: text-top"><? echo $question ?></h2>
</header>

<?require('./includes/html_incorrect.php'); //Display that the answer is incorrect?>



<style>
body {
    background-color: white;
}
#textField {
	color : white;
	background-color: white;
	position: fixed;
	top: 30%;
	left: 30%;
}
.itsthere {
	position: fixed;
  	top: 40%;
  	left: 50%;
  	/* bring your own prefixes */
  	transform: translate(-50%, -50%);
}
.itsthereform {
	position: fixed;
  	top: 50%;
  	left: 43%;
}
</style>

<div id="textField" style="font-size: 48px;">
</div>
<form class = "itsthereform" action="<?echo $level.'.php'?>" method="post">
		<input type="text" name="answer" placeholder="Answer" maxlength="40"/>
</form>


<script>
document.getElementById("textField").innerHTML="H&nbsp;o&nbsp;u&nbsp;s&nbsp;e&nbsp; &nbsp;o&nbsp;f&nbsp; &nbsp;t&nbsp;h&nbsp;e&nbsp; &nbsp;U&nbsp;n&nbsp;d&nbsp;e&nbsp;a&nbsp;d";
</script>

</div>

<!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
<script>
	if ('addEventListener' in window) {
		window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
		document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
	}
</script>
<?require('./includes/track.php');?>

</body>
</html>

<? ob_flush(); ?>
