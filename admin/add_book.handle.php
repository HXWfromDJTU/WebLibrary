<?php
	require_once("connect.php");
	$title=$_POST["title"];
	$author=$_POST["author"];
	$publishing_house=$_POST["publishing_house"];
	$description=$_POST["description"];
	$type=$_POST["type"];
	$ISBN=$_POST["ISBN"];
	$bar_code=$_POST["bar_code"];
	if(!$title||!$ISBN){
		?>
		<script>alert("add failed");window.location.href="index.admin.php";</script>
	<?php
	exit(); 
	}
	$sql="insert into book_message (title,author,publishing_house,description,type,ISBN,bar_code)
	       values ('$title','$author','$publishing_house','$description','$type','$ISBN','$bar_code')";
    $result=mysqli_query($con, $sql);
	if($result){
		?>
		<script>alert("add successfully");window.location.href="index.admin.php";</script>
		<?php
	}else{
		echo mysqli_error($con);
	}
	
	
	
	
	
	?>