<?php include_once "headers.php"; ?>
<div id="main-content" class="site-main  clearfix no-padding">
    <div id="content-wrap" class="padding-top-40">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="site-content" class="site-content clearfix bg__dark">
                        <div id="inner-content" class="inner-content-wrap">
                            <div class="single-post">
                                <?php
                                    include_once "connection.php";
                                    if(isset($_GET['post'])){
                                      $post_id = $_GET['post'];
                                    $get_posts = "select * from posts where post_id='$post_id'";
                                    $run_posts = mysqli_query($con, $get_posts); 
                                    while ($row_posts = mysqli_fetch_array($run_posts))
                                    {
                                        $post_title = $row_posts['post_title'];
                                        $post_date = $row_posts['post_date'];
                                        $post_author = $row_posts['post_author'];
                                        $post_image = $row_posts['post_image'];
                                        $post_content = $row_posts['post_content'];
                                        $post_keyword = $row_posts['post_keywords'];
                                        $image_details = $row_posts['img_details'];
                                        $image_explain = $row_posts['post_explain'];                                                 
                                ?>
                                <article class="hentry">
                                    <div class="post-media clearfix">
                                        <a href="#"><img src="admin/img_upload/<?php echo $post_image ?>" alt="Image"></a>
                                    </div><!-- .post-media -->

                                    <div class="post-content-wrap">
                                        <h2 class="post-title">
                                            <span>
                                                <a href="#" class="bg__white"><?php echo $post_title ?></a>
                                            </span>
                                        </h2><!-- .post-title -->

                                        <div class="post-meta">
                                            <div class="post-meta-content">
                                                <div class="post-meta-content-inner">
                                                    <span class="post-by-author item">
                                                        <span class="inner">By:
                                                            <a href="#" class="bg__white" rel="author"><?php echo $post_author ?></a>
                                                        </span>
                                                    </span>

                                                    <span class="post-date item">
                                                        <span class="inner">
                                                            <span class="entry-date"><?php echo $post_date ?></span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- .post-meta -->

                                        <div class="post-content post-excerpt">
                                            <p class="mx-5"> <?php echo $post_keyword ?></p>

                                            <p><img src="admin/img_upload/<?php echo $image_details ?>" alt=""></p>

                                            <h4 class="bg__white ml-5">Giải thích</h4>
                                            <p class="ml-5"><img src="admin/img_upload/<?php echo $image_explain ?>" alt=""></p>

                                            <blockquote class="mx-4 bg__white">
                                                <?php echo $post_content ?>
                                            </blockquote>
                                        </div><!-- .post-excerpt -->
                                    </div><!-- .post-content-wrap -->
                                </article><!-- .hentry -->
                                <?php } } ?>
                            </div><!-- .single-post -->
                        </div><!-- #inner-content -->
                    </div><!-- #site-content -->

                    <div id="sidebar">
                        <div id="inner-sidebar" class="inner-content-wrap">
                            <div class="widget widget_search">
                                <div class="widget-content-wrap">
                                    <form role="search" method="POST" class="search-form style-1">
                                        <input type="text" class="search-field" placeholder="Nhập từ khóa tìm kiếm..." value="" name="search" title="Search for:">
                                        <button type="submit" class="search-submit" title="Search">Tìm kiếm</button>
                                    </form>
                                </div>
                            </div><!-- .widget_search -->


                            <div class="widget widget_recent_news">
                                <div class="widget-title-wrap">
                                    <h2 class="widget-title has-icon"><span class="icon-wrap core-icon-bolt"></span><span>Bài đăng phổ biến</span></h2>
                                </div>

                                <div class="widget-content-wrap">

                                    <ul class="recent-news clearfix">
                                        <?php 
                                            $post_id = $_GET['post'];
                                            if (isset($_POST['search'])) {
                                            $searchKey = $_POST['search'];
                                            $get_posts = "select * from posts WHERE post_title LIKE '%$searchKey%' ";
                                            } 
                                            else {
                                                    $get_posts = "SELECT * FROM posts";
                                                    $searchKey = "";
                                                }
                                                    $run_posts = mysqli_query($con, $get_posts); 
                                                    while ($row_posts = mysqli_fetch_array($run_posts))
                                                    {
                                                         $post_id = $row_posts['post_id'];
                                                        $post_title = $row_posts['post_title'];
                                                        $post_date = $row_posts['post_date'];
                                                        $post_author = $row_posts['post_author'];
                                                        $post_image = $row_posts['post_image'];
                                                        $post_content = $row_posts['post_content'];
                                                        $post_keyword = $row_posts['post_keywords'];
                                                        $image_details = $row_posts['img_details'];
                                                        $image_explain = $row_posts['post_explain'];                                                 
                                            ?>
                                        <li class="clearfix">
                                            <div class="thumb">
                                                <a href="blog-details.php?post=<?php echo $post_id ?>">
                                                    <img src="admin/img_upload/<?php echo $post_image  ?>" class="img__width" alt="Image">
                                                </a>
                                            </div><!-- .thumb -->

                                            <div class="texts">
                                                <h3><a href="blog-details.php?post=<?php echo $post_id ?>"><?php echo $post_title ?></a></h3>
                                                <span class="post-date">
                                                    <span class="entry-date"><?php echo $post_date  ?></span>
                                                </span>
                                            </div><!-- .texts -->
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div><!-- .widget_recent_news -->
                        </div>
                    </div><!-- #sidebar -->
                </div><!-- .col-md-12 -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- #content-wrap -->
</div><!-- #main-content -->


<?php include_once "comment_form.php"; ?>

<?php include_once "footer.php"; ?>