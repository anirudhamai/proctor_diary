<!--Page having three buttons comes after login pages-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      .btn {
        position: relative;
        display: block;
        top: 100px;
        left: 140px;
        padding: 5px;
        margin: 15px;
        background-color: aliceblue;
        color: #4fa3a5;
        border-radius: 30px;
        border: 1px solid #63c5ea;
        height: 50px;
        width: 200px;
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
      }
      a {
        text-decoration: none;
      }

      .btn:hover {
        color: aliceblue;
        background-color: #4fa3a5;
      }

      .container {
        position: absolute;
        top: 50px;
        left: 40px;
        height: 400px;
        width: 450px;
        background: #fff;
        border-radius: 3px;
        overflow: hidden;
      }
      .frame {
        position: absolute;
        top: 50%;
        left: 50%;
        margin-left: -300px;
        margin-top: -250px;
        border-radius: 2px;
      }
    </style>
  </head>
  <body>
  <?php
 $host="localhost";
 $user="root";
 $password="";
 $db="proctor_diary";
 session_start();
 $connect= mysqli_connect($host,$user,"");
 mysqli_select_db($connect,$db);
 $usn=$_SESSION['usn'];
 $q="select * from student where usn= $usn";
 $result = mysqli_query($connect,$q); 
 $row=mysqli_fetch_array($result);
 $x=$row['P_id'];
 $_SESSION['fullname']=$row['name'];
?>
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
    <div class="frame">
      <div class="container">
        <a href="recreation2.php"><button class="btn">View Your Details</button></a>
        <a href="studentrecreation.php"><button class="btn">View proctor details</button></a>
        <a href="diary.php"><button class="btn">Fill your Diary</button></a>
      </div>

    </div>
    <div>
          <center><h3>
            <div class="officetitle">
    <h2>Your Upcoming Proctor meet is on : </h2>
    <?php
    if(isset($_SESSION['nxt'])){
    ?> <h2> <?php
    echo $_SESSION['nxt'];
    ?></h2>  <?php
    //unset($_SESSION['nxt']);
    }   ?>
</div></h3></center>
        </div>
  </body>
</html>