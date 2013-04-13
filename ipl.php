<? ob_start(); ?>
<?php
//**************************************************************
//You may modify these values

$level=9;		//level number
$correct="sola";		//correct answer of this level
$image="img/9.jpg";		//name of image to be displayed
$file="ipl.php";	//Name of the current file

//**************************************************************

echo 'Welcome, ';
$name=$_COOKIE["NAME"];
echo $name;
$usn=$_COOKIE["USN"];
$ans=$_POST['answer'];

//*******************Load from config file**********************
/*
$con = mysql_connect('localhost','root','root');
if (!$con)
{
	die('Could not connect to database : ' . mysql_error());
}
mysql_select_db("arp_oth", $con);*/
require_once("config.php");

//**************************************************************


//See if the user is trying to skip levels by guessing the most probable answers
$data=mysql_query("SELECT level FROM sheet where usn='$usn'") 
	or die(mysql_error());
$info = mysql_fetch_array( $data );  
//echo $info[level];
//echo $level-1;
if(($info[level])<($level-1))
{
	echo "User is trying to skip levels!";
	//allows the admin to know whether the team has tried cheated or not
	$sql_cheat="update sheet set cheat=1 where usn='$usn'";
	if (!mysql_query($sql_cheat,$con))
  	{
		die('Error: ' . mysql_error());
  	}
	header('Location:cheater.php'); 
}

//go to the next page if the answer is correct******************
if((strpos($ans,$correct)!==false)) 
{
	echo "correct";
	$sql="update sheet set level='$level' where usn='$usn'";
	if (!mysql_query($sql,$con))
  	{
		die('Error: ' . mysql_error());
  	}
	header('Location:'.($correct).'.php');	
		//The file name of the next level is the correct answer of this(current) level
			/*In this case the name of the next file should be nfc.php since
			  the corrcet answer of this level is "nfc"*/
}

?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>LEVEL <?echo $level?></title>
</head>

<link rel="stylesheet" href="css/pirate.css" type="text/css" media="screen" title="no title" charset="utf-8" />

<font size="6" style="arial" color="#1E90FF">
<br/><br/>
<form action="<?echo $file?>" method="post">
<center>
CONNECT<br/>
<img src="<?echo $image?>" height="604" width="600"/>
<br/>
ANSWER : <input type="text" name="answer">
<!--name the device which implements this technology-->
</center>
</form>

</body>
</html>
<? ob_flush(); ?>
