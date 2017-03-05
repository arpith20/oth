<? ob_start(); session_start(); unset($_SESSION['USN']); session_destroy();?>
<!DOCTYPE HTML>
<? $level = "9001"?>
<?require('./includes/html1.php');?>
<header>
	<h1>You have been logged out</h1>
</header>



<?require('./includes/html_incorrect.php');?>

<hr/>
<footer>
	<ul class="icons">
		<li><a href="index.php" class="fa-history" title="Leaderboard">Login</a></li>
		<a href="index.php"><p>RE-LOGIN</p></a>
	</ul>
</footer>
<hr/>

<footer>
	<ul class="icons">
		<li><a href="leaderboard.php" class="fa-child" title="Leaderboard" target="_blank">Leaderboard</a></li>
		<li><a href="rules.php" class="fa-asterisk" title="Rules" target="_blank">Rules</a></li>
		<li><a href="https://www.facebook.com/" class="fa-question" title="Hints" target="_blank">Hints</a></li>
		</ul>
</footer>


</section>
<footer id="footer">

</footer>
</div>

<!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
<script>
	if ('addEventListener' in window) {
		window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
		document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
	}
</script>

</body>
</html>


<? ob_flush(); ?>