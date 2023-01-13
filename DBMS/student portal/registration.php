
<!DOCTYPE html>
<html>
<head>
	<title> Sign up! </title>
	<link rel="stylesheet" type="text/css" href="css/regform.css">
</head>
<style>
      .alert
  {
    border-radius: 10px;
    border-style: dashed;
    border-color: orange;
    border-width: 3px;
    background-color: lightgreen;
    color: blue;
  }
</style>
<body>
    <?php 
    session_start();
    if(isset($_SESSION['error'])){
    ?>
    <div class="alert"><h3> <?php
    echo $_SESSION['error'];
    ?></h3></div>  <?php
    unset($_SESSION['error']);
    } 
    ?></h3>
<div>
	<form action="new.php" method="POST">
		<div class="container">
			<div class="head1">
                <h3>Welcome dear student, Please Fill the form with correct details</h3>
            </div>
			<div class="row">
				<div class="col-sm-3">
					<h1>Sign Up </h1>
					<hr class="mb-3">
					<label for="fullname"><b>Full Name</b></label></br>
					<input class="form-control" id="fullname" type="text" name="name" placeholder="Enter your full name" required></br>

					<label for="usn"><b>USN</b></label></br>
					<input class="form-control" id="usn"  type="text" name="usn" placeholder="Enter your USN (Integers only)" required></br>

					<label for="branch"><b>Branch</b></label></br>
					<input class="form-control" id="branch"  type="text" name="branch" placeholder="Enter in short form. For ex: ISE" required></br>
                    
					<label for="password"><b>Password</b></label></br>
					<input class="form-control" id="password"  type="password" name="password" required></br>
					<hr class="mb-3">
					<input class="btn btn-primary" type="submit" id="register" name="create" value="Sign Up">
				</div>
			</div>
		</div>
	</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</body>
</html>