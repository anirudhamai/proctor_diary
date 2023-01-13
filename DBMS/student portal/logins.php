<?php
  $host="localhost";
  $user="root";
  $password="";
  $db='proctor_diary';

  $connect= mysqli_connect($host,$user,"");
  mysqli_select_db($connect,$db);


  session_start();
  if(isset($_POST['bb']))
  {
    $usn=$_POST['s_usn'];
    $password=$_POST['s_password'];

    $q= "select password from student_login where USN = $usn";
    $result = mysqli_query($connect,$q);
    $r=$result->fetch_assoc();

    if($r['password']==$password)
    {
      $q1= "select name from student where usn = $usn";
      $result1 = mysqli_query($connect,$q1);
      $r1=$result1->fetch_assoc();
        $_SESSION['usn']=$usn;
        $_SESSION['fullname']=$r['name'];
        $query2="select date from meets where pid='$pid' order by date ";
        $result2 = mysqli_query($connect, $query2);
        $row1=$result2->fetch_assoc();
        
            if($row1['date']>$currentDate)
            {
                $_SESSION['nxt']=$row1['date'];
            }
        header("Location:sindex.php");
    } 
    else
    {
        header("Location:login.php");
    }
  }
?>