<?php
        $host="localhost";
        $user="root";
        $password="";
        $db="proctor_diary";
    
        $connect=mysqli_connect($host,$user,"");
        mysqli_select_db($connect,$db);
        if(isset($_POST['assign']))
        {
            session_start();
            
            $usn=$_SESSION['usn'];
            $com=$_POST['fullname'];
            $dom=$_POST['dom'];
            $twt=$_POST['twt'];

            $query= "INSERT INTO `internships` (`usn`, `company`, `Domain`, `twt`) VALUES ('$usn','$com','$dom','$twt')";
            $result = mysqli_query($connect, $query);


            if($result){
                unset($_SESSION['msg']);
                $_SESSION['msg']="Inserted succesfully";
                header("Location: add.php");
                exit();
            }
            else{
                $_SESSION['msg']="Failed insertion";
                header("Location: add.php");
            }
        }

        if(isset($_POST['cour']))
        {
            session_start();
            
            $usn=$_SESSION['usn'];
            $sem=$_POST['fullname'];
            $sgpa=$_POST['dom'];
            $back=$_POST['twt'];

            $query= "INSERT INTO `course` (`usn`, `sem`, `sgpa`, `back`) VALUES ('$usn','$sem','$sgpa','$back')";
            $result = mysqli_query($connect, $query);


            if($result){
                unset($_SESSION['msg']);
                $_SESSION['msg']="Inserted succesfully";
                header("Location: addcourse.php");
                exit();
            }
            else{
                $_SESSION['msg']="Failed insertion";
                header("Location: addcourse.php");
            }
        }

    ?>