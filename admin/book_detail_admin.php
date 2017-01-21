<?php
require_once ("connect.php");
$id=$_GET["id"];
//插入图书信息的的SQL语句
$sql="select * from book_message where id='$id';";
$result=mysqli_query($con, $sql);
if($result && mysqli_num_rows($result)){
	$data=mysqli_fetch_assoc($result);
}
//插入借读记录的SQL语句
$sql2="select * from borrow_message where borrow_book_id='$id';";
$result2=mysqli_query($con, $sql2);
if($result2 && mysqli_num_rows($result2)){
	while($row=mysqli_fetch_assoc($result2)){
			$data2[]=$row;
//		     $borrower_id=$row["borrower_id"];
//		    $sql_change="select * from user_account where id='$borrower_id';";
//		    $result3=mysqli_query($con, $sql_change);
//			if($result3 && mysqli_num_rows($result3)){
//				while($row2=mysqli_fetch_assoc($result3)){
//					$user_data[]=$row2;
//				}
//			}
		}
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
			图书详情页
		</title>
		<link href="../css/mui.min.css" rel="stylesheet" />
		<link href="../css/library.css"  rel="stylesheet"/>
		<script src="../js/mui.min.js"></script>
	</head>
	<body>
		<header class="mui-bar mui-bar-nav">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left">
			</a>
			<h1 class="mui-title">
				图书详情页
			</h1>
		</header>
		<div class="mui-content">
			<div class="mui-scroll">
			<div class="book_detail_Top">
				<img  src="../img/book/<?php echo $data["cover_image_url"];?>" />
				<div class="book_message_box">
					<span class="title"><?php echo $data["title"];?></span>
					<span class="author"><?php echo $data["author"];?></span>
					<span class="publish_house"><?php echo $data["publishing_house"];?></span>
					<span class="type"><?php echo $data["type"];?></span>
					<span class="count">剩余数目：</span><span class="count" id="remain_number"><?php echo $data["remain_number"];?></span>
				</div>
			</div>
			<ul class="mui-table-view" id="book_brief_intr">
					
				<li class="mui-table-view-cell mui-collapse mui-active">
					<a class="mui-navigate-right" href="#">
						书本介绍
					</a>
					<div class="mui-collapse-content" style="background-color: lightgray;">
				         <?php echo $data["description"];?>
					</div>
		       
		       </li>
		     </ul>
		     
        <ul class="mui-table-view mui-table-view-chevron peopleAround">
					<li class="mui-table-view-divider">
		  		最近借读记录
		        	</li>
		        	<?php if(!empty($data2)){
		        		foreach($data2 as $value){
		    $borrower_id=$value["borrower_id"];
		    $sql_change="select * from user_account where id='$borrower_id';";
		    $result3=mysqli_query($con, $sql_change);
			if($result3 && mysqli_num_rows($result3)){
				$user_data=mysqli_fetch_assoc($result3);
			}else{
				echo mysqli_error($con);
			}
		        				?>
		        				<li class="mui-table-view-cell">
						<a href="reader_message_admin.php?user_id=<?php echo $user_data["id"];?>">
							<img name="headImg" class="mui-media-object mui-pull-left" src="../img/user_head_img/<?php echo $user_data["head_img_url"];?>">
							<div class="mui-media-body">
								<span name="postName"><?php echo $user_data["username"];?></span>
								<p name="postTime" class="mui-ellipsis">
									<?php echo $value["borrow_time"];?>
								</p>
							</div>
						</a>
					</li>
					<?php
		        			
		        		}
		        	}
		        	?>
					
					<li class="mui-table-view-cell mui-media">
						<a href="javascript:;">
							暂无更多记录
						</a>
					</li>
				</ul>
                <div id="mui-aaa">
				</div>
		    </div>
		</div>
		<nav class="mui-bar mui-bar-tab" id="book_detail_nav">
            	<a href="borrow.handle.php?id=<?php echo $id;?>" > 
            		<button id="borrow_btn" class="mui-btn-green btn100">我要借书</button>
            	</a>
            	<a href="recommend_buy.handle.php?book_id=<?php echo $id;?>" >
            		<button id="recom_buy_btn" class="mui-btn-danger btn100" disabled="true">荐购更多</button>	
            	</a>
                 
       </nav>

		<script>
		     var remain_number=document.getElementById("remain_number");
		     var borrow_btn=document.getElementById("borrow_btn");
		     var recom_buy_btn=document.getElementById("recom_buy_btn");
             if(remain_number.innerText==0){
             	borrow_btn.disabled="true";
             	borrow_btn.innerHTML="無书可借";
             	recom_buy_btn.disabled=false;
             }
		</script>
	</body> 
</html>