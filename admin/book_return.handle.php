<?php 
 require_once("connect.php");
 $ISBN=$_POST["ISBN"];
 $user_id=$_POST["user_id"];
 	//避免测试的时候为空，也执行查询（正常工作时，若$user_id为空，则跳转到登录页面）
	if($user_id=="" || $ISBN==""){
		?>
		<script>alert('STH WRONG  3!!!');window.location.href='index.admin.php';</script>

		<?php
		exit();
	} 
 $sql="select * from book_message where ISBN='$ISBN'";
  $book_data = mysqli_fetch_assoc(mysqli_query($con, $sql));	
  $book_id=$book_data["id"];
  //删除借书表中的借书记录
  $sql2="delete from borrow_message where borrower_id='$user_id'and borrow_book_id='$book_id' limit 1;";
  $result=mysqli_query($con, $sql2);
  $sql3="select * from user_account where id='$user_id';";
  $result2=mysqli_query($con,$sql3);
  if($result && $result2){
  	$user_data=mysqli_fetch_assoc($result2);
	$borrowered_number=$user_data["borrowered_data"];
	if($borrowered_number){
		$borrowered_number-=1;
		$sql4="update user_account set borrowered_number='$borrowered_number' where id='$user_id'";
	}else{
		echo mysqli_error($con);
		?>
		
		<?php
	}
	
  	  ?>
  	  <script>alert("the book have returned!!!");window.location.href='index.admin.php';</script>
  	  <?php
  }else{
  	echo mysqli_error($con);
	?>
	<!--<script>alert('STH WRONG  4!!!');window.location.href='index.admin.php';</script>-->
  <?php
  }
	
?>