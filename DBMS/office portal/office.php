<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proctors</title>
    <link rel="stylesheet" type="text/css" href="css/office.css">
</head>
<style>
    
  table {
    border-collapse: collapse;
    width: 50%;
    margin:auto;
    margin-top: 30px;
    padding-left: 25%;
    padding-right: 25%;
    margin-bottom: 30px;
    font-size: x-large;
  }
  
  th, td {
    text-align: left;
    padding: 10px;
  }
  
  tr:nth-child(even) {background-color: #f2f2f2;}
</style>
<body>
<form action="logout.php">
            </br>
            <button
                type="submit"
                class="submit-btn"
                name="bbr"
              >Log out
              </button>
            </form>
    </div></br>
    <div class="officetitle">
        <h2>All Proctors and their proctee students Record is available here</h2>
    </div>
    <div>
        <table>
            <tr>
                <th>Proctor Name</th>
                <th>P_id</th>
            </tr>
            <?php
                $host="localhost";
                $user="root";
                $password="";
                $db="proctor_diary";
            
                $connect=mysqli_connect($host,$user,"");
                mysqli_select_db($connect,$db);
                $query='select distinct p_id,pname from has order by p_id';
                $result = mysqli_query($connect, $query);
                if($result)
                {
                    while($row=$result->fetch_assoc())
                    {

                        $field1name = $row["pname"];
                        $field2name = $row["p_id"];
                        echo '<tr> 
                        <td>
                            '.$field1name.'
                        </td> 
                        <td>'
                            .$field2name.
                        '</td> 
                        </tr>';
                    }
                }
                ?>
        </table>
    </div>
    <div>
        <form action="match.php" method="POST">
            <button type="submit" name="submit" id="submit" ><b>Click here to add students to a Proctor</b></button>
        </form>
    </div>
</body>
</html>

