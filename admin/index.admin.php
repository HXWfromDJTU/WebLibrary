97875354849595<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>
		</title>
		<link rel="stylesheet" href="../css/mui.min.css">
		<link rel="stylesheet" href="../css/library.css">
		<script src="j../s/jquery-2.1.0.js"></script>
	</head>
	<body>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left">
			</a>
			<h1 class="mui-title">
				管理员页面
			</h1>r
		</header>
		<div class="mui-content">
			<ul class="mui-table-view book_list">
				<li class="mui-table-view-divider">
					查找用户
				</li>
				<li class="mui-table-view-cell " style="padding: 0">
					<form action="search_reader_message.php" method="post">
					<div class="mui-input-row">
						<input type="text" name="search_username" class="mui-input-clear mui-input mui-confirmNum" placeholder="请输入用户名" required="required">
						<input type="submit" id="mui-getConfirmNum" class="mui-btn mui-btn-primary mui-btn" value="查找"> 
					</div>
					</form>
				</li>
			</ul>
			<ul class="mui-table-view book_list">
				<li class="mui-table-view-divider">
					归还图书
				</li>
				<li class="mui-table-view-cell " style="padding: 0">
					<form action="book_return.handle.php" method="post">
					<div class="mui-input-row">
						<input type="text" name="ISBN" class="mui-input-clear mui-input mui-confirmNum" placeholder="请输入ISBN号">
						<input type="text" name="user_id" class="mui-input-clear mui-input mui-confirmNum" placeholder="请输入读者ID">
						<input type="submit" id="mui-getConfirmNum" class="mui-btn mui-btn-primary mui-btn" value="归还"> 
					</div>
					</form>
				</li>
			</ul>
			<ul class="mui-table-view book_list">
				<li class="mui-table-view-divider">
					查询图书
				</li>
				<li class="mui-table-view-cell " style="padding: 0">
					<form action="search_result_admin.php" method="post">
					<div class="mui-input-row">
						<input type="text" name="search_content" class="mui-input-clear mui-input mui-confirmNum" placeholder="请输入书名">
						<input type="submit" id="mui-getConfirmNum" class="mui-btn mui-btn-primary mui-btn" value="查找"> 
					</div>
					</form>
				</li>
			</ul>
			<ul class="mui-table-view book_list">
				<li class="mui-table-view-divider">
					查询图书
				</li>
				<li class="mui-table-view-cell " style="padding: 0">
					<div class="mui-input-row">
					<a href="add_book.php.php">
						<button class="mui-btn-blue submit-btn" id="admin_index_add_btn" >添加图书</button>
					</a>
					</div>
				</li>
			</ul>
			
		</div>
	</body>
</html>