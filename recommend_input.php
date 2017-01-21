<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title></title>
		<link rel="stylesheet" href="css/mui.min.css">
        <link rel="stylesheet" href="css/library.css">
        <script src="js/jquery-2.1.0.js"></script>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<a href="index.php" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">新书荐购</h1>
		</header>
		<div class="mui-content">
			<div class="loginTop">
				<img class="loginTopLogo" src="img/icon.jpg" />
			</div>
			<div class="mui-content-padded">
             <form id='recom-form' method="post" action="recommend_buy.handle.php" class="mui-input-group input-form">
				<div class="mui-input-row">
					<label>书名</label>
					<input id="title"  name="title" type="text" class="mui-input-clear mui-input" placeholder="输入书本名" required="required" maxlength="15">
				</div>
                <div class="mui-input-row">
					<label>ISBN</label>
					<input id="ISBN"   name="ISBN" type="number" class="mui-input-clear mui-input" placeholder="请输入ISBN" required="required" maxlength="10">
				</div>
				<div class="mui-input-row">
					<label>条形码号</label>
					<input name="bar_code" id="password2" type="text" class="mui-input-clear mui-input" placeholder="请输入条形码" required="required" maxlength="10">
				</div>
				<div class="mui-input-row">
					<label>备注</label>
					<input  name="remark" type="text" class="mui-input-clear mui-input" placeholder="请输入书本备注" required="required" maxlength="10">
				</div>
                   <input type="hidden" name="submit_type" value="new_book"/>
				
				</div>
				<input  type="submit" class="mui-btn-exclusive submit-btn" value="申请荐购">
            </div>
	</body>

</html>