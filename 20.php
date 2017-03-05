<? ob_start(); session_start();?>

<!DOCTYPE HTML>
<?php
$level=basename(__FILE__, ".php"); //level number (derived from file name) DO NOT MODIFY THIS
require_once("config.php");


//**************************************************************
//You may modify these values
//Directly modify the html (in this file) if you wish to make advanced changes
$question = "(85, 292) &nbsp;&nbsp;&nbsp;(375, 318)";	//question
$correct="515745525459::51 57 45 52 54 59::71 77 65 72 74 79::717765727479";		//the correct answer

//name of image to be displayed (please give a unpredictable random string as the name of the image. This is so that the player does not guess the name of images in other level)
$image1="img/picture.jpeg";
$image2="img/cluelvl20.jpeg";

//End Of You may modify these values
//**************************************************************


require('./includes/check.php');

?>

<?require('./includes/html1.php');?>

<header>
	<h2 style="text-transform: none;"><? echo $question ?></h2>
</header>

<?require('./includes/html_incorrect.php'); //Display that the answer is incorrect?>

<? //Image is placed here ?>

<img src="<?echo $image1?>" />

<!--The 0x in the answer is implicit-->
<?require('./includes/html_form.php');?>

<p>Edit: another clue (useful information will be in orange region)</p>
<img src="<?echo $image2?>" />


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
