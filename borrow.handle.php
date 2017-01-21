<?php
    session_start();
	require_once ("connect.php");
	//$book_id=3;
	//$user_id=1;
	$borrow_time=date('y-m-d h:i:s',time());
	$return_time=date('y-m-d h:i:s',time()+2592000);
    $book_id=$_GET["id"];
	$user_id=$_SESSION["user_object"]["id"];
	//避免测试的时候为空，也执行查询（正常工作时，若$user_id为空，则跳转到登录页面）
	if($user_id=="" || $book_id==""){
		?>
		<script>alert('Please login!!!');window.location.href='login.php';</script>

		<?php
		exit();
	} 
	//判断用户是否还有借书额度 
	$sql1="select * from user_account where id='$user_id';";
	$result1=mysqli_query($con,$sql1);
	if($result1 && mysqli_num_rows($result1)){
		$data1=mysqli_fetch_assoc($result1);
		$borrowed_number=$data1["borrowed_number"];
 
        if($borrowed_number>=4){
        	?>
        	<script>alert('you have borrowed too many books!!!');window.location.href='book_detail.show.php?id=<?php echo $book_id;?>';</script>
        	<?php
        	exit();
        } else{
        	
        }
	}else{
		echo mysqli_error($con);  
	}
    //判断剩余书的数量是否足够，若足够数目减一，借阅成功。若无，则失败。
	$sql2="select * from book_message where id='$book_id';";
	$result2=mysqli_query($con,$sql2);
	if($result2 && mysqli_num_rows($result2)){
		$data=mysqli_fetch_assoc($result2);
		$remain_number=$data["remain_number"];
		if($remain_number>0){
			$remain_number-=1;
            $result2=mysqli_query($con,"update book_message set remain_number='$remain_number' where id='$book_id';");
			$borrowed_number+=1;
			$result1=mysqli_query($con,"update user_account set borrowed_number='$borrowed_number' where id='$user_id';");
			if($result1){
				echo "借阅成功，正在跳转请稍后.....";
			}
		    ?>
		    <script>alert('borrow successfully');window.location.href='borrow_message.show.php?book_id=<?php echo $book_id;?>';</script>
		    <?php
		}else{
			exit();
			?><script>alert('no more remain');window.location.href='book_detail.show.php?id=<?php echo $book_id;?>';</script>
			<?php
			
		}
		  
	}else{
		echo mysqli_error($con);
	}
	//在借书记录表中插入一个记录
    $sql="insert into borrow_message(borrower_id,borrow_book_id,borrow_time,return_time) 
            values('$user_id','$book_id','$borrow_time','$return_time');";
	$result=mysqli_query($con,$sql);
	if($result){
		echo "<script>alert('borrow successfully');</script>";
	}else{
		echo mysqli_error($con);
	}
?>