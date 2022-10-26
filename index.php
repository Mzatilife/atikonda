<?php
session_start();
include_once "classes/profilecontr.class.php";
include_once "classes/blogcontr.class.php";
include_once "classes/gallerycontr.class.php";
include_once "classes/manageusercontr.class.php";
$blog = new BlogContr;
$profile = new ProfileContr;
$user = new ManageUserContr;
$gallery = new GalleryContr;
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

  <title>Dr. Atikonda Mtenje-Mkochi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <h1><a href="index.php">DR A. MTENJE</a></h1>

      <h2>
        <div class="hero-container" data-aos="fade-in">
          <p><span class="typed" data-typed-items=" Head of Department for Language and Communication Studies at MUST, CEO of Ati's planters, Linguistics Senior Lecturer, Language Consultant"></span></p>
        </div>
      </h2>

      <nav id="navbar" class="navbar">
        <ul style="background-color:#E26868;">
          <li style="padding: 14px 16px;"><a class="nav-link active" href="#header">HOME</a></li>
          <li><a class="nav-link" href="#about">ABOUT</a></li>
          <li><a class="nav-link" href="#resume">RESUME</a></li>
          <li><a class="nav-link" href="#blog">BLOG</a></li>
          <li><a class="nav-link" href="#gallery">GALLERY</a></li>
          <li><a class="nav-link" href="./shop.php">ATI'S PLANTERS</a></li>
          <li><a class="nav-link" href="#contact">CONTACT</a></li>
          <li style="padding: 14px 16px;"><a class="nav-link" href="./admin/index.php">ADMIN</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="social-links">
        <a href="https://twitter.com/atimtenje" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://web.facebook.com/atikonda.mtenje" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/atikondamkochi/" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.linkedin.com/in/atikonda-mtenje-mkochi-62246079" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <!-- ======= About Me ======= -->
    <div class="about-me container">

      <div class="section-title">
        <h2>Dr. Atikonda Mtenje-Mkochi</h2>
        <p>Learn More</p>
      </div>

      <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
          <img src="assets/img/atikonda.jpeg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3>Linguistics Senior Lecturer &amp; Language Consultant </h3>
          <p>
            My position as a Linguistics lecturer involves the following: teaching linguistics courses at
            the Department of Languages and Literature,conducting research, supervising research dissertations,
            formulating, moderating, administrating, marking assignments and tests,participating in curriculum development activities.
          </p>
          <p>
            I also teach Language and Communication to students that have enrolled in first year at Malawi
            University of Science and Technology. This is to ensure that they have language skills to help them
            through university and beyond.
          </p>
          <p>
            My research interests are in the areas of Bantu and African language studies, phonology and
            morpho-syntax, language description and theory, linguistic variation, the impact of migration
            and languagecontact on languages and child language acquisition, language and development.
          </p>
          <p>
            As a language consultant, I am involved in issues concerning language in Malawi and Africa.
            I also offer language services in translation, interpretation, editing, proofreading, transcription.

          </p>
        </div>
      </div>

    </div><!-- End About Me -->

    <!-- ======= Counts ======= -->
    <div class="counts container">

      <div class="row">

        <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
          <div class="count-box">
            <i class="bi bi-journal-richtext"></i>
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>+ Research Projects</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="bi bi-clock"></i>
            <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1" class="purecounter"></span> </span>
            <p>+ Years Experience</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
          <div class="count-box">
            <i class="bi bi-award"></i>
            <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1" class="purecounter"></span>
            <p>Awards</p>
          </div>
        </div>

      </div>

    </div><!-- End Counts -->

    <!-- ======= Skills  ======= -->
    <div class="skills container">

      <div class="section-title">
        <h2>Top Skills</h2>
      </div>

      <div class="row skills-content" data-aos="fade-up" data-aos-delay="50">

        <div class="col-lg-6">

          <div class="progress">
            <span class="skill">Qualitative Research <i class="val">100%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">Linguistics Analysis<i class="val">90%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">Teaching<i class="val">95%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="progress">
            <span class="skill">Translation <i class="val">90%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">Editing Research <i class="val">90%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="progress">
            <span class="skill">Leadership <i class="val">85%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

        </div>

      </div>

    </div><!-- End Skills -->

    <!-- ======= Interests ======= -->
    <div class="interests container">

      <div class="section-title">
        <h2>Interests</h2>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="80">
        <div class="col-lg-3 col-md-4">
          <div class="icon-box">
            <i class="ri-store-line" style="color: #ffbb2c;"></i>
            <h3>Linguistics</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
            <h3>Research</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
            <h3>Teaching</h3>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-calendar-todo-line" style="color: #31e803;"></i>
            <h3>Leadership.</h3>
          </div>
        </div>
      </div>
    </div><!-- End Interests -->

    <!-- ======= Recent Posts ======= -->
    <!-- <div class="testimonials container">

      <div class="section-title">
        <h2>Recent Posts</h2>
      </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <div class="d-flex align-items-center justify-content-center">
                <a href="#" class="btn btn-success">Read More</a>
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <div class="d-flex align-items-center justify-content-center">
                <a href="#" class="btn btn-success">Read More</a>
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <div class="d-flex align-items-center justify-content-center">
                <a href="#" class="btn btn-success">Read More</a>
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <div class="d-flex align-items-center justify-content-center">
                <a href="#" class="btn btn-success">Read More</a>
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <div class="d-flex align-items-center justify-content-center">
                <a href="#" class="btn btn-success">Read More</a>
              </div>
            </div>
          </div>

        </div>
        <div class="swiper-pagination"></div>
      </div>

      <div class="owl-carousel testimonials-carousel">

      </div>

    </div> -->
    <!-- End Testimonials  -->

  </section><!-- End About Section -->

  <!-- ======= Resume Section ======= -->
  <section id="resume" class="resume">
    <div class="container">

      <div class="section-title">
        <h2>Resume</h2>
        <!-- <p>Check My</p> -->
      </div>

      <div class="row">
        <div class="col-lg-6">
          <h3 class="resume-title">Sumary</h3>
          <div class="resume-item pb-0">
            <h4>Dr. Atikonda Mtenje-Mkochi</h4>
            <p>
              Dr. Atikonda Akuzike Mtenje-Mkochi is a senior lecturer in Linguistics
              and Communication and Head of Language and Communications
              department at Malawi University of Science and Technology (MUST).
              Prior to joining MUST, she was a linguistics lecturer at Mzuzu University
              where she also served as acting deputy dean for the Faculty of
              Humanities and Social Sciences. She holds a PhD, MA and BA
              (honours) in Linguistics from University of Cape Town. She also has a
              Bachelor of Arts (Humanities) degree from Chancellor College of the
              University of Malawi.
            </p>
            <p>
              Her PhD work focussed on the phonology and morpho-syntax of the
              minority language varieties of Cisukwa, Cindali and Cilambya. Dr.
              Mtenje-Mkochi has also been a visiting scholar at the School of Oriental
              and African Studies of University of London. She was a recipient of the
              following scholarship awards: Lestrade scholarship, NRF grantholder
              award and the Harry Oppenheimer Institute scholarship. She is at the
              moment a scholar in the Innovation Scholars Programme held in
              collaboration with MUST and Michigan State University and USAID.
            </p>
            <p>
              Her research interests are in phonology, morpho-syntax and
              micro-variation of Bantu languages. She has published a book, a monograph,
              journal articles and book chapters in these areas. She has
              presented academic papers at local and international conferences. Dr.
              Atikonda Mtenje-Mkochi is also interested in investigating how
              languages particularly African languages can be effectively used for
              national, regional and global development. She is currently working on
              phonological and morpho-syntactic micro-variation patterns of closely
              related languages and language varieties in Malawi. She is also working
              on a project which is reinventing Malawian folktales for environment
              and climate change communication.

            </p>
            <p>
              Dr. Atikonda Mtenje-Mkochi also does consultancy work for institutions
              and organisations as a translator, editor, proof reader, transcriber and
              module developer.
            </p>
          </div>

          <h3 class="resume-title">Education</h3>
          <div class="resume-item">
            <h4>Doctor of Philosophy - PhD, Linguistics</h4>
            <h5>2013 - 2016</h5>
            <p><em>University of Cape Town, South Africa</em></p>
          </div>
          <div class="resume-item">
            <h4>Master of Arts, Linguistics</h4>
            <h5>2010 - 2011</h5>
            <p><em>University of Cape Town, South Africa</em></p>
          </div>
          <div class="resume-item">
            <h4>Bachelor of Arts Honors, Linguistics</h4>
            <h5>2009 - 2010</h5>
            <p><em>University of Cape Town, South Africa</em></p>
          </div>
          <div class="resume-item">
            <h4>Bachelor of Arts, Humanities (Linguistics major)</h4>
            <h5>2001 - 2005</h5>
            <p><em>University of Malawi, Malawi</em></p>
          </div>
        </div>
        <div class="col-lg-6">
          <h3 class="resume-title">Professional Experience</h3>
          <div class="resume-item">
            <h4>Linguistics Senior Lecturer &amp; Head of Department for Language and Communication Studies</h4>
            <h5>2018 - Present</h5>
            <p><em>MUST, Thyolo, Malawi </em></p>
            <p>
            <ul>
              <li>Teaching Linguistics Courses at the Department of Languages and Literature,</li>
              <li>Conducting Research</li>
              <li>Supervising Fouth Year Research Dissertations</li>
              <li>Formulating, Moderating, Administrating, Marking Assignments and Tests</li>
              <li>Participating in Curriculum Development Activities</li>
            </ul>
            </p>
          </div>
          <div class="resume-item">
            <h4>Senior Lecturer</h4>
            <h5>2011 - 2018</h5>
            <p><em>Mzuzu University, Mzuzu, Malawi</em></p>
            <p>
            <ul>
              <li>Teaching Linguistics Courses at the Department of Languages and Literature,</li>
              <li>Conducting Research</li>
              <li>Formulating, Moderating, Administrating, Marking Assignments and Tests</li>
              <li>Participating in Curriculum Development Activities</li>
            </ul>
            </p>
          </div>
          <div class="resume-item">
            <h4>Visiting Research Scholar</h4>
            <h5>2014 - 2014</h5>
            <p><em>London, United Kingdom</em></p>
            <p>
              As a research scholar at SOAS i examined morpho-syntactic variation in Cisukwa, Cindali and Cilambya.
              Among other things, I presented a paper titled Noun class system micro-variation:
              A Case Study of Cisukwa, Cindali and Cilambya at the International workshop on Bantu languages: Studies in East African Bantu and micro-variation at SOAS.
            </p>
          </div>
          <div class="resume-item">
            <h4>Assistant Lecturer</h4>
            <h5>2010 - 2011</h5>
            <p><em>University of Cape Town, South Africa</em></p>
          </div>
          <div class="resume-item">
            <h4>Staff Associate in Linguistics</h4>
            <h5>2006 - 2009</h5>
            <p><em>Mzuzu University, Mzuzu, Malawi</em></p>
          </div>
          <h3 class="resume-title">PhD Candidate</h3>
          <div class="resume-item pb-0">
            <h4>February 2013 - December 2016</h4>
            <p>
              My PhD thesis is titled A comparative analysis of the phonology and
              morphosyntax of Cisukwa, Cindali and Cilambya. I examined the
              internal and external relationship of these varieties and concluded that
              three varieties are on a dialect continuum with Cisukwa and Cindali
              being closer than they are with Cilambya. I further argued that the
              variations that exist in the three varieties are mostly in their phonology
              and not largely in their morphology and syntax. University of London
              (School of Oriental and African Studies)
            </p>
          </div>
          <div class="pb-0 text-center">
            <?php
            $row = $user->viewCV();
            ?>
            <a href="./img/CVs/<?php echo $row['cv'] ?>" class="btn btn-dark">Download CV</a>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Resume Section -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">

      <div class="section-title">
        <h2>Services</h2>
        <p>My Services</p>
      </div>

      <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="icon-box">
            <div class="icon"><i class="bx bxl-dribbble"></i></div>
            <h4><a href="">Lorem Ipsum</a></h4>
            <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4><a href="">Sed ut perspiciatis</a></h4>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-tachometer"></i></div>
            <h4><a href="">Magni Dolores</a></h4>
            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4><a href="">Nemo Enim</a></h4>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-slideshow"></i></div>
            <h4><a href="">Dele cardo</a></h4>
            <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-arch"></i></div>
            <h4><a href="">Divera don</a></h4>
            <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Gallery Section ======= -->
  <section id="gallery" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>Gallery</h2>

      </div>
      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <?php
            $row = $gallery->viewCategories();
            $index = 1;
            foreach ($row as $rw) {
            ?>
              <li data-filter=".filter-<?php echo $rw['category_name'] ?>"><?php echo $rw['category_name'] ?></li>
            <?php } ?>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container">
        <?php
        $row = $gallery->viewgallery();
        foreach ($row as $rw) {
        ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $rw['category_name'] ?>">
            <div class="portfolio-wrap">
              <img src="./img/gallery/<?php echo $rw['image'] ?>" class="img-fluid" alt="">
              <div class="portfolio-info">
                <div class="portfolio-links">
                  <h4><?php echo $rw['event'] ?></h4>
                  <p><?php echo $rw['caption'] ?></p>
                  <a href="./img/gallery/<?php echo $rw['image'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox"><i class="bx bx-plus"></i></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>

      </div>

    </div>
  </section><!-- End Gallery Section -->

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
              <div class="row mb-3">
                <div class="col-md-4">
                  <div class="entry-img">
                    <img src="img/blog/<?php echo $rw['image'] ?>" alt="" class="img-fluid">
                  </div>
                </div>
                <div class="col-md-8">
                  <h2 class="entry-title">
                    <a href="index.php?blog_id=<?php echo $rw['blog_id'] ?>"><?php echo $rw['title'] ?></a>
                  </h2>

                  <div class="entry-meta">
                    <div class="row mb-2">
                      <div class="col-md-4"><i class="bi bi-person"></i> <?php echo $rw['author'] ?></div>
                      <div class="col-md-4"><i class="bi bi-clock"></i> <?php echo date("M d, Y", $date) ?></div>
                    </div>
                  </div>

                  <div class="entry-content">
                    <?php echo substr($rw['content'], 0, 100); ?>...
                    <div class="read-more">
                      <a href="index.php?blog_id=<?php echo $rw['blog_id'] ?>">Read More</a>
                    </div>
                  </div>
                </div>
              </div>
            </article><!-- End blog entry -->
            <hr>

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
          <div class="blog-pagination mt-3">
            <ul class="justify-content-center row" style="list-style-type: none;">
              <?php for ($b = 1; $b <= $a; $b++) {  ?>
                <li class="col"><a href="index.php?page=<?php echo $b; ?>" class="btn btn-success"><?php echo $b . " "; ?></a></li>
              <?php } ?>
            </ul>
          </div>

        </div><!-- End blog entries list -->

        <div class="col-lg-4">

          <div class="sidebar">

            <h3 class="sidebar-title">Categories</h3>
            <div class="sidebar-item categories">
              <ul style="list-style-type: none;">
                <?php
                $row = $blog->viewCategories();
                foreach ($row as $rw) {
                  $cat_id = $rw['category_id'];
                  $blogs = $blog->countBlogAndCategory($cat_id);
                ?>
                  <li>
                    <a href="blog.php?cat_id=<?php echo $cat_id ?>" class="text-capitalize"><?php echo $rw['category_name'] ?> <span>(<?php echo $blogs; ?>)</span></a>
                  </li>
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
                <div class="post-item clearfix row mb-3">
                  <div class="col-3">
                    <img src="img/blog/<?php echo $rw['image'] ?>" width="100%" height="60px" alt="">
                  </div>
                  <div class="col-9">
                    <h5><a href="index.php?blog_id=<?php echo $rw['blog_id'] ?>"><?php echo $rw['title'] ?></a></h6>
                      <time datetime="2020-01-01"><?php echo date("M d, Y", $date) ?></time>
                  </div>
                </div>
              <?php } ?>

            </div><!-- End sidebar recent posts-->

          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

    </div>
  </section><!-- End Blog Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Me</p>
      </div>

      <div class="row mt-2">

        <div class="col-md-6 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-map"></i>
            <h3>Location</h3>
            <p>Zomba, Malawi</p>
          </div>
        </div>

        <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-share-alt"></i>
            <h3>Social Media</h3>
            <div class="social-links">
              <a href="https://twitter.com/atimtenje" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="https://web.facebook.com/atikonda.mtenje" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="https://www.instagram.com/atikondamkochi/" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="https://www.linkedin.com/in/atikonda-mtenje-mkochi-62246079" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <a href="mailto:atimtenje@gmail.com">
              <i class="bx bx-envelope"></i>
              <h3>Email</h3>
              <p>atimtenje@gmail.com</p>
            </a>
          </div>
        </div>
        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <a href="https://wa.me/0885561882">
              <i class="bx bx-phone-call"></i>
              <h3>Call / Whatsapp</h3>
              <p>+265 885 561 882</p>
            </a>
          </div>
        </div>
      </div>

      <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4">
        <div class="row">
          <div class="col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
          </div>
          <div class="col-md-6 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
          </div>
        </div>
        <div class="form-group mt-3">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
        </div>
        <div class="form-group mt-3">
          <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
        </div>
        <div class="my-3">
          <div class="loading">Loading</div>
          <div class="error-message"></div>
          <div class="sent-message">Your message has been sent. Thank you!</div>
        </div>
        <div class="text-center"><button type="submit">Send Message</button></div>
      </form>

    </div>
  </section><!-- End Contact Section -->

  <div class="credits">
    Designed by <a href="https://dreamcodemw.com">DreamCodeMw</a>
  </div>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!--Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>