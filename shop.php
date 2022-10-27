<?php
session_start();
include_once "classes/profilecontr.class.php";
include_once "classes/planterscontr.class.php";
$planters = new PlantersContr;
$profile = new ProfileContr;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Ati's Planter</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="asset/style.css">

</head>

<body>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- ***** Top Header Area ***** -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="top-header-content d-flex align-items-center justify-content-between">
                            <!-- Top Header Content -->
                            <div class="top-header-meta">
                                <a href="./index.php" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-arrow-left" aria-hidden="true"></i> <span>Back</span></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(./assets/img/flowers.jpg);">
            <h2>Ati's Planters</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./index.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ati's Planters</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shop Area Start ##### -->
    <section class="shop-page section-padding-0-100">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area -->
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop-sidebar-area">
                        <!-- Shop Widget -->
                        <div class="shop-widget catagory mb-50">
                            <h4 class="widget-title">Categories</h4>
                            <div class="widget-desc">
                                <!-- Single Checkbox -->
                                <?php
                                $row = $planters->viewCategories();
                                foreach ($row as $rw) {
                                    $cat_id = $rw['category_id'];
                                    $blogs = $planters->countPlantsAndCategory($cat_id);
                                ?>
                                    <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                        <a href="shop.php?cat_id=<?php echo $cat_id ?>" class="text-capitalize"><label class="custom-control-label" for="customCheck1"><?php echo $rw['category_name'] ?> <span class="text-muted">(<?php echo $blogs; ?>)</span></label></a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- All Products Area -->
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop-products-area">
                        <div class="row">
                            <?php
                            //displaying the data ---------------------------------------------------------------------------------------->
                            @$page = $_GET["page"];

                            if ($page == "" || $page == "1") {

                                $page1 = 0;
                            } else {

                                $page1 = ($page * 9) - 9;
                            }
                            if (isset($_GET['cat_id'])) {
                                $category_id = $_GET['cat_id'];
                                $row = $planters->viewPlantsAndCategory($category_id, $page1, 9);
                            } else {
                                $row = $planters->viewPlantsWithLimit($page1, 9);
                            }
                            $index = 1;
                            foreach ($row as $rw) {
                            ?>
                                <!-- Single Product Area -->
                                
                                
                                <section id="portfolio" class="portfolio-area">
      
                                    <div class="container">
                                        
                                        <div class="row portfolio">
                                        
                                        <div class="col-sm-12 col-md-3 T-Shirt">
                                            <div class="single-portfolio">
                                                <a href="./img/plants/<?php echo $rw['image'] ?>"
                                                        class="image-link" >
                                                <img src="./img/plants/<?php echo $rw['image'] ?>">
                                                </a>
                                            </div>
                                            <div class="product-info mt-15 text-center">
                                                    <p><?php echo $rw['plant_description'] ?></p>
                                                
                                                    <h6><?php echo $rw['plant_name'] ?></h6>
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                </section>
                            <?php
                            }

                            if (isset($_GET['cat_id'])) {
                                $category_id = $_GET['cat_id'];
                                $cout = $planters->countPlantsAndCategory($category_id);
                            } else {
                                $cout = $planters->countPlants();
                            }
                            $a = $cout / 9;

                            $a = ceil($a);
                            ?>
                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <?php for ($b = 1; $b <= $a; $b++) {  ?>
                                    <li class="page-item"><a class="page-link" href="./shop.php?page=<?php echo $b; ?>"><?php echo $b . " "; ?></a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area bg-img" style="background-image: url(img/bg-img/3.jpg);">
        <!-- Footer Bottom Area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="border-line"></div>
                    </div>
                    <!-- Copywrite Text -->
                    <div class="col-12 col-md-6">
                        <div class="copywrite-text">
                            <p> Developed by <a target="_blank" href="https://dreamcodemw.com">dreamcodemw</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="asset/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="asset/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="asset/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="asset/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="asset/js/active.js"></script>
</body>

</html>