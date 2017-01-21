<?php
require_once ('connect.php');
//$submit_type="manual";
//$username="597371030";
//$phone="13234072292";
$submit_type=$_POST['submit_type'];
$username=$_POST["username"];
$phone=$_POST["phone"];
if($submit_type=="ajax"){
	$sql="select username from user_account where username='$username'";
    $result=mysqli_query($con,$sql);
    if($result&&mysqli_num_rows($result)){
        {$sql2="select phone from user_account where username='$username'";
		 $result2=mysqli_query($con,$sql2);
		 $data=mysqli_fetch_assoc($result2);
		 if($data["phone"]==$phone){
		 	echo 0;//电话与账号匹配
		 }else{
		 	echo  1;//表示账号与手机号不匹配
		 }
		}
    }else{
    	echo 2;
    }
}else if($submit_type=="manual"){
	$psd=$_POST["password"];
$sql3="update user_account set password='$psd' where username='$username';";
echo $sql3;
$result3=mysqli_query($con,$sql3); 
if ($result3){
     echo "<script>alert('modify successfully');window.location.href='login.php';</script>";
}else{
	echo "<script>alert('modify successfully');</script>";
}

}

?>