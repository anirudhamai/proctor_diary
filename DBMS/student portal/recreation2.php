<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="recreation_2.css" />
    <title>Document</title>

    <style>
        .frame {
  position: absolute;
  top: 50%;
  left: 50%;
  margin-left: -300px;
  margin-top: -250px;
  border-radius: 2px;
  box-shadow: 1px 2px 10px 0px rgba(0, 0, 0, 0.3);
  background: #ca7c4e;
  color: burlywood;
  background: linear-gradient(
    87.4deg,
    rgb(255, 241, 165) 1.9%,
    rgb(200, 125, 76) 49.7%,
    rgb(83, 54, 54) 100.5%
  );
}

.card {
  position: absolute;
  top: 50px;
  left: 40px;
  height: 460px;
  width: 450px;
  background: #fff;
  border-radius: 3px;
  overflow: hidden;
  box-shadow: 10px 10px 15px 0 rgba(0, 0, 0, 0.3);
}

.profile {
  float: left;
  width: 260px;
  height: 320px;
  text-align: center;
}

.img {
  position: relative;
  border-radius: 50%;
  height: 150px;
}

.name {
  font-size: 15px;
  font-weight: 900;
}

.job {
  font-size: 14px;
  padding: 5px;
  line-height: 5px;
}

.btn {
  display: block;
  width: 120px;
  margin: 0 auto 10px auto;
  border: 1px solid burlywood;
  border-radius: 20px;
  color: burlywood;
  font-weight: 600;
  transition: all 0.3s ease-in-out;
}

.btn:hover {
  background-color: burlywood;
  color: aliceblue;
}

.stats {
  float: right;
  width: 180px;
}

.box {
  box-sizing: border-box;
  width: 180px;
  height: 230px;
  background: #f5e8df;
  text-align: center;
  padding-top: 28px;
  transition: all 0.4s ease-in-out;
}

.box:hover {
  background: #e1cfc2;
  cursor: pointer;
}

.box:nth-child(2) {
  margin: 1px 0;
}

span {
  display: block;
}

.parameter {
  font-size: 12px;
}
    </style>
  </head>
  <body>
  <div>
    <form action="logout.php">
            </br>
            <button
                type="submit"
                class="submit-btn"
                name="bbr"
              >Log out
              </button>
            </form>
    </div>
    <!--That single viewing detail of student-->
<?php
 $host="localhost";
 $user="root";
 $password="";
 $db="proctor_diary";
session_start();
 $connect= mysqli_connect($host,$user,"");
 mysqli_select_db($connect,$db);
 
 $usn=$_SESSION['usn'];
 //$password=$_SESSION['password'];
 $q="select * from student where usn= $usn";
 $result = mysqli_query($connect,$q); 
 $row=mysqli_fetch_array($result);
 $x=$row['P_id'];
 //$_SESSION['fullname']=$row['name'];
 $query1="select pname from has where p_id=$x";
 $p = mysqli_query($connect, $query1);
 $r=$p->fetch_assoc();
?>
<div><h4>welcome <?php  echo $_SESSION['fullname'] ?></h4></div>
    <div class="frame">
      <div class="card">          
        <div class="profile">
          <img
            class="img"
            src="data:image/jpeg;base64,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"
          />
          
          <p class="name" name="name" style="font-size: 20px">Name:<?php echo $row['name'];  ?></p> 
          <p class="usn" name="usn"   style="font-size: 20px">USN: <?php echo $row['usn']; ?></p>
          <p class="name" style="font-size: 18px">BRANCH: <?php echo $row['Branch']; ?></p>
          <p class="job">DOB: <?php  echo $row['dob']; ?></p>
          <p class="job">Phone number: <?php  echo $row['phno1']; ?> </p>

          <div class="action">
            <form action="addcourse.php" metho="POST"><button class="btn"type="submit" name="c">Course details</button></form>
          </div>
          <div class="action">
            <form action="add.php" method="POST"><button class="btn" type="submit" name="i">Internship details</button></form>
          </div>
        </div>
        <div class="stats">
          <div class="box">
            <span class="value" style="font-size: 30px">Address</span>
            <span class="parameter" style="font-size: 17px"> 
            <?php //echo $row['s_address'] ?>
            </span>
          </div>

          <div class="box">
            <span: class="value" style="font-size: 30px">Proctor:</span>
            <span class="parameter" style="font-size: 17px"><?php echo $r['pname']; ?></span>
          </div>
        </div>
        
        
      </div>
    </div>
  </body>
</html>