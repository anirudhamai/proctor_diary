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
    
    $q="select password from proctor_log where pid =  '$usn' ";
    $result = mysqli_query($connect,$q); 
    $r=$result->fetch_assoc();
    if($r['password']==$password)
    {
        $_SESSION['pid']=$usn;
        $_SESSION['pname'];
      header("Location:proctor_recreation.php");
    } 
    else
    {
        header("Location:login.php");
    }
  }
?>