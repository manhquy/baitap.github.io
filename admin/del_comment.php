<?php 
	include_once '../connection.php';
	
	if(isset($_GET['del'])){
		
		$delete_id = $_GET['del']; 
		
		$delete_comment = "DELETE FROM comments WHERE comment_id='$delete_id'";
		
		$run_delete = mysqli_query($con,$delete_comment); 	
		
		}
		header('location:comment.php');

?>