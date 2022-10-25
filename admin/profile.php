<?php
include "../includes/session.php";
include_once "../classes/manageusercontr.class.php";
$user = new ManageUserContr;
if (isset($_POST['save'])) {
  function TestInput($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $old_password = TestInput($_POST['oldPass']);
  $new_password = TestInput($_POST['newPass']);
  $conf_password = TestInput($_POST['conPass']);

  if ($new_password != $conf_password) {
    $msg = "The two passwords did not match!";
  } elseif ($old_password == $new_password) {
    $msg = "New password can’t be the same as a previous password!";
  } else {
    // passing information
    $msg = $user->changePassword($user_id, $old_password, $new_password);
  }
}


if (isset($_POST['upload_cv'])) {
  $cv = $_FILES['cv']['name'];
  $cv_tmp = $_FILES['cv']['tmp_name'];

  move_uploaded_file($cv_tmp, "../img/CVs/$cv");

  $msg = $user->verifyCV($cv);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="Mahala M. Mkwepu" />
  <link rel="icon" href="../img/black.png">
  <title>Profile</title>
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
  <script type="text/javascript">
    function checkPass() {
      //Store the password field objects into variables ...
      var password = document.getElementById('password2');
      var confirm = document.getElementById('confirm2');
      //Set the colors we will be using ...
      var good_color = "#66cc66";
      var bad_color = "#ff6666";
      if (password.value == confirm.value) {
        confirm.style.backgroundColor = good_color;
      } else {
        confirm.style.backgroundColor = bad_color;
      }
    }
  </script>
</head>

<body class="vertical light">
  <div class="wrapper">
    <?php include "./nav-side.php"; ?>
    <main role="main" class="main-content">
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-10 col-xl-8">
            <h2 class="h3 mb-4 page-title">Settings</h2>
            <?php
            if (isset($msg)) { ?>
              <div class="alert alert-info text-center fade show mt-3" role="alert">
                <?php echo $msg; ?>
              </div>
            <?php
            } ?>
            <div class="my-4">
              <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Upload CV</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Change Password</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="alert alert-info fade show mt-3" role="alert">
                    <?php
                    $row = $user->viewCV();

                    $date = strtotime($row['upload_on']);
                    $date = date("d F Y, h:i a", $date);

                    echo "Curriculum vitae, last updated on " . $date;
                    ?>
                  </div>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                      <!-- .col -->
                      <div class="col-md-12 form-group mb-3">
                        <label for="customFile">Curriculum Vitae <span class="text-danger">*</span></label>
                        <div class="custom-file">
                          <input type="file" name="cv" class="custom-file-input" id="customFile" required>
                          <label class="custom-file-label" for="customFile">upload cv</label>
                        </div>
                        <div class="valid-feedback"> Looks good! </div>
                        <div class="invalid-feedback"> Please upload CV! </div>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <button type="submit" name="upload_cv" class="btn btn-info">upload CV</button>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="row mb-4">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="inputPassword4">Old Password</label>
                          <input type="password" name="oldPass" class="form-control" id="inputPassword5" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword5">New Password</label>
                          <input type="password" name="newPass" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="password2" onkeyup="checkPass();" required>
                        </div>
                        <div class="form-group">
                          <label for="inputPassword6">Confirm Password</label>
                          <input type="password" name="conPass" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="confirm2" onkeyup="checkPass();" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <p class="mb-2">Password requirements</p>
                        <p class="small text-muted mb-2"> To create a new password, you have to meet all of the following requirements: </p>
                        <ul class="small text-muted pl-4 mb-0">
                          <li> Minimum 8 character </li>
                          <li>At least one special character</li>
                          <li>At least one number</li>
                          <li>Can’t be the same as a previous password </li>
                        </ul>
                      </div>
                    </div>
                    <button type="submit" name="save" class="btn btn-info">Save Change</button>
                  </form>
                </div>
              </div>
            </div> <!-- /.card-body -->
          </div> <!-- /.col-12 -->
        </div> <!-- .row -->
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

  <script type="application/javascript">
    $('input[type="file"]').change(function(e) {
      var fileName = e.target.files[0].name;
      $('.custom-file-label').html(fileName);
    });
  </script>
</body>

</html>