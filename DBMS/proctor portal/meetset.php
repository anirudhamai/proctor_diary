<?php
        $host="localhost";
        $user="root";
        $password="";
        $db="proctor_diary";
    
        $connect=mysqli_connect($host,$user,"");
        mysqli_select_db($connect,$db);

        session_start();

        if(isset($_POST['assign']))
        {
            $p_id=$_SESSION['pid'];
            $_SESSION['date']=$_POST['date'];
            $dates=$_SESSION['date'];
            $startDate = strtotime(date('Y-m-d', strtotime($dates) ) );
            $currentDate = strtotime(date('Y-m-d'));

            if($startDate < $currentDate) {
                $_SESSION['error']="Date is in The past ! ";
                header("Location:proctor.php");
                exit();
            }
            
            $chek="select * from meets where pid='$p_id' and date='$dates' ";
            $re= mysqli_query($connect,$chek);
            if(mysqli_num_rows($re)!=0)
            {
                $_SESSION['error']="You have a Meet already scheduled on this day!! ";
                header("Location:proctor.php");
                exit();
            }
            
            else
            {
                $query="select count(date) from meets where pid = $p_id";
                $r=mysqli_query($connect,$query);
                $coun=$r->fetch_assoc();
                $c1=$coun['count(date)'];
                if($c1==0)
                { $c=1; }
                else
                { $c=$c1+1; }
                $query5="INSERT INTO `meets`(`Sl`,`pid`, `date`) VALUES ('$c','$p_id','$dates')";
                $result = mysqli_query($connect, $query5);

                if($result){
                    unset($_SESSION['msg']);
                    $_SESSION['msg']="Meet Scheduled succesfully";
                    header("Location: proctor.php");
                    exit();
                }
                else
                {
                    $_SESSION['msg']="Failed Scheduling";
                    header("Location: proctor.php");
                }
            }
        }
    ?>