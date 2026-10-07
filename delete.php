<?php
include "db.php";
session_start();
$userp=$_SESSION["user_name"];
if($userp==true){

}
else{
    header('Location:login1.php');
}
if(isset($_GET['deleteid'])){
	$id=$_GET['deleteid'];
	$sql="delete from `users` where id=$id";
	$result=mysqli_query($conn,$sql);
	if($result){
		//echo "data is deleted";
		header('Location:display.php');
	}else{
		die(mysqli_query($conn));
	}
}

?>