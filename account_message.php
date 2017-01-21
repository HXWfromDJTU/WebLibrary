<?php
  require_once ("connect.php");
  session_start();
  $user_data=$_SESSION["user_object"];
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
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" href="index.php">
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
						<img class="mui-character-list" src="img/user_head_img/<?php echo $user_data["head_img_url"];?>">
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
				</ul>
			</div>
		</div>
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