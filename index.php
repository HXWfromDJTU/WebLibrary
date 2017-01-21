<?php
    require_once("connect.php");
	session_start();
	$data=$_SESSION["user_object"];
	//避免测试的时候为空，也执行查询（正常工作时，若$user_id为空，则跳转到登录页面）
	if($data==""){
		?>
		<script>alert('Please login!!!');window.location.href='login.php';</script>

		<?php
		exit();
	} 
	//选出热门书籍
    $sql="select * from book_message order by hot desc limit 4;";
	$result=mysqli_query($con,$sql);
	if($result&&mysqli_num_rows($result)){
		while($row=mysqli_fetch_assoc($result)){
			$recom_book_data[]=$row;
		}
	}else{
		echo mysqli_error($con);
	}
	//选出热门推荐购买
	$sql2="select * from book_message order by recommend_times desc limit 4;";
	$result2=mysqli_query($con,$sql2);
	if($result2&&mysqli_num_rows($result2)){
		while($row2=mysqli_fetch_assoc($result2)){
			$buy_book_data[]=$row2;
		}
	}else{
		echo mysqli_error($con);
	}
	?> 
<!DOCTYPE html>
<html>
	<head>
		<meta name="generator" content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>
		</title>
		<script src="js/mui.min.js"></script>
		<script type="text/javascript" src="js/jquery-2.1.0.js" ></script>
		<link href="css/mui.min.css" rel="stylesheet" />
		<link href="css/iconfont.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/library.css" /> 
		<script type="text/javascript" charset="utf-8">mui.init();
