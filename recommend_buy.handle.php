<?php
	require_once("connect.php");
	//从session中取出user_id
	session_start();
	//取出当前用户的id
	$user_data=$_SESSION["user_object"];
	$user_id=$user_data["id"];
    //获取当前提交时间 
    $recom_time=date('y-m-d h:i:s',time()); 
   $submit_type=$_POST["submit_type"];
   //判断输入前的页面是哪一个，提交类型是哪一种？
   if($submit_type==""){
	//$user_id=2;

	//获取被荐购的图书id
	//$book_id=2;
	$book_id=$_GET["book_id"];
		//避免测试的时候为空，也执行查询（正常工作时，若$user_id为空，则跳转到登录页面）
	if($user_id=="" || $book_id==""){
		?>
		<script>alert('Please login!!!');window.location.href='login.php';</script>

		<?php
		exit();
	} 
	$sql2="select * from book_message where id='$book_id';";
		$result2=mysqli_query($con, $sql2);
		if($result2){
			$recom_book_data=mysqli_fetch_assoc($result2);
			$ISBN=$recom_book_data["ISBN"];
			$bar_code=$recom_book_data["bar_code"];
			$title=$recom_book_data["title"];
		}else{
			echo mysqli_error($con);
		}
   //在推荐表中插入一条推荐记录
	$sql1="insert into recom_message (recom_user_id,recom_book_id,recom_time,title,ISBN,bar_code) 
	         values ('$user_id','$book_id','$recom_time','$title','$ISBN','$bar_code');"; 
	
	$result=mysqli_query($con, $sql1);
	if($result){
		$sql3="SELECT COUNT(*) from recom_message where ISBN='$ISBN';";
		$result3=mysqli_query($con, $sql3);
		if($result3){
			$data=mysqli_fetch_assoc($result3);
			$recom_num=$data["COUNT(*)"];

			?>
			<script>
				alert("recommend successfully!!!");
				window.location.href="recommend_message.show.php?book_id=<?php echo $book_id;?>&&ISBN=<?php echo $ISBN;?>&&bar_code=<?php echo $bar_code;?>&&title=<?php echo $title;?>&&recom_num=<?php echo $recom_num;?>"
			</script>
			<?php
		}else{
			echo mysqli_error($con);
		}	
	}else{
		echo mysqli_error($con);
	}
	
	}else if($submit_type="new_book"){
		$ISBN=$_POST["ISBN"];
		$bar_code=$_POST["bar_code"];
		$title=$_POST["title"];
		$sql1="insert into recom_message (recom_user_id,recom_time,title,ISBN,bar_code) 
	         values ('$user_id','$recom_time','$title','$ISBN','$bar_code');"; 
	    $result=mysqli_query($con, $sql1);
		if($result){
				$sql3="SELECT COUNT(*) from recom_message where ISBN='$ISBN';";
		$result3=mysqli_query($con, $sql3);
		if($result3){
			$data=mysqli_fetch_assoc($result3);
			$recom_num=$data["COUNT(*)"];
			?>
			<script>
				alert("recommend successfully!!!");
				window.location.href="recommend_message.show.php?ISBN=<?php echo $ISBN;?>&&bar_code=<?php echo $bar_code;?>&&title=<?php echo $title;?>&&recom_num=<?php echo $recom_num;?>"
			</script>
			<?php
		}else{
			echo mysqli_error($con);
		}	
			
		}else{
			echo mysqli_error($con);
		}
	}else{
		
	}
	?>