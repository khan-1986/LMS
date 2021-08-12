<?php
include('admin/dbcon.php');
session_start();
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$department_id = $_POST['department_id'];
$cpass=$_POST['cpassword'];
$password=$_POST['password'];
$username=$_POST['username'];
$q="INSERT INTO teacher(firstname,lastname,department_id,username,password,cpassword)
 VALUES ('$firstname','$lastname','$department_id','$username','$password','$cpass')";
if ($conn->query($q))
{
	
}

$query = mysqli_query($conn,"select * from teacher where  firstname='$firstname' and lastname='$lastname' and department_id = '$department_id'")or die(mysqli_error());
$row = mysqli_fetch_array($query);
$id = $row['teacher_id'];

$count = mysqli_num_rows($query);
if ($count > 0){
	mysqli_query($conn,"update teacher set username='$username',password = '$password', teacher_status = 'Registered' where teacher_id = '$id'")or die(mysqli_error());
	$_SESSION['id']=$id;
	echo 'true';
}else{
	echo 'false';
}
?>