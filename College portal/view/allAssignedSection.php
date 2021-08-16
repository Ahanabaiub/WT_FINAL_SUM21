<?php

    require_once "./checkAuthorization.php";
    require_once "../controllers/teacherController.php";

    $t_cid = $_SESSION["loggedUserId"];
   // echo "teacher Id: ".$t_cid;
    $sections = getAllAssignedSection($t_cid);

  

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="./css/style.css">
    <title>Teacher Dashboard</title>
    <style>
       
       table, th, td{
           border: 1px solid black;
           padding: 5px; 
       }
       table{
           border-collapse: collapse;
           width: 97%;
           margin: 5px 10px;
       }
       
    </style>
</head>
<body  style="background-color: #e0f2f1;">
    <div style=" background-color: #2962ff; padding: 10px 20px; ">
        <h1>Teacher DashBoard</h1>
    </div>
    <div >
      <?php require_once "./teacherNav.php";
            if(isset($_COOKIE["noticeCookie"])){
                echo $_COOKIE["noticeCookie"];
            }
      ?>
        <div class="students-section">
                <h3>All Section</h3>
                <table>
                    <tr>
                        <th>Sl#</th>
                        <th>Section Name</th>
                        <th>Course Name</th>  
                        <th>Option</th>        
                    </tr>
                    <tr>
                        <?php
                            $i = 1;
                            foreach($sections as $c){
                                echo "<tr>";
                                    echo "<td>$i</td>";
                                    echo "<td>".$c["section_name"]."</td>";
                                    echo "<td>".$c["course_name"]."</td>";
                                    echo '<td><a href="./sectionDetails.php?id='.$c['section_id'].'&sec='.$c['section_name'].'&sub='.$c["course_name"].'">Details</a></td>';
                                echo "</tr>";
                                $i++;
                            }
                        ?>
                        
                    </tr>
                </table>
        </div>
    

    </div>   
</body>
</html>