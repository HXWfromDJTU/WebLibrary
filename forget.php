<!DOCTYPE html>
<html class="ui-page-login">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>DJTU图书馆登录</title>
		<link href="css/mui.min.css" rel="stylesheet" />
        <link href="css/library.css"  rel="stylesheet"/>
        <script src="js/jquery-2.1.0.js"></script>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<a href="login.php" class="mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">找回密码</h1>
		</header>
		<div class="mui-content">
			
			<div class="loginTop">
				<img class="loginTopLogo" src="img/icon.jpg" />
			</div>
			<div class="mui-content-padded">
			<form id='forget-form' method="post" action="froget.handle.php" class="mui-input-group input-form">
				<div class="mui-input-row">
					<label>账号</label>
					<input id='account'  name="username" type="text" class="mui-input-clear mui-input" placeholder="读书证账号" required="required" oninvalid="">
				</div>
				<div class="mui-input-row">
					<label>手机号</label>
					<input  id="phone"  onchange="ajaxValidate()" name="phone" type="tel" class="mui-input-clear mui-input" placeholder="与账号绑定的手机号" required="required" pattern="^[1][358][0-9]{9}$" oninvalid="setCustomValidity('非法手机号');" oninput="setCustomValidity('');">
				</div>
				<div class="mui-input-row">
					<input type="text" name="check_code" class="mui-input-clear mui-input mui-confirmNum" placeholder="短信验证码：">
					<button id="mui-getConfirmNum" class="mui-btn-primary mui-btn">获取验证码</button>
				</div>
				<div class="mui-input-row">
					<label>密码</label>
					<input  name="password" id="password1" type="password" class="mui-input-clear mui-input" placeholder="输入新密码" required="required" maxlength="10">
				</div>
				<div class="mui-input-row">
					<label>重复密码</label>
					<input onchange="checkPasswords()" name="confirm_password" id="password2" type="password" class="mui-input-clear mui-input" placeholder="重复新密码" required="required" maxlength="10">
				</div>
				<input type="hidden" name="submit_type" value="manual"/>
			</form>
				<input type="submit" form="forget-form" class="mui-btn-exclusive submit-btn" value="确认修改">
				<div class="link-area">
					
				</div>
			</div>
		</div>
				<script>
//		两次密码一致性的校验
function checkPasswords() {
	var pass1 = document.getElementById("password1");
	var pass2 = document.getElementById("password2");
	if (pass1.value != pass2.value)
	  { 

	  	pass1.setCustomValidity("两次输入的密码不匹配");
	  }
		
	else
		{
			pass1.setCustomValidity("");
		}
}
//		获取验证码BTN的效果
	var getConfirmNum = document.getElementById("mui-getConfirmNum");
	var num = 10;
	getConfirmNum.addEventListener('click', test)

	function test() {
		getConfirmNum.value = num;
		num -= 1;
		i = setTimeout("test()", 1000);
		if (num == 0) {
			clearTimeout(i);
			getConfirmNum.disabled = false;
			getConfirmNum.className = "mui-btn-primary mui-btn";
			getConfirmNum.innerHTML = "获取验证码";
			num = 10;
		} else {
			getConfirmNum.className = "mui-btn-danger mui-btn";
			getConfirmNum.innerHTML = num + "秒后重发";
			getConfirmNum.disabled = true;
		}
	}

	function ajaxValidate(){
	
	var username=document.getElementById("account");
	var phone=document.getElementById("phone");
	var value1=username.value;
	var value2=phone.value;
	$.ajax({
		type:"post",
		url:"froget.handle.php",
		data:{
			"submit_type":"ajax",
			"username":value1,
			"phone":value2
		},
		async:true,
		success:function(data){
			if(data==1){
				alert("手机号与账号不匹配");
			}else if(data==2){
				alert("用户名不存在");
			}
		}
	});
	}
	</script>
	</body>

