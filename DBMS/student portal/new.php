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
            $_SESSION['usn']=$_POST['usn'];
            $branch=$_POST['branch'];
            $pass=$_POST['password'];

            $fullname=$_SESSION['fullname'];
            $usn=$_SESSION['usn'];

            $chek="select * from student_login where usn=$usn";
            $cr=mysqli_query($connect,$chek);
            if(mysqli_num_rows($cr) != 0)
            {
                 unset($_SESSION['usn']);
                 $_SESSION['error']="USN already exists";
                 header("Location:registration.php");
                 exit();
            }

            $chek1="select * from has where usn=$usn";
            $cr=mysqli_query($connect,$chek1);
            if(mysqli_num_rows($cr) == 0)
            {
                 unset($_SESSION['usn']);
                 $_SESSION['error']="USN is not registered with the office";
                 header("Location:registration.php");
                 exit();
            }

            $query="INSERT INTO `student_login`(`Sname`, `USN`, `Branch`, `password`) VALUES ('$fullname','$usn','$branch','$pass')";
            $result = mysqli_query($connect, $query);

            $query1="INSERT INTO `student`(`usn`,`name`,`Branch`) VALUES ('$usn','$fullname','$branch')";
            $result1 = mysqli_query($connect, $query1);

            if(!$result)
            {
                header("Location:registration.php?error=Failed registration");
                exit();
            }
            else{
                //$_SESSION['student_name']=$row['name'];
                header("Location:login.php");
                exit();
            }
        }
	?>	