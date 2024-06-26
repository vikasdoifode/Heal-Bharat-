<?php
$sn="localhost";
$un="root";
$pw="";
$db="registrationdata";
$conn=mysqli_connect($sn,$un,$pw,$db);
$flag=0;
if(!$conn){
	die("connecting error:");

}
if(isset($_POST['btn'])){
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];


$pattern='/^[a-z A-Z 0-9.%_+-]+@[a-z A-Z 0-9.-]+\.[a-z A-Z]{2,}$/';
if(!preg_match($pattern,$email)){
	$flag=1;
}

if(empty($username)||empty($email)||empty($password)){

	$flag=2;
}



$sql="INSERT INTO `users`( `username`, `email`, `password`) VALUES ('$username','$email','$password')";

if($flag==0){
	mysqli_query($conn,$sql);
	echo "<script>alert('Registration Complete');</script>";
	echo"<script>window.location.href='https://localhost/HealBharat/registration/registration.html';</script>";
	
}
elseif($flag==1){
	echo "<script>alert('invalid email')</script>";
	echo"<script>window.location.href='https://localhost/HealBharat/registration/registration.html';</script>";
}
else{
	echo "<script>alert('field cannot be empty')</script>";
	echo"<script>window.location.href='https://localhost/HealBharat/registration/registration.html';</script>";

}
}
?>