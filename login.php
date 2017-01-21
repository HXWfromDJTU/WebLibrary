<!DOCTYPE html>
<html class="ui-page-login">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>DJTU图书馆登录</title>
		<link href="css/mui.min.css" rel="stylesheet" />
        <link href="css/library.css"  rel="stylesheet"/>
        <script src="js/mui.min.js"></script>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<h1 class="mui-title">DJTU图书馆登录</h1>
		</header>
		<div class="mui-content">
			
			<div class="loginTop">
				<img class="loginTopLogo" src="img/icon.jpg" />
			</div>
			<div class="mui-content-padded">
			<form id='login-form' method="post" action="login.handle.php" class="mui-input-group input-form">
				<div class="mui-input-row">
					<label>账号</label>
					<input id='account' name="username" type="text" class="mui-input-clear mui-input" placeholder="读书证账号" required="required" oninvalid="">
				</div>
				<div class="mui-input-row">
					<label>密码</label>
					<input id='password' name="password" type="password" class="mui-input-clear mui-input" placeholder="密码" required="required">
				</div>
			</form>
				<input type="submit" form="login-form" class="mui-btn-exclusive submit-btn" value="登录">
				<div class="link-area">
					<a href="register.php">注册账号</a><a href="forget.php">忘记密码</a>
				</div>
			</div>
		</div>
		
	</body>

