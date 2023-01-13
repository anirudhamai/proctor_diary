<?php
        $host="localhost";
        $user="root";
        $password="";
        $db="proctor_diary";
    
        $connect=mysqli_connect($host,$user,"");
        mysqli_select_db($connect,$db);
        if(isset($_POST['diar']))
        {
            $qual=$_POST['dob'];
            $xp=$_POST['road'];

            session_start();
            $usn=$_SESSION['pid'];
            $chek="select xp from proctors where p_id=$usn";
            $cr=mysqli_query($connect,$chek);
            $dob=$cr->fetch_assoc();
            if($dob['xp']!= 0)
            {
                 //unset($_SESSION['usn']);
                 $_SESSION['error']="Your diary has already been filled";
                 header("Location:diary.php");
                 exit();
            }
            // (`dob`, `phno1`,`houseno`,`city`) VALUES ('$do','$pn','$road','$city')
            else
            {
                $query="UPDATE proctors SET qualification = '$qual', xp = '$xp' where p_id ='$usn' ";
                $result = mysqli_query($connect, $query);
                header("Location:diary.php");
                exit();
            }
        }
?>