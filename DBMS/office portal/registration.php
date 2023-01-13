
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
                <h2>Welcome!! </h2>
            </div>
			<div class="row">
				<div class="col-sm-3">
					<h1>Sign Up </h1>
					<hr class="mb-3">
					<label for="name"><b>Username</b></label></br>
					<input id="name" type="text" name="name" placeholder="Enter your username" required></br>

					<label for="password"><b>Password</b></label></br>
					<input id="password"  type="password" name="password" required></br>
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