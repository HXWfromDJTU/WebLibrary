<?php
    require_once ("connect.php");
	$key=$_POST["search_content"];
	$sql="select * from book_message where title like '%$key%' or author like '%$key%' or publishing_house like '%$key%'";
	$result=mysqli_query($con,$sql);
	if($result&&mysqli_num_rows($result)){
		while($row=mysqli_fetch_assoc($result)){
			$data[]=$row;
		}
		//返回结果的条数
		$resultNum=mysqli_num_rows($result);
		$backData=array("data"=>$data,"num"=>$resultNum);
		echo json_encode($backData);
		
	}else{
		echo mysqli_error($con);
	}
	
	?>