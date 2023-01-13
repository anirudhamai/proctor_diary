<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/regform.css">
    <title>Assign</title>
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
    
    //session_start();
    if(isset($_SESSION['msg'])){
        ?>
        <div class="alert"><h3> <?php
        echo $_SESSION['msg'];
        ?></h3></div>  <?php
        unset($_SESSION['msg']);
    }
    ?></h3>

<style>
    .tabul
    {
        background-color: rgb(255, 194, 172);
    }
      table {
    background-color: rgb(255, 238, 232);
    border-collapse: collapse;
    border-style : solid;
    width: 50%;
    margin:auto;
    margin-top: 30px;
    padding-left: 25%;
    padding-right: 25%;
    margin-bottom: 30px;
    font-size: x-large;
  }
  
  th, td {
    text-align: left;
    padding: 10px;
  }
  
  tr:nth-child(even) {background-color: #f2f2f2;}
</style>

<div>
    <h2> Proctor name : 
        <?php  $pname=$_SESSION['pname']; echo $pname;  ?>
    </h2>
</div>
<div class="tabul">
    <table>
        <tr>
            <th>Student Name</th>
            <th>USN</th>
        </tr>
        <?php
            $host="localhost";
            $user="root";
            $password="";
            $db="proctor_diary";
        
            $connect=mysqli_connect($host,$user,"");
            mysqli_select_db($connect,$db);
            //session_start();
            $pid=$_SESSION['p_id'];
            $query="select sname,usn from has where p_id=$pid ";
            $result = mysqli_query($connect, $query);
            if($result)
            {
                while($row=$result->fetch_assoc())
                {

                    $field1name = $row["sname"];
                    $field2name = $row["usn"];
                    echo '<tr> 
                        <td>
                            '.$field1name.'
                        </td> 
                        <td>'
                            .$field2name.
                        '</td> 
                        </tr>';
                }
            }
        ?>
    </table>
</div>
    <div>
        <button><a href="match.php"> Go Back</a> </button>
    </div>

    <div>
    <form action="insert.php" method="POST">
		<div class="container">
			<div class="head1">
                <h3> Please Fill the form with correct details</h3>
            </div>
			<div class="row">
				<div class="col-sm-3">
					<h1></h1>
					<hr class="mb-3">
					<label for="fullname"><b>Full Name of the Student</b></label></br>
					<input class="form-control" id="fullname" type="text" name="fullname" placeholder="Enter full name" required></br>

					<label for="usn"><b>USN</b></label></br>
					<input class="form-control" id="usn"  type="text" name="usn" placeholder="Enter your USN (Integers only)" required></br>

					<input class="btn btn-primary" type="submit" id="assign" name="assign" value="Assign">
				</div>
			</div>
		</div>
	</form>
    </div>
</body>
</html>