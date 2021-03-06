<?php
$con = mysqli_connect('localhost','othproduction', 'oth123');
//if connection fails
if (!$con) 
{
	echo "cannot connect to database";
} 
else 
{
	//select database
	$db = mysqli_select_db($con, 'othproduction') or die("problem selecting database '$MYSQL[DATABASENAME]'");
}

function clean($string) {
   	$string = preg_replace('/[^A-Za-z0-9\-+ \\\\]/', '', $string); // Removes special chars.

   	return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

function clean_nospace($string) {
	$string = str_replace(' ', '_', $string); // Replaces all spaces with underscore.
   	$string = preg_replace('/[^A-Za-z0-9\-_]/', '', $string); // Removes special chars.

   	return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

function redirect($page) {
    header('Location: ' . $page);
    exit;
}
?>
