<?php include_once "header.php"; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php 
				include("../connection.php"); 

				if(isset($_GET['edit_post'])){

					$edit_id = $_GET['edit_post']; 

					$select_post = "select * from posts where post_id='$edit_id'";

					$run_query = mysqli_query($con,$select_post); 

					while ($row_post=mysqli_fetch_array($run_query)){

						$post_id = $row_post['post_id']; 
						$title = $row_post['post_title']; 
						$post_cat = $row_post['category_id']; 
						$author = $row_post['post_author']; 
						$keywords = $row_post['post_keywords']; 
						$image = $row_post['post_image']; 
						$content = $row_post['post_content'];
						$post_date = $row_post['post_date'];	
				}

			}


			?>
			<form method="post" enctype="multipart/form-data"> 

				<table class="table__center" width="100%" bgcolor="#FFFFFF">

					<tr>
						<td colspan="6" align="center">
							<h1 class="py-3">Update post</h1>
						</td>
					</tr>

					<tr>
						<td><strong>Tiêu đề : </strong></td>
						<td><input class="form-control" type="text" name="post_title" value="<?php echo $title; ?>"/></td>
					</tr>

					<tr>
						<td><strong>Tác giả : </strong></td>
						<td><input class="form-control" type="text" name="post_author" value="<?php echo $author; ?>"/></td>
					</tr>
					<tr>
						<td><strong>Từ khóa : </strong></td>
						<td><input class="form-control" type="text" name="post_keywords" value="<?php echo $keywords; ?>"/></td>
					</tr>

					<tr>
						<td><strong>Ảnh : </strong></td>
						<td>
							<div class="d-flex align-items-center">
							<input class="form-control mr-5" type="file" name="post_image" style="width: 50% !important" /> 
							<img src="img_upload/<?php echo $image; ?>" width="60" height="60" />
							</div>
						</td>
					</tr>

					<tr>
						<td><strong>Post Content : </strong></td>

						<td><textarea class="form-control" name="post_content" rows="15"><?php echo $content; ?></textarea></td>

					</tr>

					<tr>
						<td colspan="6" align="center">
							<button class="btn btn-success mt-3" type="submit" name="update">Update post</button>
						</td>
					</tr>

				</table>

			</form>
		</div>
	</div>
</div>
<?php 
if(isset($_POST['update'])){
	
	 $update_id = $post_id;
	 
	 $post_title = $_POST['post_title'];
	 $post_date = date('d-m-Y');
	 $post_cat1 = $_POST['cat'];
	 $post_author = $_POST['post_author'];
	 $post_keywords = $_POST['post_keywords'];
	 $post_image = $_FILES['post_image']['name'];
	 $post_image_tmp = $_FILES['post_image']['tmp_name'];
	 $post_content = $_POST['post_content'];
	
	if($post_title=='' OR $post_cat=='null' OR $post_author=='' OR $post_keywords=='' OR $post_image=='' OR $post_content==''){
		
		echo "<script>alert('Vui lòng điền đầy đủ thông tin')</script>";
		exit();
		}
	else {
		
		move_uploaded_file($post_image_tmp,"img_upload/$post_image");
		
		$update_posts = "update posts set post_title='$post_title',post_date='$post_date',post_author='$post_author',post_keywords='$post_keywords',post_image='$post_image',post_content='$post_content' where post_id='$update_id'";
		
		$run_update = mysqli_query($con,$update_posts); 
		
			echo "<script>alert('Cập nhật thành công!')</script>";
			
			echo "<script>window.open('table.php?view_posts','_self')</script>";
		}
	}

?> 

<?php include_once "footer.php"; ?>