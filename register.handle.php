<?php
require_once ('connect.php');
$submit_type=$_POST['submit_type'];
$username=$_POST["username"];
if($submit_type=="ajax"){
	$sql="select username from user_account where username='$username'";
    $result=mysqli_query($con,$sql);
    if($result&&mysqli_num_rows($result)){
        echo 1;
    }else{
    	echo 2;
    }
}else if($submit_type=="manual"){
	$psd=$_POST['password'];
$phone=$_POST['phone'];
$remark=$_POST['remark'];
$register_time=time();
$sql="insert into user_account(username,password,phone,school_ID,register_time,remark) 
       values ('$username','$psd','$phone','','$register_time','$remark')";
echo $sql;
$result=mysqli_query($con,$sql);
if($result){
   echo "<script>alert('register successfully!!');window.location.href='login.php';</script>";
}else{
    echo "<script>alert('server busying!!');window.location.href='register.php';</script>";
}
}




?>