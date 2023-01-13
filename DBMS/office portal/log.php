<?php
  $host="localhost";
  $user="root";
  $password="";
  $db='proctor_diary';

  $connect= mysqli_connect($host,$user,"");
  mysqli_select_db($connect,$db);


  //session_start();
  if(isset($_POST['bb']))
  {
    $usn=$_POST['s_usn'];
    $password=$_POST['s_password'];

    $q="select password from office where uid=  '$usn' ";
    $result = mysqli_query($connect,$q); 
    $r=$result->fetch_assoc();
    if($r['password']==$password)
    {
      header("Location:office.php");
    } 
    else
    {
        header("Location:login.php");
    }
  }
?>