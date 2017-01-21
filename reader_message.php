<?php
require_once ("connect.php");
session_start();
$user_data = $_SESSION["user_object"];
$user_id=$user_data["id"];
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
		<script src="js/mui.min.js"></script>
		<link href="css/mui.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/library.css" />
	</head>
	<body>
		<header class="mui-bar mui-bar-nav">
			<a href="index.php" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left">
			</a>
			<h1 class="mui-title">
				我的借阅信息
			</h1>
			<span class="mui-action-back mui-icon mui-icon-closeempty mui-pull-right">
			</span>
		</header>
		<div class="mui-content">
			<div class="mui-card">
				<ul class="mui-table-view">
					<li class="mui-table-view-cell">
						<img class="mui-character-list" src="img/user_head_img/<?php echo $user_data["head_img_url"];?>">
						<div class="mui-msgBox-list">
							<span class="mui-username-list"><?php echo $user_data["username"];?></span>
							<span class="mui-userBriefMeg-list"><?php echo $user_data["remark"];?></span>
						</div>
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
						<a href="book_detail.show.php?id=<?php echo  $book_data["id"];?>">
							<img id="borrow_message_img"  src="img/book/<?php echo  $book_data["cover_image_url"];?>">
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
							修改信息
						</button>
					</a>
					<a href=".php">
						<button class="mui-btn-danger btn100">
							保存信息
						</button>
					</a>
				</nav>
	</body>
</html>