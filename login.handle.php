<?php
require_once ('connect.php');
session_start();	
$useraccount=$_POST["username"];
$psd=$_POST["password"];
$sql="select * from user_account where username='$useraccount';";
$result=mysqli_query($con,$sql);
if($result && mysqli_num_rows($result)){
   $data=mysqli_fetch_assoc($result);

    if($psd==$data["password"]){
        $_SESSION["user_object"]=$data;
		if($data["isManager"]){
			echo "<script>alert('Welcome Manager!!!');window.location.href='admin/index.admin.php'</script>";
		}else{
			echo "<script>alert('login successfully');window.location.href='index.php'</script>";
		}
    }
    else{
        echo "<script>alert('password is not correct!!!');window.location.href='login.php'</script>";
    }
}else{
    echo "<script>alert('account do not exist!!!');window.location.href='login.php'</script>";
}

?>