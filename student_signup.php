<?php
include('admin/dbcon.php');
session_start();
$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$class_id = $_POST['class_id'];
$password = $_POST['password'];
$cpass=$_POST['cpassword'];
$q="INSERT INTO student(username,firstname,lastname,class_id,password,cpassword)
 VALUES ('$username','$firstname','$lastname','$class_id','$password','$cpass')";
if ($conn->query($q))
{
	
}
$query = mysqli_query($conn,"select * from student where username='$username' and firstname='$firstname' and lastname='$lastname' and class_id = '$class_id'")or die(mysqli_error());
$row = mysqli_fetch_array($query);
$id = $row['student_id'];

$count = mysqli_num_rows($query);
if ($count > 0){
	mysqli_query($conn,"update student set password = '$password', status = 'Registered' where student_id = '$id'")or die(mysqli_error());
	$_SESSION['id']=$id;
	echo 'true';
}else{
echo 'false';
}
?>