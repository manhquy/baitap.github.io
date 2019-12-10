<?php 
include_once "../connection.php";
include_once "header.php";
if(isset($_POST['create'])){
	
	 $post_title = $_POST['post_title'];
	 $post_author = $_POST['post_author'];
	 $post_date = date('d-m-Y');
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
		
		$insert_posts = "insert into posts (post_title,post_date,post_author,post_keywords,post_image,post_content) values ('$post_title','$post_date','$post_author','$post_keywords','$post_image','$post_content')";
		
		$run_posts = mysqli_query($con,$insert_posts); 
			
			echo "<script>alert('Thêm thành công!')</script>";
			
			echo "<script>window.open('table.php?insert_post','_self')</script>";
		
		}	
	}

 ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form method="post" enctype="multipart/form-data"> 

				<table class="table__center" width="100%" bgcolor="#FFFFFF">

					<tr>
						<td colspan="6" align="center">
							<h1 class="py-3">Insert post</h1>
						</td>
					</tr>

					<tr>
						<td><strong>Tiêu đề : </strong></td>
						<td><input class="form-control" type="text" name="post_title" /></td>
					</tr>

					<tr>
						<td><strong>Tác giả : </strong></td>
						<td><input class="form-control" type="text" name="post_author"/></td>
					</tr>
					<tr>
						<td><strong>Từ khóa : </strong></td>
						<td><input class="form-control" type="text" name="post_keywords"/></td>
					</tr>

					<tr>
						<td><strong>Ảnh : </strong></td>
						<td>
							<div class="d-flex align-items-center">
							<input class="form-control mr-5" type="file" name="post_image" /> 
							</div>
						</td>
					</tr>

					<tr>
						<td><strong>Post Content : </strong></td>

						<td><textarea class="form-control" name="post_content" rows="15"></textarea></td>

					</tr>

					<tr>
						<td colspan="6" align="center">
							<button class="btn btn-success mt-3" type="submit" name="create">Create post</button>
						</td>
					</tr>

				</table>

			</form>
		</div>
	</div>
</div>
<?php include_once "footer.php"; ?>