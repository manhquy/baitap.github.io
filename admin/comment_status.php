<?php 	
	include_once '../connection.php';

	if(isset($_GET['unapprove'])){
		
		$unapprove_id = $_GET['unapprove'];
		
		$unapprove_comment = "update comments set status='unapprove' where comment_id='$unapprove_id'";
		
		$run_unapprove_comment = mysqli_query($con,$unapprove_comment); 
		
		echo "<script>alert('Bình luận đã bị chặn!')</script>";
	echo "<script>window.open('comment.php?view_comments','_self')</script>";
		
		
	}
		
		if(isset($_GET['approve'])){
		
		$approve_id = $_GET['approve'];
		
		$approve_comment = "update comments set status='approve' where comment_id='$approve_id'";
		
		$run_approve_comment = mysqli_query($con,$approve_comment); 
		
		echo "<script>alert('Bình luận đã được phê duyệt!')</script>";
	echo "<script>window.open('comment.php?view_comments','_self')</script>";
	
		
	}


?>