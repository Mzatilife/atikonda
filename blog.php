<?php
session_start();
include_once "classes/profilecontr.class.php";
include_once "classes/blogcontr.class.php";
$blog = new BlogContr;
$profile = new ProfileContr;
if (isset($_GET['blog_id'])) {
  $_SESSION['blog_id'] = $_GET['blog_id'];
  header("location:blog-details.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dr Atikonda Blog</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Sub CSS File -->
  <link href="assets/css/style1.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">DR ATIKONDA MTENJE</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="blog.php" class="active">BLOG</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex">
        <a href="https://twitter.com/atimtenje" class="twitter"><i class="bu bi-twitter"></i></a>
        <a href="https://web.facebook.com/atikonda.mtenje" class="facebook"><i class="bu bi-facebook"></i></a>
        <a href="https://www.instagram.com/atikondamkochi/" class="instagram"><i class="bu bi-instagram"></i></a>
        <a href="https://www.linkedin.com/in/atikonda-mtenje-mkochi-62246079" class="linkedin"><i class="bu bi-linkedin"></i></a>
      </div>

    </div>
  </header><!-- End Header -->

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Posts</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="blog.php">Blog</a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
            <?php
            //displaying the data ---------------------------------------------------------------------------------------->
            @$page = $_GET["page"];

            if ($page == "" || $page == "1") {

              $page1 = 0;
            } else {

              $page1 = ($page * 4) - 4;
            }
            if (isset($_GET['cat_id'])) {
              $category_id = $_GET['cat_id'];
              $row = $blog->viewBlogAndCategory($category_id, $page1, 4);
            } else {
              $row = $blog->viewBlogWithLimit($page1, 4);
            }
            $index = 1;
            foreach ($row as $rw) {
              $date = strtotime($rw['date']);
              $comments = $blog->countComments($rw['blog_id']);
            ?>
              <article class="entry">
                <div class="row">
                  <div class="col-md-3 m-auto">
                    <div class="entry-img mb-0">
                      <img src="img/blog/<?php echo $rw['image'] ?>" alt="" class="img-fluid">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h2 class="entry-title mb-0">
                      <a href="blog.php?blog_id=<?php echo $rw['blog_id'] ?>"><?php echo $rw['title'] ?></a>
                    </h2>

                    <div class="entry-meta mb-0">
                      <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <?php echo $rw['author'] ?></li>
                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time datetime="2020-01-01"><?php echo date("M d, Y", $date) ?></time></li>
                      </ul>
                    </div>

                    <div class="entry-content mb-0">
                      <p>
                        <?php echo substr($rw['content'], 0, 100); ?>...
                        <a href="blog.php?blog_id=<?php echo $rw['blog_id'] ?>">Read More</a>
                      </p>
                    </div>
                  </div>
                </div>

              </article><!-- End blog entry -->
            <?php
            }

            if (isset($_GET['cat_id'])) {
              $category_id = $_GET['cat_id'];
              $cout = $blog->countBlogAndCategory($category_id);
            } else {
              $cout = $blog->countBlog();
            }
            $a = $cout / 4;

            $a = ceil($a);
            ?>

            <div class="blog-pagination">
              <ul class="justify-content-center">
                <?php for ($b = 1; $b <= $a; $b++) {  ?>
                  <li class="active"><a href="blog.php?page=<?php echo $b; ?>"><?php echo $b . " "; ?></a></li>
                <?php } ?>
              </ul>
            </div>

          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  <?php
                  $row = $blog->viewCategories();
                  foreach ($row as $rw) {
                    $cat_id = $rw['category_id'];
                    $blogs = $blog->countBlogAndCategory($cat_id);
                  ?>
                    <li><a href="blog.php?cat_id=<?php echo $cat_id ?>" class="text-capitalize"><?php echo $rw['category_name'] ?> <span>(<?php echo $blogs; ?>)</span></a></li>
                  <?php } ?>
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                <?php
                $row = $blog->viewBlogWithLimit(0, 4);
                $index = 1;
                foreach ($row as $rw) {
                  $date = strtotime($rw['date']);
                ?>
                  <div class="post-item clearfix">
                    <img src="img/blog/<?php echo $rw['image'] ?>" width="60px" height="60px" alt="">
                    <h4><a href="index.php?blog_id=<?php echo $rw['blog_id'] ?>"><?php echo $rw['title'] ?></a></h4>
                    <time datetime="2020-01-01"><?php echo date("M d, Y", $date) ?></time>
                  </div>
                <?php } ?>
              </div><!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="credits">
          Designed by <a href="#">DreamCodeMw</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="https://twitter.com/atimtenje" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="https://web.facebook.com/atikonda.mtenje" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/atikondamkochi/" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="https://www.linkedin.com/in/atikonda-mtenje-mkochi-62246079" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main1.js"></script>

</body>

</html>