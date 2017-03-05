<? ob_start(); session_start();?>

<!DOCTYPE HTML>
<?php
$level=basename(__FILE__, ".php"); //level number (derived from file name) DO NOT MODIFY THIS
require_once("config.php");


//**************************************************************
//You may modify these values
//Directly modify the html (in this file) if you wish to make advanced changes
$question = "Best friends Doraemon & Nobita got separated in the most densely populated borough of New York City. <br/>With reference to Wall Street, Nobita is located at 2km west and then 18 km south while Doraemon is located at 8km east and then 25km north. <br/>How much Nobita needs to walk to reach Doraemon?";	//question
$correct="53::fifty three";		//the correct answer

//name of image to be displayed (please give a unpredictable random string as the name of the image. This is so that the player does not guess the name of images in other level)
$image="img/map.JPG";

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

<img src="<?echo $image?>" width = '800dp' />

<?require('./includes/html_form.php');?>

<?require('./includes/bottomlinks.php');?>

<footer id="footer">
	<p><span style="opacity: 0.1;">                   SO MUCH SPACE!!                                   </span></p>
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
