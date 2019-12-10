<?php 
	
        include_once "connection.php";

     if(isset($_GET['post']))
    {

        $post_id = $_GET['post'];

        $get_posts = "select * from posts where post_id='$post_id'";

        $run_posts = mysqli_query($con, $get_posts); 

        $row=mysqli_fetch_array($run_posts); 

        $post_new_id=$row['post_id'];
	
     }
?>

<h2 class="h2__padding">
    Bình luận cho đến nay
    <?php 
        include_once "connection.php";
        $get_comments = "select * from comments where post_id='$post_new_id' AND status='approve'";
		
		$run_comments = mysqli_query($con,$get_comments); 
		
		$count = mysqli_num_rows($run_comments); 
		
		echo "(". $count . ")";
 
    ?>
</h2>
<?php 
    
	   $get_comments = "select * from comments where post_id='$post_new_id' AND status='approve'";
		$run_comments = mysqli_query($con,$get_comments); 
		while($row_comments=mysqli_fetch_array($run_comments)){
			$comment_name=$row_comments['comment_name'];
			$comment_text=$row_comments['comment_text'];
			
			echo "
                <div class='container'>
                    <div class='row'>
                        <div class='col-md-12''>
                            <div class='shadow'>
                                <h4 style='display:block;color:#66DD66;padding: 10px 0px 0px 15px;'>$comment_name</h4>  
                                <p style='display:block; background:#151935;color:#fff;padding-left:15px;'>$comment_text</p>
                            </div>              
                        </div>
                    </div>
                </div>
            ";
			}
 ?>
<div class="container py-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="widget widget_contact_form clearfix widget__center p-5" style="background: #151935">
                <form method="post" action="blog-details.php?post=<?php echo $post_new_id; ?>" class="contact-form" >
                    <span class="form-control-wrap your-name">
                        <input type="text" id="name" name="comment_name" placeholder="Tên bạn" required>
                    </span>
                    <span class="form-control-wrap your-email">
                        <input type="email" id="email" name="comment_email" placeholder="Email" required>
                    </span>
                    <span class="form-control-wrap your-message">
                        <textarea name="comment" cols="40" rows="10" placeholder="Tham gia bình luận" required></textarea>
                    </span>
                    <div class="wrap-submit text-center">
                        <input type="submit" value="Đăng bình luận nào" class="submit" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php 

	
	if(isset($_POST['submit'])){
		
		$post_com_id = $post_new_id;
		$comment_name = $_POST['comment_name'];
		$comment_email = $_POST['comment_email'];
		$comment = $_POST['comment'];
		$status = "unapprove";
		
		if($comment_name=='' OR $comment_email=='' OR $comment==''){
			
			echo "<script>alert('Vui lòng điền đầy đủ thông tin vào bên dưới')</script>";
            echo"<script>window.open('blog-details.php?post=$post_id')</script>"; 
			exit();
			
			}
		
		else {
			
			 $query_comment = "insert into comments (post_id,comment_name, comment_email, comment_text, status) values ('$post_com_id','$comment_name','$comment_email','$comment','$status')";
			
			 $run_query = mysqli_query($con,$query_comment); 
				
				echo "<script>alert('Bình Luận của bạn sẽ được công bố sau khi phê duyệt!')</script>";
			    echo"<script>window.open('blog-details.php?post=$post_id')</script>"; 
				
			
			}
		
		
		
		
		}



?>