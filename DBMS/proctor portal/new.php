<?php
        $host="localhost";
        $user="root";
        $password="";
        $db="proctor_diary";
    
        $connect=mysqli_connect($host,$user,"");
        mysqli_select_db($connect,$db);
        if(isset($_POST['create']))
        {
            session_start();
            $_SESSION['fullname']=$_POST['name'];
            $_SESSION['pid']=$_POST['pid'];
            $pos=$_POST['position'];
            $pass=$_POST['password'];

            $fullname=$_SESSION['fullname'];
            $pid=$_SESSION['pid'];

            $chek="select * from proctor_log where pid=$pid";
            $cr=mysqli_query($connect,$chek);
            if(mysqli_num_rows($cr) != 0)
            {
                 unset($_SESSION['pid']);
                 $_SESSION['error']="Pid already exists";
                 header("Location:reg.php");
                 exit();
            }

            $chek1="select * from has where p_id=$pid";
            $cr=mysqli_query($connect,$chek1);
            if(mysqli_num_rows($cr) == 0)
            {
                 unset($_SESSION['pid']);
                 $_SESSION['error']="Pid is not registered with the office";
                 header("Location:reg.php");
                 exit();
            }


            $query="INSERT INTO `proctor_log`(`pid`, `password`) VALUES ('$pid','$pass')";
            $result = mysqli_query($connect, $query);

            $query1="INSERT INTO `proctors`(`p_id`,`p_name`,`position`) VALUES ('$pid','$fullname','$pos')";
            $result1 = mysqli_query($connect, $query1);

            if(!$result)
            {
                header("Location:reg.php?error=Failed registration");
                exit();
            }
            else{
                //$_SESSION['student_name']=$row['name'];
                header("Location:login.php");
                exit();
            }
        }
	?>	