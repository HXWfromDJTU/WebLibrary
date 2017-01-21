<?php
require_once ("connect.php");
//取出该用户信息
//$user_id=1;
$user_id=$_GET["user_id"];
$sql1="select * from user_account where id='$user_id';";
$result1=mysqli_query($con,$sql1);
if($result1){
	
	$user_data=mysqli_fetch_assoc($result1);

}else{
	echo mysqli_error($con);
}
//取出借阅信息
$sql="select * from borrow_message where borrower_id='$user_id';";
$result=mysqli_query($con,$sql);
if($result){
	while($row=mysqli_fetch_assoc($result)){
		$data[]=$row;
	}
}else{
	echo mysqli_error($con);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>
		</title>
		<script src="../js/mui.min.js"></script>
		<link href="../css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="../css/library.css" />
	</head>
	<body>
		<header class="mui-bar mui-bar-nav">
			<a href="search_reader_message.php" class="mui-icon mui-icon-left-nav mui-pull-left">
			</a>
			<h1 class="mui-title">
				用户信息
			</h1>
			<span class="mui-action-back mui-icon mui-icon-closeempty mui-pull-right">
			</span>
		</header>
		<div class="mui-content">
			<div class="mui-card">
				<ul class="mui-table-view">
					<li class="mui-table-view-cell">
						<img class="mui-character-list" src="../img/user_head_img/<?php echo $user_data["head_img_url"];?>">
						<div class="mui-msgBox-list">
							<span class="mui-username-list"><?php echo $user_data["username"];?></span>
							<span class="mui-userBriefMeg-list"><?php echo $user_data["remark"];?></span>
						</div>
					</li>
					<li class="mui-table-view-cell">
						<span class="mui-pull-left mui-font-listItem">
							用户名
						</span>
						<span id="yy" class="mui-pull-right mui-font-listContent">
							<?php echo $user_data["username"];?>
						</span>
					</li>
					<li class="mui-table-view-cell">
						<span class="mui-pull-left mui-font-listItem">
							密码
						</span>
						<span class="mui-pull-right mui-font-listContent">
							<?php echo $user_data["password"];?>
						</span>
					</li>
					<li class="mui-table-view-cell">
						<span class="mui-pull-left mui-font-listItem">
							手机号
						</span>
						<span id="goodType" class="mui-pull-right mui-font-listContent">
							<?php echo $user_data["phone"];?>
						</span>
					</li>
					<li class="mui-table-view-cell">
						<span class="mui-pull-left mui-font-listItem">
							校园卡号
						</span>
						<span id="goodValue" class="mui-pull-right  mui-font-listContent">
							<?php echo $user_data["school_ID"];?>
						</span>
					</li>
					<li class="mui-table-view-cell">
						<span class="mui-pull-left mui-font-listItem">
							注册时间
						</span>
						<span id="goodValue" class="mui-pull-right  mui-font-listContent">
							<?php echo $user_data["register_time"];?>
						</span>
					</li>
					<?php
						if(!empty($data)){
							foreach ($data as $value) {
								  $book_id=$value["borrow_book_id"];
								  $sql2="select * from book_message where id='$book_id';";
								  $result2=mysqli_query($con,$sql2);
								  if($result2){
								  	   $book_data=mysqli_fetch_assoc($result2);
								  }else{
								  	echo mysqli_error($con);
								  }
								?>
								
					  <li class="mui-table-view-cell mui-media">
						<a href="book_detail_admin.php?id=<?php echo  $book_data["id"];?>">
							<img id="borrow_message_img"  src="../img/book/<?php echo  $book_data["cover_image_url"];?>">
							<div class="mui-table" id="borrow_message_detail">
								<div class="mui-table-cell mui-col-xs-10">
									<h4 class="mui-ellipsis">
										<?php echo  $book_data["title"];?>
									</h4>
									<h6>
										借书时间：<span><?php echo $value["borrow_time"];?></span>
									</h6>
									<h6>
										归还时间：<span><?php echo $value["return_time"];?></span>
									</h6>
								</div>
							</div>
						</a>
					</li>
								
								<?php
							}
						}
						?>
					
				</ul>
				<hr>

				<nav class="mui-bar mui-bar-tab" id="book_detail_nav">
					<a href="index.php">
						<button id="borrow_btn" class="mui-btn-green btn100">
							修改TA的信息
						</button>
					</a>
					<a href=".php">
						<button class="mui-btn-danger btn100">
							删除该用户
						</button>
					</a>
				</nav>
	</body>
</html>