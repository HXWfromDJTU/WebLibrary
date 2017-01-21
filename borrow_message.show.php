<?php
	require_once ("connect.php");
	session_start();
    $book_id=$_GET["book_id"];
    $user_data=$_SESSION["user_object"];
    $user_id=$user_data["id"];
	//$book_id=2;
    //$user_id=3;
	//从借阅表中选出时间
	$sql="select * from borrow_message where borrow_book_id='$book_id' and borrower_id='$user_id';";
    $result=mysqli_query($con,$sql);
	if($result){
		$data=mysqli_fetch_assoc($result);
	}else{
		echo mysqli_error($con);
	}
	//从图书表中选出书籍信息
	$sql2="select * from book_message where id='$book_id';";
    $result2=mysqli_query($con,$sql2);
	if($result2){
		$data2=mysqli_fetch_assoc($result2);
	}else{
		echo mysqli_error($con);
	}
?>
<!DOCTYPE html>
<html class="ui-page-login">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>
			借阅信息页
		</title>
		<link href="css/mui.min.css" rel="stylesheet" />
		<link href="css/library.css"  rel="stylesheet"/>
		<script src="js/mui.min.js"></script>
	</head>
	<body>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left">
			</a>
			<h1 class="mui-title">
				借阅信息页
			</h1>
		</header>
		<div class="mui-content">
			<div class="mui-scroll">
			<div class="book_detail_Top">
				<img  src="img/book/<?php echo $data2["cover_image_url"];?>" />
				<div class="book_message_box">
					<span class="title"><?php echo $data2["title"];?></span>
					<span >借书时间</span>
					<span class="check_time"><?php echo $data["borrow_time"];?></span>
					<span >还书时间</span>
					<span class="check_time"><?php echo $data["return_time"];?></span>
				</div>
			</div>
			<ul class="mui-table-view" id="book_brief_intr">
					
				<li class="mui-table-view-cell mui-collapse mui-active">
					<a class="mui-navigate-right" href="#">
						《DJTU借阅条例》
					</a>
					<div id="mui-collapse-content" class="mui-collapse-content" style="background-color: lightgray;">
　　1．本馆中外文书刊实行开架和闭架外借。<br>
　　2．持本馆发放的中文借阅证或中外文借阅证，即可办理书刊外借手续。<br>
　　3．办理书刊外借手续时，请当面检查所借书刊是否有涂画、批注、圈点、撕页、污损等，如有上述情况，请向工作人员反映；否则还书刊时发现有上述情况，责任由读者自负，并按有关规定处理。<br>
　　4．如发生超期，遗失、损坏、偷窃等情况，按本馆有关规定处理。<br>
　　5．外借书刊借期、册数、续借：<br>
　　持有本馆中文借阅证的读者，外借书刊总册数不得超过4册，其中可借中文图书3册，或中文期刊4册；中文期刊借期20天，中文图书借期30天，中文图书可续借一次。<br>
　　持有中外文借阅证的读者，外借书刊总册数不得超过4册，其中可借外文图书1册，借期30天，可续借一次。<br>
　　6．具体外借规则详见各外借处借阅规则。<br>
					</div>
		       
		       </li>
		     </ul>
             <div id="mui-aaa">
				</div>
		    </div>
		</div>
		<nav class="mui-bar mui-bar-tab" id="book_detail_nav">
            	<a href="index.php"> 
            		<button id="borrow_btn" class="mui-btn-green btn100">知道了，返回主页</button>
            	</a>
            	<a href="reader_message.php">
            		<button class="mui-btn-danger btn100">查看借阅情况</button>	
            	</a>
                 
       </nav>

	</body> 
</html>