<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match</title>
    <link rel="stylesheet" type="text/css" href="css/office.css">

</head>
<body>
    <div class="officetitle">
        <h2>Assign Proctors their Proctee Students </h2>
    </div>
    <div class="form">
        <h2 class="p1">Enter the proctor's Name & P_id to see their proctees</h2>
        <form action="match.php" method="POST">
            <label for="pname"><b class="formlable">Full Name</b></label></br>
			<input class="form-control" id="pname" type="text" name="pname" placeholder="Enter the full name" required></br>

            <label for="pid"><b class="formlable">Enter P id : </b></label></br>
			<input  id="pid" type="text" name="pid" placeholder="Enter P_id of proctor" required></br>

            <input type="submit" id="match" name="btn" value="Click here">
        </form>
        <?php
            if(isset($_POST['btn'])){
                session_start();
                $_SESSION['p_id']=$_POST['pid'];
                $_SESSION['pname']=$_POST['pname'];
                header("Location:assign.php");
            }
        ?>
    </div>
</body>
</html>
