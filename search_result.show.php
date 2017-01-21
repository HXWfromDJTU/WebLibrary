<?php
require_once("connect.php");
    $key=$_POST["search_content"];
	$sql="select * from book_message where title like '%$key%' or author like '%$key%' or publishing_house like '%$key%'";
	$result=mysqli_query($con,$sql);
	if($result&&mysqli_num_rows($result)){
		while($row=mysqli_fetch_assoc($result)){
			$data[]=$row;
		}
	}else{
		echo mysql_error();
		}
	?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/jquery-2.1.0.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <script type="text/javascript" charset="UTF-8">
      	mui.init();
    </script>
</head>
<body>
	<header class="mui-bar mui-bar-nav">
			<div class="mui-input-row mui-search mui-inline">
				<input id="search" type="search" class="mui-input-clear" placeholder="搜索文章标题" />
			</div>
			<a class=" mui-icon mui-pull-right" href="index.php">
				返回
			</a>
	</header>

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
					<a href="book_detail.show.php?id=<?php echo $value['id'];?>">
						<img class="mui-media-object mui-pull-left" src="img/book/<?php echo $value['cover_image_url'];?>">
						<div class="mui-media-body">
							<?php echo $value['title'];?>
							<p class='mui-ellipsis'><?php echo $value['publishing_house'];?></p>
						</div>
					</a>
				</li>
							<?php
		  			}
		  		}
		  		
		  		
		  		?>
		  </ul>
		<ul class="mui-table-view" id="resultBox">
						
						
		</ul>	
		</ul>
	</div>

<script>
	   	//使用ajax技术进行文章检索 
      	function autoSearch(){
      		var search=document.getElementById("search");
      		var content = search.value;
      	    	$.ajax({
      	    	type:"POST",
   				url: "search_ajax.handle.php",
   				data: {
   					"search_content":content
   				},
   				success: function(data) {
   					var resultBox=document.getElementById("resultBox");
   					$("#resultBox").empty();
   					$("#index_result_box").empty();
   					//解析JSON数据
 					var jsonobj = JSON.parse(data);
 					//取出返回的各种数据
   					var resultNum=jsonobj['num'];
   					for(var i=0;i<resultNum;i++){
						var li = document.createElement('li');
						li.className = 'mui-table-view-cell mui-media';
						li.innerHTML = "<a href='book_detail.show.php?id="+jsonobj['data'][i].id+"'><img class='mui-media-object mui-pull-left' src='img/book/"+jsonobj['data'][i].cover_image_url+"'><div class='mui-media-body'>"+jsonobj['data'][i].title+"<p class='mui-ellipsis'>"+jsonobj['data'][i].publishing_house+"</p></div></a>";
						resultBox.appendChild(li);
					}
   				}
   			});
      	}
      	//搜索框有变动的时候执行autoSearch()执行文章检索
      	document.getElementById("search").oninput=function(){
      		autoSearch()
      	}
      	
      
</script>
</body>
</html>