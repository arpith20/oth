<? ob_start(); session_start(); ?>
<!DOCTYPE HTML>
<? $level = "9001"?>
<?require('./includes/html1.php');?>
						<header>
							<h1>Please login Again</h1>
						</header>
						
						<hr />

						<p>We detected that you logged in from a different browser.<br/>Please login again to continue playing on this computer</p>
<?require('./includes/html_incorrect.php');?>

						<hr/>
						<footer>
							<ul class="icons">
								<li><a href="index.php" class="fa-history" title="Leaderboard">Login</a></li>
								<a href="index.php"><p>RE-LOGIN</p></a>
							</ul>
						</footer>
						<hr/>
						
<?require('./includes/html2.php');?>

						
<? ob_flush(); ?>