<? ob_start(); session_start();?>

<!DOCTYPE HTML>
<?php
$level=basename(__FILE__, ".php"); //level number (derived from file name) DO NOT MODIFY THIS
require_once("config.php");


//**************************************************************
//You may modify these values
//Directly modify the html (in this file) if you wish to make advanced changes
$question = "Find [<b>(B + C) - (A + D + E + F + G + H)</b>] and use Chemistry. <br/>
<b>A</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;18&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>C</b><br/>
88&nbsp;&nbsp;&nbsp;&nbsp;<b>D</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>F</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;25<br/>
10&nbsp;&nbsp;&nbsp;&nbsp;<b>G</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>B</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16<br/>
<b>E</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;86&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;23&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>H</b>";	//question
$correct="tungsten";		//the correct answer

//name of image to be displayed (please give a unpredictable random string as the name of the image. This is so that the player does not guess the name of images in other level)
$image="img/1729.jpg";		

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

<img src="<?echo $image?>" width = '400dp'/>

<?require('./includes/html_form.php');?>

<?require('./includes/bottomlinks.php');?>

<footer id="footer">
	<p><span style="opacity: 0.1;"></span></p>
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
