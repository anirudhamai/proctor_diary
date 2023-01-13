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
            $_SESSION['studentname']=$_POST['fullname'];
            $_SESSION['rollno']=$_POST['usn'];
            $p_id=$_SESSION['p_id'];
            $pname=$_SESSION['pname'];

            $fullname=$_SESSION['studentname'];
            $usn=$_SESSION['rollno'];
             $chek="select usn from `has` where `usn` = $usn";
             $re= mysqli_query($connect,$chek);
             //echo $re;
             if(mysqli_num_rows($re) != 0)
              {
                 unset($_SESSION['rollno']);
                 $_SESSION['error']="USN already exists";
                 header("Location:assign.php");
                 exit();
             }
            else{
                //unset($_SESSION['error']);
                $query5="INSERT INTO `has`(`usn`, `sname`, `p_id`, `pname`) VALUES ('$usn','$fullname','$p_id','$pname')";
                $result = mysqli_query($connect, $query5);

                // $query1="select * from student where usn = $usn";
                // $res=mysqli_query($connect,$query1);
                // if(mysqli_num_rows($res)==0)
                // {
                //     $query2="INSERT INTO `student`(`usn`, `name`, `P_id`) VALUES ('$usn','$fullname','$p_id')";
                //     $result1 = mysqli_query($connect, $query2);
                // }

                // $query3="select * from proctors where p_id=$p_id";
                // $res11=mysqli_query($connect,$query3);
                // if(mysqli_num_rows($res11)==0)
                // {
                //     $query22="INSERT INTO `proctors`(`p_id`, `p_name`) VALUES ('$p_id','$pname')";
                //     $result11 = mysqli_query($connect, $query22);
                // }

                if($result){
                    unset($_SESSION['msg']);
                $_SESSION['msg']="Inserted succesfully";
                header("Location: assign.php");
                exit();
            }
            else{
                $_SESSION['msg']="Failed insertion";
                header("Location: assign.php");
            }
            }
        }
    ?>