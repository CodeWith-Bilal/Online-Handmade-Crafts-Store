<?php 
    $errors = array(); 

    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'handmade_crafts_prototype');
    // $db = mysqli_connect('localhost', 'Username', 'Password', 'Database');

    if (isset($_POST['Register'])) {
    // receive all input values from the form
    $name = mysqli_real_escape_string($db, $_POST['name']);  
    $email = mysqli_real_escape_string($db, $_POST['email']);  
    $cnic = mysqli_real_escape_string($db, $_POST['cnic']);  
    $study_program = mysqli_real_escape_string($db, $_POST['study_program']);  
    $password = mysqli_real_escape_string($db, $_POST['password']);  
    $about_me = mysqli_real_escape_string($db, $_POST['about_me']);   

    // Validate the image file
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image'];
    } else {
        array_push($errors, "Profile Picture is required");
    }

    // If no errors, proceed with storing data
    if (count($errors) == 0) {
        $target_dir = "uploads/";
        $imageFileType = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));
        $profile_picture = $target_dir . $email . '.' . $imageFileType;
        move_uploaded_file($image["tmp_name"], $profile_picture); 

        $query = "INSERT INTO `users` (`name`, `email`, `cnic`, `study_program`, `password`, `profile_picture`, `about_me`) 
                  VALUES ('$name', '$email', '$cnic', '$study_program', '$password', '$profile_picture', '$about_me')";
        $result = mysqli_query($db, $query);

        if ($result) {
            array_push($errors, "Registered Successfully! You can Login Now!");
        } else {
            echo "Database Connection failed! Contact Admin";
            die("Error in query: " . mysqli_error($db));
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
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Registration </h4>
              </div>
              <div class="card-body">
                <form novalidate="" method="POST" action="register.php" enctype="multipart/form-data" class="needs-validation">
    <div>
        <?php if (count($errors) > 0) : ?>
            <div class="error" style="color:red; background-color:#23dbf4; border-radius:6px; padding:0px 20px;">
                <?php foreach ($errors as $error) : ?>
                    <p>* <?php echo $error ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="FullName">Full Name</label>
            <input id="FullName" type="text" class="form-control" name="name" required placeholder="Full Name" pattern="^[A-Za-z]{3,12}$" title="Name must be 3-12 characters without spaces">
        </div>
        <div class="form-group col-md-6">
            <label for="Email">Email</label>
            <input id="Email" type="email" class="form-control" name="email" placeholder="Your@gmail.com" required>
        </div>
        <div class="form-group col-md-6">
            <label for="cnic">CNIC</label>
            <input id="cnic" type="text" class="form-control" name="cnic" placeholder="1234567890123" pattern="\d{13}" title="CNIC must be 13 digits" required>
        </div>
        <div class="form-group col-md-6">
            <label for="study_program">Study Program</label>
            <select id="study_program" class="form-control" name="study_program" required>
                <option value="">Select Program</option>
                <option>BSCS</option>
                <option>BSIT</option>
                <option>BSSE</option>
                <option>BSDS</option>
                <option>BSMGT</option>
                <option>BSAI</option>
                <option>MCS</option>
                <option>MIT</option>
                <option>ADPCS</option>
                <option>MSCS</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required pattern="(?=.*[A-Z])(?=.*\W).{8,}" title="Password must be at least 8 characters, include an uppercase letter and a special character">
        </div>
        <div class="form-group col-md-6">
            <label>Profile Picture</label>
            <div class="custom-file">
                <input required type="file" name="image" id="image" class="custom-file-input">
                <label class="custom-file-label" for="image">Select Profile Picture!</label>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="about_me">About Me</label>
            <textarea id="about_me" class="form-control" name="about_me" placeholder="Write something about yourself..." required></textarea>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" name="Register" class="btn btn-primary btn-lg btn-block">
            Signup
        </button>
        <button type="reset" name="reset" class="btn btn-warning btn-lg btn-block">
            Clear All
        </button>
    </div>
</form>

              </div>
              <div class="mb-4 text-muted text-center">
                Already Registered? <a href="login.php">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="assets/js/page/auth-register.js"></script>
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>

</html>