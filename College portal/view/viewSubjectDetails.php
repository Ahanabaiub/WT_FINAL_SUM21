<?php

    require_once "./checkAuthorization.php";
    include_once "../controllers/studentController.php";
    include_once "../controllers/notesController.php";

    $sid = getSectionId($_SESSION["cid"]);
    $student = getStudentByCid($_SESSION["cid"]); 
    $courses=getCoursesByDeptAndYear($student["department_id"],$student["year"]);
    $student_sec = getSection($sid);
    $department_name = getDepartmentName($student_sec["department_id"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="./css/style.css">
    <title>Subject Details</title>
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
<body>
    <!-- <?php  require_once "headerDash.php"; ?> -->
    <div style=" background-color: #4caf50; padding: 10px 20px; ">
        <h1>Student DashBoard</h1>
    </div>
    <div class="main-container">
                <div class="main-menu">
                   <a href="./studentDash.php">Home</a>
                </div>
       <div class="home">   
       
        <div class="students-section">
            <h2>Section: <?php echo $department_name."--".$student_sec["name"]."--".$student_sec["year"] ;   ?></h2>
            <h2><?php  echo $_GET["sub"]  ?></h2>
            <h3>Notes</h3>
            <?php $notes = getAllNotes($_GET["seci"],$_GET["subi"]);  ?>
            <table>
                    <tr>
                            <td>#SL</td>
                            <td>File</td>
                    </tr>
                   <?php 
                //    $subName = getSubNameById($_GET["subi"]);
                   $i=1;
                   foreach($notes as $n){
                                           
                        echo "<tr>";
                            echo "<td>$i</td>";
                            echo '<td><a href="'.$_SERVER["REQUEST_URI"]."&dfile=".$n['file_name']."&sub=".$_GET["sub"].'">'.$n['file_name']."</a></td>";
                        echo "</tr>";
                      $i++;  
                    }
                   
                   ?>      
            </table>        
        </div>

    </div>
    

    </div>   
</body>
</html>