//侧滑容器父节点
var offCanvasWrapper = mui('#offCanvasWrapper');
//主界面容器
var offCanvasInner = offCanvasWrapper[0].querySelector('.mui-inner-wrap');
//菜单容器
var offCanvasSide = document.getElementById("offCanvasSide");
if (!mui.os.android) {
	document.getElementById("move-togger").classList.remove('mui-hidden');
	var spans = document.querySelectorAll('.android-only');
	for (var i = 0, len = spans.length; i < len; i++) {
		spans[i].style.display = "none";
	}
} 
//移动效果是否为整体移动 
var moveTogether = false;
//侧滑容器的class列表，增加.mui-slide-in即可实现菜单移动、主界面不动的效果；
var classList = offCanvasWrapper[0].classList;
//变换侧滑动画移动效果；
mui('.mui-input-group').on('change', 'input', function() {
	if (this.checked) {
		offCanvasSide.classList.remove('mui-transitioning');
		offCanvasSide.setAttribute('style', '');
		classList.remove('mui-slide-in');
		classList.remove('mui-scalable');
		switch (this.value) {
			case 'main-move':
				if (moveTogether) {
					//仅主内容滑动时，侧滑菜单在off-canvas-wrap内，和主界面并列
					offCanvasWrapper[0].insertBefore(offCanvasSide, offCanvasWrapper[0].firstElementChild);
				}
				break;
			case 'main-move-scalable':
				if (moveTogether) {
					//仅主内容滑动时，侧滑菜单在off-canvas-wrap内，和主界面并列
					offCanvasWrapper[0].insertBefore(offCanvasSide, offCanvasWrapper[0].firstElementChild);
				}
				classList.add('mui-scalable');
				break;
			case 'menu-move':
				classList.add('mui-slide-in');
				break;
			case 'all-move':
				moveTogether = true;
				//整体滑动时，侧滑菜单在inner-wrap内
				offCanvasInner.insertBefore(offCanvasSide, offCanvasInner.firstElementChild);
				break;
		}
		offCanvasWrapper.offCanvas().refresh();
	}
});
//主界面‘显示侧滑菜单’按钮的点击事件
document.getElementById('offCanvasShow').addEventListener('tap', function() {
	offCanvasWrapper.offCanvas('show');
});
//菜单界面，‘关闭侧滑菜单’按钮的点击事件
document.getElementById('offCanvasHide').addEventListener('tap', function() {
	offCanvasWrapper.offCanvas('close');
});
//主界面和侧滑菜单界面均支持区域滚动；
mui('#offCanvasSideScroll').scroll();
mui('#offCanvasContentScroll').scroll();
//实现ios平台原生侧滑关闭页面；
if (mui.os.plus && mui.os.ios) {
	mui.plusReady(function() { //5+ iOS暂时无法屏蔽popGesture时传递touch事件，故该demo直接屏蔽popGesture功能
		plus.webview.currentWebview().setStyle({
			'popGesture': 'none'
		});
	});
}</script>
	</head>
	<body>
		<div id="offCanvasWrapper" class="mui-off-canvas-wrap mui-draggable">
			<!--侧滑菜单部分-->
			<aside id="offCanvasSide" class="mui-off-canvas-left">
				<div id="offCanvasSideScroll" class="mui-scroll-wrapper">
					<div class="mui-scroll">
						<ul class="mui-table-view mui-table-view-chevron mui-table-view-inverted">
							<li class="mui-table-view-cell" id="sidebarLogo">
								<div class="mui-pull-right">
									<img src="img/user_head_img/<?php echo $data["head_img_url"]; ?>" />
									<h3 id="username">
										<?php 
										    
										     echo $data["username"]; 
										     ?>
									</h3>
								</div>
							</li>
							<li class="mui-table-view-cell" id="account_manage_li">
								<a class="mui-navigate-right mui-icon mui-icon-contact" href="account_message.php">
									账号管理
								</a>
							</li>
							<li class="mui-table-view-cell" id="borrow_message_li">
								<a class="mui-navigate-right mui-icon mui-icon-chat" href="reader_message.php">
									借阅情况
								</a>
							</li>
							<li class="mui-table-view-cell">
								<a class="mui-navigate-right mui-icon mui-icon-gear" href="setting.html">
									设置
								</a>
							</li>
							<li class="mui-table-view-cell" id="exit_li">
								<a class="mui-navigate-right mui-icon iconfont icon-exit-door" href="login.php">
									退出登录
								</a>
							</li>
						</ul>
					</div>
				</div>
			</aside>
			<!--主界面部分-->
			<div class="mui-inner-wrap"> 
				<header class="mui-bar mui-bar-nav">
					<a class="mui-icon mui-icon-contact mui-pull-left" href="#offCanvasSide">
					</a>
					<h1 class="mui-title">
						DJTU图书馆首页
					</h1>
				</header>
				<div id="offCanvasContentScroll" class="mui-content mui-scroll-wrapper">
					<div class="mui-scroll">
						<div class="mui-content-padded">
							<!--主页内容-->
							<!--icon部分-->
							<div class="indexTopBox">
				              <img class="indexTopLogo" src="img/icon-long.png" />
			               </div>
			               <!--搜索框-->
			               <div id="index_search_box" class="mui-search">
						        <form id="index_search_form" action="search_result.show.php" method="post">
							       <input id="index_search" type="search" name="search_content" placeholder="搜索书籍名称/作者/出版社" required="required" oninvalid="setCustomValidity('搜索内容不能为空');" oninput="setCustomValidity('');"/>
						        </form>
						         <input type="submit" form="index_search_form" id="search_btn" value="搜索"/>
					       </div>
					       <!--推荐阅读-->
					        <ul class="mui-table-view book_list">
								<li class="mui-table-view-divider">
									推荐阅读
									<a href="#" class="mui-pull-right">
										更多
									</a>
								</li>
								<li class="mui-table-view-cell " style="padding: 0">
									<ul id="grid-9" class="mui-table-view mui-grid-view mui-grid-9">
										<?php 
											if(!empty($recom_book_data)){
												foreach($recom_book_data as $value){
													?>
										<li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" style="padding: 0 2px;">
											<a  href="book_detail.show.php?id=<?php echo $value['id'];?>">
												<img src="img/book/<?php echo $value["cover_image_url"];?>" class="mui-inline" style="padding: 0;"/>
												<div class="mui-media-body" >
													<?php echo $value["title"];?>
												</div>
											</a>
										</li>
												<?php
												}
											}
											?>
										
										
									</ul>
								</li>
							</ul>
							<ul class="mui-table-view book_list">
								<li class="mui-table-view-divider">
									推荐购买
									<a href="recommend_input.php" class="mui-pull-right">
										更多
									</a>
								</li>
								<li class="mui-table-view-cell " style="padding: 0">
									<ul id="grid-9" class="mui-table-view mui-grid-view mui-grid-9">
										<?php 
											if(!empty($buy_book_data)){
												foreach($buy_book_data as $value){
													
													?>
													<li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3" style="padding: 0 2px;">
											<a  href="book_detail.show.php?id=<?php echo $value['id'];?>">
												<img src="img/book/<?php echo $value["cover_image_url"];?>" class="mui-inline" style="padding: 0;"/>
												<div class="mui-media-body">
													<?php echo $value["title"];?>
												</div>
											</a>
										</li>
												<?php
												}
											}
											?>
										
										
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
		<script>
		   document.getElementById("account_manage_li").addEventListener("tap",function(){
		    	window.location.href="account_message.php";
		   }); 
		    document.getElementById("borrow_message_li").addEventListener("tap",function(){
		    	window.location.href="reader_message.php";
		   }); 
		   document.getElementById("exit_li").addEventListener("tap",function(){
		    	window.location.href="login.php";
		   }); 
		</script>
	</body>
</html>
