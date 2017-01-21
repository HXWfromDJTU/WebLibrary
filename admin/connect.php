<?php
    require_once("config.php");
	if(!$con=mysqli_connect(host,username,password,"library"))
	{ echo "连接数据库失败";}
	if(!mysqli_query($con,"set names utf8")){
		echo "设定字符集失败";
	}
	
	
	