<?php
    require_once("connect.php");
	session_start();
	$username=$_SESSION["search_username"];
	//$username=1;
	$username=$_POST["search_username"];
	$_SESSION["search_username"]=$username;
	$sql="select * from user_account where username like '%$username%'";
	$result=mysqli_query($con,$sql);
	if($result){
		while($row=mysqli_fetch_assoc($result)){
			$data[]=$row;
		}
	}else{
		echo mysqli_error($con);
	}
	
	
	
	
	
	?>
	<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="../js/mui.min.js"></script>
    <script src="../js/jquery-2.1.0.js"></script>
    <link href="../css/mui.min.css" rel="stylesheet"/>
    <script type="text/javascript" charset="UTF-8">
      	mui.init();
    </script>
</head>
<body>
	<!--<header class="mui-bar mui-bar-nav">
			<a href="index.admin.php" class="mui-icon mui-icon-left-nav mui-pull-left">
			</a>
			<h1 class="mui-title">
				用户检索（管理员）
			</h1>
	</header>-->

	<div class="mui-content">
		
		  <ul class="mui-table-view" id="index_result_box">
		  	<li class="mui-table-view-divider">
		  		检索结果
		  	</li>
		  		<?php 
		  		if(!empty($data)){
		  			foreach($data as $value) {
		  				?> 
		  	
		  	<li class="mui-table-view-cell mui-media">
					<a href="reader_message_admin.php?user_id=<?php echo $value['id'];?>">
						<img class="mui-media-object mui-pull-left" src="../img/user_head_img/<?php echo $value['head_img_url'];?>">
						<div class="mui-media-body">
							<?php echo $value['username'];?>
							<p class='mui-ellipsis'><?php echo $value['register_time'];?></p>
						</div>
					</a>
				</li>
							<?php
		  			}
		  		}
		  		
		  		
		  		?>
		  </ul>
		</ul>
	</div>

</body>
</html>