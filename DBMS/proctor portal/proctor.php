<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/office.css">
    <title>Meets</title>
</head>
<body>
<div class="officetitle">
    <h2>Scheduled Proctor meets : </h2>
</div>
<div>
    <table>
        <tr>
            <th>Sl.no</th>
            <th>Date</th>
            <th>Outcome</th>
        </tr>
        <?php
            $host="localhost";
            $user="root";
            $password="";
            $db="proctor_diary";
        
            $connect=mysqli_connect($host,$user,"");
            mysqli_select_db($connect,$db);
            
            session_start();
            $pid=$_SESSION['pid'];
            
            $currentDate = strtotime(date('Y-m-d'));
            $query="select Sl,date,outcomes from meets where pid=$pid order by Sl ";
            $result = mysqli_query($connect, $query);
            $query1="select date from meets where pid='$pid' order by date ";
            $result1 = mysqli_query($connect, $query1);
            $row1=$result1->fetch_assoc();

            if($result)
            {
                if($row1['date']>$currentDate)
                {
                    $_SESSION['nxt']=$row1['date'];
                }
                while($row=$result->fetch_assoc())
                {

                    $field1name = $row["Sl"];
                    $field2name = $row["date"];
                    $field3name = $row['outcomes'];

                    echo '<tr> 
                        <td>
                            '.$field1name.'
                        </td> 
                        <td>'
                            .$field2name.
                        '</td> 
                         <td>'
                            .$field3name.
                        '</td>
                        </tr>';
                }
            }
        ?>
    </table>
</div>
<div class="officetitle">
    <h2>Your Upcoming Proctor meet is on : </h2>
    <?php
    if(isset($_SESSION['nxt'])){
    ?> <h2> <?php
    echo $_SESSION['nxt'];
    ?></h2>  <?php
    //unset($_SESSION['nxt']);
    }   ?>
</div>
<?php 
    //session_start();
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
    ?>
<div>
    <form action="meetset.php" method="POST">
		<div class="container">
			<div class="head1">
                <h3> Schedule a proctor meet </h3>
            </div>
            <hr class="mb-3">
			<div class="row">
				<div class="col-sm-3">
					<h1></h1>
					<label for="date" class="formlable"><b>Date of next Proctor meet</b></label></br>
					<input type="date" id="date" name="date" placeholder="Enter proposed date of meet " required></br>

					<input type="submit" id="assign" name="assign" value="Set">
				</div>
			</div>
		</div>
	</form>
</div>
</body>
</html>