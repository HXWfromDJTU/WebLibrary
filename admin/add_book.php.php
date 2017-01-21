<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title></title>
		<link rel="stylesheet" href="../css/mui.min.css">
        <link rel="stylesheet" href="../css/library.css">
        <script src="js/jquery-2.1.0.js"></script>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<a href="index.admin.php" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">新书入库</h1>
		</header>
		<div class="mui-content">
			<div class="mui-content-padded">
             <form id='admin-add-form' method="post" action="add_book.handle.php" class="mui-input-group input-form">
				<div class="mui-input-row">
					<label>书名</label>
					<input id="title"  name="title" type="text" class="mui-input-clear mui-input" placeholder="输入书本名" required="required" maxlength="15">
				</div>
				<div class="mui-input-row">
					<label>作者</label>
					<input  name="author" type="text" class="mui-input-clear mui-input" placeholder="请输入书本描述" required="required" maxlength="10">
				</div>
				<div class="mui-input-row">
					<label>出版社</label>
					<input  name="publishing_house" type="text" class="mui-input-clear mui-input" placeholder="请输入书本类型" required="required" maxlength="10">
				</div>
				<div class="mui-input-row">
					<label>简要描述</label>
					<input  name="description" type="text" class="mui-input-clear mui-input" placeholder="请输入书本描述" required="required" maxlength="10">
				</div>
				<div class="mui-input-row">
					<label>书本类型</label>
					<input  name="type" type="text" class="mui-input-clear mui-input" placeholder="请输入书本类型" required="required" maxlength="10">
				</div>
                <div class="mui-input-row">
					<label>ISBN</label>
					<input id="ISBN"   name="ISBN" type="number" class="mui-input-clear mui-input" placeholder="请输入ISBN" required="required" maxlength="10">
				</div>
				<div class="mui-input-row">
					<label>条形码号</label>
					<input name="bar_code" id="password2" type="text" class="mui-input-clear mui-input" placeholder="请输入条形码" required="required" maxlength="20">
				</div>
				
                   <input type="hidden" name="submit_type" value="add_book"/>
				
				</div>
				<input  type="submit" class="mui-btn-exclusive submit-btn" value="加入馆藏">
            </div>
	</body>

</html>