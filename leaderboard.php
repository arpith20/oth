<!DOCTYPE HTML>
<html>
	<head>
		<title>Leaderboard</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/leaderboard.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-loading">

			<div id="wrapper">

					<section id="main">
						<header>
							<h1>Leaderboard</h1>
						</header>
						
						<hr />
						<p>Refresh the page to update<br>The game has ended! You can keep playing for fun!</p>
						<?php
							$sno=1;

							require_once("config.php");


							$query="select * from sheet order by level desc,time asc";
							if (!($result=mysqli_query($con,$query)))
							{
								die('Error: ' . mysqli_error());  	
							}
							echo "<br/><br/>";
							echo "<table border='1'>
							<tr>
							<th> Rank </th>
							<th> Username </th>
							<th> Name </th>
							<th> Levels completed </th>
							<th> Time </th>
							</tr>";
							while($row = mysqli_fetch_array($result))
							{
								//for admin user to test the scripts
								if(strcmp($row['usn'],"admin")==0)
									continue;

								echo "<tr>";
								echo "<td>" . $sno++ . "</td>";
								echo "<td>" . $row['usn'] . "</td>";
								echo "<td>" . $row['name'] . "</td>";
								if($row['level'] == 9000)
									echo "<td> Over " . $row['level'] . "</td>";
								else
									echo "<td>" . $row['level'] . "</td>";
								echo "<td>" . $row['time'] . "</td>";
								echo "</tr>";
							}

							echo "</table>"; 
							mysqli_close($con);
						?>

						
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

	</body>
</html>