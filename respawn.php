<? ob_start(); ?>
<?php
echo 'Welcome, ';
$name=$_COOKIE["NAME"];
echo $name;
$usn=$_COOKIE["USN"];

//*******************Load from config file**********************

require_once("config.php");

//**************************************************************


$data=mysql_query("SELECT level FROM sheet where usn='$usn'") 
	or die(mysql_error());
$info = mysql_fetch_array( $data );  

switch($info[level])
{
case 0:	$page="start";	break;
case 1:	$page="nfc";	break;
case 2:	$page="despicable";	break;
case 3:	$page="maglev";	break;
case 4:	$page="salsa";	break;
case 5:	$page="windows";	break;
case 6:	$page="lays";	break;
case 7:	$page="bmtc";	break;
case 8:	$page="ipl";	break;
case 9:	$page="sola";	break;
case 10:	$page="inferno";	break;
case 11:	$page="flipkart";	break;
case 12:	$page="amul";	break;
case 13:	$page="ali";	break;
case 14:	$page="salt_lake_stadium";	break;
case 15:	$page="walmart";	break;
case 16:	$page="404";	break;
default:	$page="cheater";	break;
}
if($name!=NULL)
	header('Location:'.($page).'.php');
else
	header('Location:cheater.php');	

?>
<? ob_flush(); ?>
