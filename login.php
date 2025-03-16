<?php 
    $errors = array();  

    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'handmade_crafts_prototype');
    // $db = mysqli_connect('localhost', 'Username', 'Password', 'Database');

    if (isset($_POST['login_user'])) {
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $Password = mysqli_real_escape_string($db, $_POST['Password']);

      if (empty($email)) {
        array_push($errors, "email is required");
      }
      if (empty($Password)) {
        array_push($errors, "Password is required");
      }

      if (count($errors) == 0) {
        $query = "SELECT * FROM `users` WHERE `email`='$email' AND `Password`='$Password' ";
        $results = mysqli_query($db, $query);
        $users = mysqli_fetch_assoc($results);

        if ($users) {
             header('location: users.php');
        }else {
            array_push($errors, "Wrong email OR Password!");
        }
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>Online Handmade Crafts Store</title>
        <link rel='shortcut icon' type='image/x-icon' href='images/favicon.png' /> 
        <!-- General CSS Files -->
        <link rel="stylesheet" href="assets/css/app.min.css">
        <link rel="stylesheet" href="assets/bundles/fullcalendar/fullcalendar.min.css">
        <!-- Template CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/components.css">
        <!-- Custom style CSS -->
        <link rel="stylesheet" href="assets/css/custom.css">
        <link rel="stylesheet" href="style.css">

    </head><body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="login.php" class="needs-validation" novalidate="">
                    <div style="color:red; background-color:white; border-radius:6px; padding:0px 20px;">
                        <?php  if (count($errors) > 0) : ?>
                          <div class="error" style="text-color:red; background-color:#23dbf4; border-radius:6px; padding:0px 20px;">
                            <?php foreach ($errors as $error) : ?>
                              <p>* <?php echo $error ?></p> 
                            <?php endforeach ?>
                          </div>
                        <?php  endif ?>
                    </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="text" class="form-control" name="email" required autofocus>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="Password" required>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox"> 
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" name="login_user">
                      Login
                    </button>
                    <button type="reset" name="reset" class="btn btn-warning btn-lg btn-block">
                        Clear All
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
               Don't have an account? <a href="register.php">Create One</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>

</html>