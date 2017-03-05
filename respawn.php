<? ob_start(); ?>
<?php
session_start();
require_once("config.php");

$usn=$_SESSION["USN"];
if(!isset($usn)) {
	redirect('index.php');
}

$data=mysql_query("SELECT session FROM sheet where usn='$usn'") 
	or die(mysql_error());
$info = mysql_fetch_array( $data );

if(strcmp($info[session], session_id())!=0) {
	redirect('relogin.php');
}

echo $usn;

//*******************Load from config file**********************

require_once("config.php");

//**************************************************************

if($usn==NULL)
 	redirect('cheater.php');

$data=mysql_query("SELECT level FROM sheet where usn='$usn'") 
	or die(mysql_error());
$info = mysql_fetch_array( $data );  
$page = $info[level] + 1;

redirect(($page).'.php');
?>
<? ob_flush(); ?>
