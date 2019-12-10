<?php 
	include("../connection.php"); 

	if(isset($_GET['delete_post'])){
		
		$delete_id = $_GET['delete_post'];
		
		$delete_post = "DELETE FROM posts WHERE post_id='$delete_id'";
		
		$run_delete = mysqli_query($con,$delete_post); 	
		
		}
		header("location:table.php");

?>