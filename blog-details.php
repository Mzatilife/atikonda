<?php
session_start();
include_once "classes/profilecontr.class.php";
include_once "classes/blogcontr.class.php";
$blog = new BlogContr;
$profile = new ProfileContr;
$blog_id = $_SESSION['blog_id'];

$row = $blog->viewBlogById($blog_id);
$date = strtotime($row['date']);

$comments = $blog->countComments($blog_id);

if (isset($_POST['comment'])) {
  //********************** */ Validating the data and sanitising it ******************************
  function TestInput($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $name = TestInput($_POST['name']);
  $email = TestInput($_POST['email']);
  $comment = TestInput($_POST['details']);

  $result = $blog->commentBlog($blog_id, $name, $email, $comment);

  if ($result) {
    $msg = "Comment submitted";
  } else {
    $msg2 = "Error, couldn't submit comment";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dr Atikonda Blog Details</title>
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
          <h2>Blog Details</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li><?php echo $row['title'] ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="img/blog/<?php echo $row['image'] ?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <?php echo $row['title'] ?>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-person"></i><?php echo $row['author'] ?></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time datetime="2020-01-01"><?php echo date("M d, Y", $date) ?></time></li>
                </ul>
              </div>

              <div class="entry-content">
                <?php echo $row['content'] ?>
              </div>

              <div class="entry-footer">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="#"><?php echo $row['category_name'] ?></a></li>
                </ul>
              </div>

            </article><!-- End blog entry -->

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
                    <h4><a href="index.php?blog_id=<?php echo $rw['blog_id'] ?>"><?php echo $rw['title'] ?>...</a></h4>
                    <time datetime="2020-01-01"><?php echo date("M d, Y", $date) ?></time>
                  </div>
                <?php } ?>
                <div class="more_posts">
                  <a href="blog.php">More</a>
                </div>
              </div><!-- End sidebar recent posts-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->

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

  <!-- Sub JS File -->
  <script src="assets/js/main1.js"></script>

</body>

</html>