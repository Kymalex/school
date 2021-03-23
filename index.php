
<!DOCTYPE html>
<html>
<head>
	<title>SchoolSystem</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
	</script>
</head>
<body>
	<?php
		require 'authentication/register.php';
	?>

<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"><img src="images/school.png" height="50" height="50"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="landing page.html">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Admin.php">Admin</a>
                  </li>
                  
                   <li class="nav-item">
                    <a class="nav-link" href="Aboutus.html">Contact</a>
                  </li>
                  

                </ul>

                 <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                          <a class="nav-link" href="index.html"><span class="fas fa-sign-in-alt"></span> Login</a>
                        </li>
                 </ul>

                  <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                          <a class="nav-link" href="index.html"><span class="fas fa-sign-in-alt"></span> Signup</a>
                        </li>
                 </ul>

                
              </div>
            </div>
          </nav>
        <br>
        <br>

        <div class="container">
        	<div class="jumbotron">
        		<div class="row">
        			<div class="col" style="text-align: center;">
        				<h3>Register</h3>
        				<p class="alert alert-<?php
        					if (isset($_GET['registered'])) {
        							# code...
        							echo $_SESSION['classTypeSuccess'];
        							session_unset();
        							session_destroy();
        						}elseif (isset($_GET['notreg'])) {
        							# code...
        							echo $_SESSION['classTypeError'];
        							session_unset();
        							session_destroy();
        						}

        				?>">
        					<?php
        						if (isset($_GET['registered'])) {
        							# code...
        							echo $_SESSION['userRegistered'];
        							session_unset();
        							
        						}elseif (isset($_GET['notreg'])) {
        							# code...
        							echo $_SESSION['notRegistered'];
        							session_unset();
        							session_destroy();
        						}
        						elseif (isset($_GET['WrongCred'])) {
        							# code...
        							echo $_SESSION['userTaken'];
        						}

        					?>
        				</p>

        				<hr style="margin-right: 25px; margin-left: 26px;">
        				<form action="authentication/register.php" method="post">
        					<div class="form-group">
        						<input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
        					</div>
        					<br>
        					<div class="form-group">
        						<input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
        					</div>
        					<br>
        					<div class="form-group">
        						<input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
        					</div>
        					<br>
        					<div class="form-group">
        						<input type="password" name="conpass" id="conpass" class="form-control" placeholder="Confirm password ">
        					</div>
        					<br>
        					<div class="form-group">
				                <label for="role" style="padding: 5px;">Select User Role</label>
				                <select name="role" id="role" class="form-control">
				                    <option></option>
				                     <option value="Admin">Admin</option>
				                     <option value="Student">Student</option>
				                </select>
				              </div>
				        					
        					<br>
        						<div class="row">
        							<div class="col" style="text-align: center;">
        								<input type="submit" name="save" id="save" class="btn btn-success btn-block" value="Create Account">
        							</div>
        						<div class="col" style="text-align: center;">
        							<input type="reset" name="reset" id="reset" class="btn btn-danger btn-block" value="Reset Details">
        						</div>
        					
        				</form>
        			</div>
        			 <div class="col" style="text-align: center;">
        			 	<h3>Login</h3>
        				<hr style="margin-right: 25px; margin-left: 26px;">

        				<form action="authentication/access.php" method="post">
        					<div class="form-group">
        						<input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
        					</div>
        					<br>
        					
        					<div class="form-group">
        						<input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
        					</div>
        					<br>
        					
        					
        						<div class="form-group">
        							<input type="submit" name="Login" class="btn btn-success btn-block" value="Login" >
        						</div>
        					
        				</form>

        		</div>
  
			</div>
        	
        </div>
	
</div>
</body>
</html>