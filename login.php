<?php 
    $errors = array();  

    // Connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'handmade_crafts_prototype');

    if (isset($_POST['login_user'])) {
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $Password = mysqli_real_escape_string($db, $_POST['Password']);

        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($Password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $query = "SELECT * FROM `users` WHERE `email`='$email' AND `Password`='$Password'";
            $results = mysqli_query($db, $query);
            $users = mysqli_fetch_assoc($results);

            if ($users) {
                header('location: users.php');
            } else {
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

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="loader"></div>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                    <div class="bg-white shadow rounded p-4 mt-5">
                        <h4 class="text-center mb-4 text-dark">Login</h4>
                        <form method="POST" action="login.php" class="needs-validation" novalidate="">

                            <!-- Display Errors -->
                            <?php if (count($errors) > 0) : ?>
                                <div class="mb-3 p-2 bg-danger text-white rounded">
                                    <?php foreach ($errors as $error) : ?>
                                        <p class="mb-0">* <?php echo $error ?></p>
                                    <?php endforeach ?>
                                </div>
                            <?php endif ?>

                            <!-- Email Input -->
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="text" class="form-control" name="email" required autofocus>
                            </div>

                            <!-- Password Input -->
                            <div class="form-group mt-3">
                                <label for="password" class="control-label">Password</label>
                                <input id="password" type="password" class="form-control" name="Password" required>
                            </div>

                            <!-- Form Buttons -->
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary btn-block" name="login_user">Login</button>
                                <button type="reset" class="btn btn-warning btn-block mt-2">Clear All</button>
                            </div>
                        </form>
                    </div>

                    <!-- Registration Link -->
                    <div class="mt-5 text-muted text-center">
                        Don't have an account? <a href="register.php">Create One</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

<!-- JS Scripts -->
<script src="assets/js/app.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
