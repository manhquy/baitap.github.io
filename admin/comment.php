<?php 
include_once 'header.php';
?>

<div class="container-fluid">
	<h1 class="h3 mb-2 text-gray-800">Comments</h1>
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive table-hover">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Bình Luận</th>
							<th>Tác giả</th>
							<th>Email</th>
							<th>Stauts</th>
							<th style="text-align: center;">Xóa</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						include("../connection.php");
						$get_comments = "select * from comments";
						$run_comments = mysqli_query($con,$get_comments); 
						$i=1;
						while ($row_comments = mysqli_fetch_array($run_comments)){
							$comment_id = $row_comments['comment_id'];
							$comment_name = $row_comments['comment_name'];
							$comment_email = $row_comments['comment_email'];
							$comment_text = $row_comments['comment_text'];
							$status = $row_comments['status'];
							?>
							<tr>
								<td class="text-center"><?php echo $i++; ?></td>
								<td><?php echo $comment_text; ?></td>
								<td><?php echo $comment_name; ?></td>
								<td><?php echo $comment_email; ?></td>
								<td>
									<?php 								
									if($status=='approve')
									{
										echo "<a href='comment_status.php?unapprove=$comment_id' style='color:blue' class='btn'>Unapprove</a>";

									}
									else {
										echo "<a href='comment_status.php?approve=$comment_id' style='color:red' class='btn'>Approve</a>";
									} 
									?>
								</td>
								<td style="text-align: center;">
									<a onclick="return confirm('Bạn có thực sự muốn xóa nó ?');" href="del_comment.php?del=<?php echo $comment_id ?>" class="btn btn-danger">Xóa
									</a>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

</div>
<?php 
include_once 'footer.php';
?>