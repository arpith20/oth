<? ob_start(); session_start();?>
<!DOCTYPE HTML>
<? $level = "Under 9000"?>
<?require('./includes/html1.php');?>
<header>
	<h1>CHEATER!</h1>
</header>
						
<hr />

<p>You need to attain a speed of 88mph before you can travel back in time<br/>
Hit the <a href="respawn.php">RESPAWN</a> button if you don't own a DeLorean time machine</p>
<footer>
	<ul class="icons">
		<li><a href="respawn.php" class="fa-history" title="Respawn">RESPAWN</a></li>
			<a href="respawn.php"><p>RE-SPAWN</p></a>
	</ul>
</footer>
<?require('./includes/html_incorrect.php');?>
<hr />
<img src="images/delorean.png" width="80%"/>

<?require('./includes/html2.php');?>
						
<? ob_flush(); ?>