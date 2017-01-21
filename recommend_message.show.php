<?php
	require_once ("connect.php");
	session_start();
	//接收与书本有关的信息
    //$book_id=$_GET["book_id"];
	$ISBN=$_GET["ISBN"];
	$bar_code=$_GET["bar_code"];
	$title=$_GET["title"];
	$recom_num=$_GET["recom_num"];
	//从session中取出用户对象
    $user_data=$_SESSION["user_object"];
    $user_id=$user_data["id"];
	//$book_id=2;
    //$user_id=3;
//	//从借阅表中选出时间
//	$sql="select * from borrow_message where borrow_book_id='$book_id' and borrower_id='$user_id';";
//  $result=mysqli_query($con,$sql);
//	if($result){
//		$data=mysqli_fetch_assoc($result);
//	}else{
//		echo mysqli_error($con);
//	}
?>
<!DOCTYPE html>
<html class="ui-page-login">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>
			荐购信息页
		</title>
		<link href="css/mui.min.css" rel="stylesheet" />
		<link href="css/library.css"  rel="stylesheet"/>
		<script src="js/mui.min.js"></script>
	</head>
	<body>
		<!--<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left">
			</a>
			<h1 class="mui-title">
				荐购信息页
			</h1>
		</header>-->
		<div class="mui-content">
			<div class="mui-scroll">
			<div class="book_detail_Top">
				<img  src="img/book/nuknown_book.jpg" />
				<div class="book_message_box">
					<span class="title"><?php echo $title;?></span>
					<span >本书荐购人数：</span>
					<span class="check_time"><?php echo $recom_num;?></span>
				</div>
			</div>
			<ul class="mui-table-view" id="book_brief_intr">
					
				<li class="mui-table-view-cell mui-collapse mui-active">
					<a class="mui-navigate-right" href="#">
						《DJTU荐购规则条例》
					</a>
					<div id="mui-collapse-content" class="mui-collapse-content" style="background-color: lightgray;">
　　                      <br>  1．当馆藏图书无可借本时，荐购可能会被采纳。<br>
	                    2．当馆无推荐图书时候，荐购可能会被采纳。<br>
	                    	3．新书荐购人数超过100人时，荐购会被采纳。<br>
					</div>
		       
		       </li>
		     </ul>
             <div id="mui-aaa">
				</div>
		    </div>
		</div>
		<nav class="mui-bar mui-bar-tab" id="book_detail_nav">
            	<a href="index.php"> 
            		<button id="borrow_btn" class="mui-btn-green btn100">返回主页</button>
            	</a>
            	<a href="recommend_input.php">
            		<button class="mui-btn-danger btn100">继续荐购</button>	
            	</a>
                 
       </nav>

	</body> 
</html>