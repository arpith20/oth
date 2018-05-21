<?php
$usn=$_SESSION["USN"];
if(!isset($usn)) {
	redirect('index.php');
}
$ans=strtolower(clean($_POST['answer']));
$incorrect = 0;

$data=mysqli_query($con,"SELECT level,session FROM sheet where usn='$usn'") 
	or die(mysqli_error());
$info = mysqli_fetch_array( $data );

if(strcmp($info[session], session_id())!=0) {
	redirect('relogin.php');
}

if(($info[level])<($level-1) || $usn == NULL)
{
	echo "User is trying to skip levels!";
	//allows the admin to know whether the team has tried cheated or not
	$sql_cheat="update sheet set cheat=1 where usn='$usn'";
	if (!mysqli_query($con,$sql_cheat))
  	{
		die('Error: ' . mysqli_error());
  	}
	redirect('cheater.php');
}
else if(($info[level])>($level-1))
{
	echo "User is trying to go back!";
	redirect('goback.php'); 
}

//go to the next page if the answer is correct******************
$correct_pieces = explode("::", $correct);
foreach ($correct_pieces as $value) {
	if((strcmp($ans,clean($value))==0)) 
	{
		echo "correct";
		$time=date("Y-m-d H:i:s");
		$sql="update sheet set level='$level', time='$time' where usn='$usn'";
		if (!mysqli_query($con,$sql))
	  	{
			die('Error: ' . mysqli_error());
	  	}
		redirect(($level+1).'.php');
	}
}

$incorrect = 1;

if($ans == NULL) {
	$incorrect = 0;
}
?>
