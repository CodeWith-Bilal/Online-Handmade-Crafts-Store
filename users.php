<?php 
    $errors = array();  

    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'handmade_crafts_prototype');
    // $db = mysqli_connect('localhost', 'Username', 'Password', 'Database');
 
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
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4>User Page</h4>
              </div>
              <div class="card-body">
                <nav class="navbar" style="background-color: #4CAF50; padding: 15px;">
                  <div class="container-fluid">
                    <a class="navbar-brand text-white" href="#" style="font-size: 25px; font-weight: bold;">Online Store</a>
                    <ul class="nav" style="gap: 18px;">
                      <li class="nav-item">
                        <a class="nav-link nav-a" href="index.php">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link nav-a" href="users.php">Registered User</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link nav-a" href="register.php">Register</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link nav-a" href="login.php">Login</a>
                      </li> 
                    </ul>
                  </div>
                </nav> 
                  <div class="row">
                            <div class="col-lg-12 mb-4">
                                <div class=" shadow mb-4">                    
                                    <div class="card-body">
                                        <h4 style="color:#1f1fd4;">Registered Users</h4>
                                        <div class="table-responsive">
                                        <?php
                                            $query = "SELECT * FROM `users` ";
                                            $result = mysqli_query($db, $query);  
                                            echo '<table class="table table-bordered">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">Name</th> 
                                                        <th scope="col">Email</th> 
                                                        <th scope="col">CNIC</th> 
                                                        <th scope="col">Study Program</th> 
                                                        <th scope="col">Profile Picture</th> 
                                                        <th scope="col">About Me</th> 
                                                        <th scope="col">Registration Date</th>   
                                                      </tr>
                                                    </thead>
                                                    <tbody>';

                                            while ($user = mysqli_fetch_assoc($result)) {
                                                $Name = $user['name']; 
                                                $Email = $user['email']; 
                                                $CNIC = $user['cnic']; 
                                                $StudyProgram = $user['study_program']; 
                                                $ProfilePicture = $user['profile_picture']; 
                                                $AboutMe = $user['about_me'];  
                                                $CreatedAt = $user['created_at'];  

                                                echo '<tr> 
                                                        <td>'.$Name.'</td>
                                                        <td>'.$Email.'</td>
                                                        <td>'.$CNIC.'</td>
                                                        <td>'.$StudyProgram.'</td>
                                                        <td><img src="'.$ProfilePicture.'" alt="Profile" width="50"></td>
                                                        <td>'.$AboutMe.'</td>
                                                        <td>'.$CreatedAt.'</td>    
                                                      </tr>';
                                            }
                                            echo '</tbody>
                                                  </table>';
                                        ?>
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>
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
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>
</body>

</html>