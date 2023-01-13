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
    border-style: solid;
    border-color: black;

  }
  
  tr:nth-child(even) {background-color: #f2f2f2;}
</style>

<div>
    <h2> Student name : 
        <?php $sname=$_SESSION['fullname']; echo $sname;  ?>
    </h2>
</div>
<div class="tabul">
    <h3 class="head1">Internship Details</h3>
    <table>
        <tr>
            <th>Company Name</th>
            <th>Domain</th>
            <th>No. of weeks Worked </th>
        </tr>
        <?php
            $host="localhost";
            $user="root";
            $password="";
            $db="proctor_diary";
        
            $connect=mysqli_connect($host,$user,"");
            mysqli_select_db($connect,$db);
            //session_start();
            $usn=$_SESSION['usn'];
            $query="select company,twt,Domain from internships where usn=$usn";
            $result = mysqli_query($connect, $query);
            if($result)
            {
                while($row=$result->fetch_assoc())
                {

                    $field1name = $row["company"];
                    $field2name = $row["Domain"];
                    $field3name = $row['twt'];
                    echo '<tr> 
                        <td>
                            '.$field1name.'
                        </td> 
                        <td>'
                            .$field2name.
                        '</td>
                        <td>
                            '.$field3name.'
                        </td>
                        </tr>';
                }
            }
        ?>
    </table>
</div>
    <div>
        <button><a href="login.php"> Go Back</a> </button>
    </div>

    <div>
    <form action="insert.php" method="POST">
		<div class="container">
			<div class="head1">
                <h3> Please Fill the form with correct details about your internships </h3>
            </div>
            <h1></h1>
					<hr class="mb-3">
			<div class="row">
				<div class="col-sm-3">
					<label for="fullname"><b> Name of the Company</b></label></br>
					<input class="form-control" id="fullname" type="text" name="fullname" placeholder="Enter Company name" required></br>

					<label for="dom"><b>Domain</b></label></br>
					<input class="form-control" id="dom"  type="text" name="dom" placeholder="Enter Domain of your work " required></br>

                    <label for="twt"><b> No. of Weeks you worked in the company</b></label></br>
					<input class="form-control" id="twt" type="text" name="twt" placeholder="Enter no. of weeks" required></br>

					<input class="btn btn-primary" type="submit" id="assign" name="assign" value="Assign">
				</div>
			</div>
		</div>
	</form>
    </div>
</body>
</html>