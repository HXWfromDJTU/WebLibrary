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
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">注册页面</h1>
		</header>
		<div class="mui-content">
			<div class="loginTop">
				<img class="loginTopLogo" src="img/icon.jpg" />
			</div>
			<div class="mui-content-padded">
             <form id='register-form' method="post" action="register.handle.php" class="mui-input-group input-form">
				<div class="mui-input-row">
					<label>用户名</label>
					<input id="username"  oninput="ajaxValidate()" name="username" type="text" class="mui-input-clear mui-input" placeholder="请设置用户名" required="required" maxlength="10">
				</div>
                <div class="mui-input-row">
					<label>密码</label>
					<input  name="password" id="password1" type="password" class="mui-input-clear mui-input" placeholder="请设置密码" required="required" maxlength="10">
				</div>
				<div class="mui-input-row">
					<label>重复密码</label>
					<input onchange="checkPasswords()" name="confirm_password" id="password2" type="password" class="mui-input-clear mui-input" placeholder="请设置密码" required="required" maxlength="10">
				</div>
				<div class="mui-input-row">
					<label>手机</label>
					<input  name="phone" type="tel" class="mui-input-clear mui-input" placeholder="绑定手机号" required="required" pattern="^[1][358][0-9]{9}$" oninvalid="setCustomValidity('非法手机号');" oninput="setCustomValidity('');">
				</div>
				<div class="mui-input-row">
					<input type="text" name="check_code" class="mui-input-clear mui-input mui-confirmNum" placeholder="短信验证码：">
					<button id="mui-getConfirmNum" class="mui-btn-primary mui-btn">获取验证码</button>
				</div>
				<div class="mui-input-row">
					<label>备注</label>
					<input  name="remark" type="text" class="mui-input-clear mui-input" placeholder="请设置个人备注" required="required" maxlength="10">
				</div>
                   <input type="hidden" name="submit_type" value="manual"/>
				
				</div>
				<input  type="submit" class="mui-btn-exclusive submit-btn" value="注册">
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
	var username=document.getElementById("username");
	var value=username.value;
	$.ajax({
		type:"post",
		url:"register.handle.php",
		data:{
			"submit_type":"ajax",
			"username":value
		},
		async:true,
		success:function(data){
			if(data==1){
				alert("用户名已存在");
				//username.setCustomValidity("用户名已经存在");
			}else{
				
			}
		}
	});
	}

	</script>
	</body>

</html>