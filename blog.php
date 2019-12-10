<?php 
include_once "header.php"; 
?>
<div id="main-content" class="site-main clearfix">
    <div id="content-wrap" class="content__wrapper">
        <div class="container">
            <div id="sidebar" class="py-5">
                <form class="d-flex search__form" method="POST">
                    <input type="text" name="searchKey" class="form-control box__search" placeholder="Nhập từ khóa tìm kiếm...">
                    <button type="submit" class="search-submit"></button>
                </form>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="site-content" class="site-content clearfix">
                        <div id="inner-content" class="inner-content-wrap">
                            <div class="cbr-news-grid blog-grid" data-column="3" data-column2="2" data-column3="2" data-column4="1" data-gaph="18" data-gapv="18">
                                <div id="news-wrap" class="cbp">
                                    <?php
                                    include_once "connection.php";
                                     if (isset($_POST['searchKey'])) {
                                            $searchKey = $_POST['searchKey'];
                                            $get_posts = "select * from posts WHERE post_title LIKE '%$searchKey%' ";
                                            } 
                                            else {
                                                $get_posts = "select * from posts";
                                                $searchKey = "";
                                            }
                                    $run_posts = mysqli_query($con,$get_posts); 
                                    while ($row_posts = mysqli_fetch_array($run_posts))
                                    {
                                        $post_id = $row_posts['post_id'];
                                        $post_title = $row_posts['post_title'];
                                        $post_date = $row_posts['post_date'];
                                        $post_author = $row_posts['post_author'];
                                        $post_image = $row_posts['post_image'];
                                        $post_content = $row_posts['post_content'];
		
                                    ?>
                                    <div class="cbp-item all">
                                        <article class="hentry">
                                            <div class="post-media clearfix">
                                                <a href="blog-details.php?post=<?php echo $post_id ?>">
                                                    <img src="admin/img_upload/<?php echo $post_image ?>" alt="Image">
                                                </a>
                                            </div><!-- .post-media -->

                                            <div class="post-content-wrap">
                                                <h2 class="post-title">
                                                    <span>
                                                        <a href="blog-details.php?post=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                                                    </span>
                                                </h2><!-- .post-title -->

                                                <div class="post-content post-excerpt"></div><!-- .post-excerpt -->
                                                <div class="post-meta">
                                                    <div class="post-meta-content">
                                                        <div class="post-meta-content-inner">
                                                            <span class="post-by-author item">
                                                                <span class="inner">By:
                                                                    <a href="blog-details.php?post=<?php echo $post_id ?>" title="" rel="author"><?php echo $post_author ?></a>
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
                                            </div><!-- .post-content-wrap -->
                                        </article><!-- .hentry -->
                                    </div><!-- .cbp-item -->
                                    <?php } ?>
                                </div><!-- #portfolio -->
                            </div>
                        </div><!-- #inner-content -->
                    </div><!-- #site-content -->
                </div><!-- .col-md-12 -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- #content-wrap -->
</div><!-- #main-content -->

<?php include_once "footer.php"; ?>