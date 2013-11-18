<? ob_start(); ?>
<?php
$level=0;
$name=$_POST['name'];
$usn=$_POST['usn'];
if($name!=NULL && $usn!=NULL)
{
	/*$con = mysql_connect('localhost','root','root');
	if (!$con)
  	{
  		die('Could not connect to database : ' . mysql_error());
  	}
	mysql_select_db("arp_oth", $con);*/
	require_once("config.php");
	$level=0;
	setcookie("USN", $usn, time()+60*60*24*30);
	setcookie("NAME", $name, time()+60*60*24*30);
	$sql="INSERT INTO sheet (usn,name,level) VALUES('$usn','$name','$level')";
	if (!mysql_query($sql,$con))
	{
		die('Error: ' . mysql_error());
	}
	mysql_close($con);
	header('location:start.php');
}
?>




<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> OTH! </title>
</head>

<link rel="stylesheet" href="css/pirate.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<center>
<font size="6" style="arial" color="#ffffff">
<br/><br/>
Ahoy, Mateys!<br/>
Welcome To The Online Treasure Hunt
Crawl the web to find secret troves of knowledge, and unlock the next clue!
Play Sherlock Holmes on the expanse of the Internet.<br/>
Hosted By PESSE ACM Student Chapter<br/><br/> 
</center>
<font size="5" style="arial" color="#1E90FF">
<b>Links :</b> <br/>
<a href="rank.php">CLICK HERE</a> to view Real Time Scores.Open the score page on your browser to keep a track of the scores.<br/>
<a href="rules.php">CLICK HERE</a> to view the Rules .<br/>
<a href="respawn.php">Respawn</a> if you have already registered. You'll be redirected to the last played level<br/>
Need any more help? Ask the volunteers around you!!
<center>
<font size="10" style="arial" color="#1E90FF">

<form METHOD="post" ACTION="index.php">

<table>
<tr> <td> <font size="10" style="arial" color="#1E90FF"> USN : </font> </td> <td> <input type="text" name='usn'></input> </td> </tr> <br/>
<tr> <td> <font size="10" style="arial" color="#1E90FF"> Name : </font> </td> <td> <input type="text" name='name'></input> </td> </tr> <br/>
</table>

<input TYPE="submit" VALUE="START">

</form>

</center>
</font>
</body>
</html>
<? ob_flush(); ?>
