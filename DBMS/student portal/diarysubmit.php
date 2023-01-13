<?php
        $host="localhost";
        $user="root";
        $password="";
        $db="proctor_diary";
    
        $connect=mysqli_connect($host,$user,"");
        mysqli_select_db($connect,$db);
        if(isset($_POST['diar']))
        {
            $do=$_POST['dob'];
            $road=$_POST['road'];
            $city=$_POST['city'];
            $pn=$_POST['phone'];
            $pname=$_POST['parent'];
            $pnp=$_POST['phonep'];
            $occ=$_POST['occ'];

            session_start();
            $usn=$_SESSION['usn'];
            $chek="select house from student where usn=$usn";
            $cr=mysqli_query($connect,$chek);
            $dob=$cr->fetch_assoc();
            if($dob['house']!= 0)
            {
                 //unset($_SESSION['usn']);
                 $_SESSION['error']="Your diary has already been filled";
                 header("Location:diary.php");
                 exit();
            }
            // (`dob`, `phno1`,`houseno`,`city`) VALUES ('$do','$pn','$road','$city')
            else
            {
                $query="UPDATE student SET dob = '$do', phno1 = '$pn', houseno = '$road', city = '$city' where usn ='$usn' ";
                $result = mysqli_query($connect, $query);

                $query1="INSERT INTO `parent`(`usn`, `parname`, `occ`, `pphno`) VALUES ('$usn','$pname','$occ','$pnp')";
                $result1 = mysqli_query($connect, $query1);
                header("Location:diary.php");
                exit();
            }
        }
?>