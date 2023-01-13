<?php
        $host="localhost";
        $user="root";
        $password="";
        $db="proctor_diary";
    
        $connect=mysqli_connect($host,$user,"");
        mysqli_select_db($connect,$db);
        if(isset($_POST['create']))
        {
            
            $pass=$_POST['password'];
            $fullname=$_POST['name'];

            // $chek='select uid from `office` where `uid` = '.$fullname ;
            // $cr=mysqli_query($connect,$chek);
            // if(mysqli_num_rows($cr) != 0)
            // {
            //      //unset($_SESSION['fullname']);
            //      $_SESSION['error']="Username already exists";
            //      header("Location:registration.php");
            //      exit();
            // }

            try{
                $query="INSERT INTO `office`(`uid`, `password`) VALUES ('$fullname','$pass')";
                $result = mysqli_query($connect, $query) or throw new Exception(mysql_error());
            }

            catch(exception $e)
            {
                session_start();
                $_SESSION['error']="Username already exists";
                header("Location:registration.php");
                exit();
            }
            
                //$_SESSION['student_name']=$row['name'];
                header("Location:login.php");
                exit();
            
        }
	?>	