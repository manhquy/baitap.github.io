<?php include_once "header.php"; ?>
<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Posts</h1>
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive table-hover">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tiêu đề</th>
              <th>Tác giả</th>
              <th>Ảnh</th>
              <th>Bình luận</th>
              <th style="text-align: center;">Thao tác</th>
            </tr>
          </thead>
          <tbody>
           <?php 
             include_once "../connection.php";
             $get_posts = "select * from posts";
             $run_posts = mysqli_query($con,$get_posts); 
             $i=1;
             while ($row_posts = mysqli_fetch_array($run_posts)){
             $post_id = $row_posts['post_id'];
             $post_title = $row_posts['post_title'];
             $post_author = $row_posts['post_author'];
             $post_image = $row_posts['post_image'];
             $post_date = $row_posts['post_date'];
           ?>
           <tr>
            <td class="text-center"><?php echo $post_id  ?></td>
            <td><?php echo $post_title ?></td>
            <td><?php echo $post_author  ?></td>
            <td><img src="img_upload/<?php echo $post_image ?>" alt="image" style="width: 65px; height: 65px;"></td>
            <td class="text-center">
                 <?php 
                    $get_comments = "select * from comments where post_id='$post_id'";
                    
              $run_comments = mysqli_query($con,$get_comments); 
              
              $count = mysqli_num_rows($run_comments);
              
              echo $count;
              ?>
            </td>
            <td style="text-align: center;">
              <div class="d-flex justify-content-center align-items-center">
                <a href="edit_post.php?edit_post=<?php echo $post_id; ?>" class="btn btn-success mr-3">Sửa</a>
                <a onclick="return confirm('Bạn có thực sự muốn xóa nó ?');" href="delete_post.php?delete_post=<?php echo $post_id; ?>" class="btn btn-danger">Xóa</a>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<?php include_once "footer.php"; ?>