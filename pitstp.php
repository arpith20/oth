<? ob_start(); session_start();?>

<!DOCTYPE HTML>
<?php
$level=basename(__FILE__, ".php"); //level number (derived from file name) DO NOT MODIFY THIS
require_once("config.php");


//**************************************************************
//You may modify these values
//Directly modify the html (in this file) if you wish to make advanced changes
$question = "You have reached a pit stop.<br/>The event will resume on March 2nd at 12PM";	//question
$correct="This is a spacer level to make people wait";		//the correct answer

//name of image to be displayed (please give a unpredictable random string as the name of the image. This is so that the player does not guess the name of images in other level)
$image="img/pitstop.png";

//End Of You may modify these values
//**************************************************************


require('./includes/check.php');

?>

<?require('./includes/html1.php');?>

<header>
	<h2 style="text-transform: none;"><? echo $question ?></h2>
</header>

<?require('./includes/html_incorrect.php'); //Display that the answer is incorrect?>

<hr/>

<? //Image is placed here ?>

<img src="<?echo $image?>" width = '400dp' />

<hr/>

<p>The first person to reach this point wins an ability to skip <br/>
	a level anytime before the next pit stop.<br/>Winner of this pit stop: Ananth1996</p>

<p style="text-transform: none;">Contact the coordinators by phone when you wish to redeem this ability</p> 

<?require('./includes/bottomlinks.php');?>

<footer id="footer">
	<p><span style="opacity: 0.9;"></span></p>
</footer>

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
