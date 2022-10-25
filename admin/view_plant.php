<?php
include "../includes/session.php";
include_once "../classes/planterscontr.class.php";
$planters = new PlantersContr;

$view = $_SESSION['view'];

$row = $planters->viewPlantsById($view);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Mahala M. Mkwepu" />
    <link rel="icon" href="../img/black.png">
    <title>View Plant</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
    <style>
        .widget .panel-body {
            padding: 0px;
        }

        .widget .list-group {
            margin-bottom: 0;
        }

        .widget .panel-title {
            display: inline
        }

        .widget .label-info {
            float: right;
        }

        .widget li.list-group-item {
            border-radius: 0;
            border: 0;
            border-top: 1px solid #ddd;
        }

        .widget li.list-group-item:hover {
            background-color: rgba(86, 61, 124, .1);
        }

        .widget .mic-info {
            color: #666666;
            font-size: 11px;
        }

        .widget .action {
            margin-top: 5px;
        }

        .widget .comment-text {
            font-size: 12px;
        }

        .widget .btn-block {
            border-top-left-radius: 0px;
            border-top-right-radius: 0px;
        }
    </style>
</head>

<body class="vertical light">
    <div class="wrapper">
        <?php include "./nav-side.php"; ?>
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if (isset($msg)) { ?>
                            <div class="alert alert-success text-center fade show mt-3" role="alert">
                                <?php echo $msg; ?>
                            </div>
                        <?php
                        } elseif (isset($msg2)) { ?>
                            <div class="alert alert-danger text-center fade show mt-3" role="alert">
                                <?php echo $msg2; ?>
                            </div>
                        <?php } else {
                        } ?>
                        <div class="col-lg-12">
                            <div class="single-post">
                                <div class="gallery_details">
                                    <img class="float-left mr-3 img-thumbnail img-responsive" style="max-height: 200px;" src="../img/plants/<?php echo $row['image']; ?>" alt="image">
                                    <h3>
                                        <?php echo $row['plant_name']; ?>
                                    </h3>
                                    <ul class="list-unstyled d-flex mt-3 mb-4">
                                        <li> <i class="fe fe-layers fe-16"></i> <?php echo $row['category_name']; ?></li>
                                    </ul>
                                    <p>
                                        <?php echo $row['plant_description']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- .container-fluid -->
        </main>
        <!-- main -->
    </div>
    <!-- .wrapper -->
    <div class="modal fade modal-full" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="display: none;" aria-hidden="true">
        <button aria-label="" type="button" class="close px-2" data-dismiss="modal" aria-hidden="true">
            <span aria-hidden="true">×</span>
        </button>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3> Are you sure you want to log out?</h3>
                    <button aria-label="" type="button" class="btn btn-primary btn-lg mb-2 my-2 my-sm-0" data-dismiss="modal">cancel</button>
                    <a href="logout.php" class="btn btn-danger btn-lg mb-2 my-2 my-sm-0" type="submit">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src='js/jquery.dataTables.min.js'></script>
    <script src='js/dataTables.bootstrap4.min.js'></script>
    <script>
        $('#dataTable-1').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });
    </script>
    <script src="js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
</body>

</html>