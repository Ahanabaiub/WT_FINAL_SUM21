<?php

    require_once "./checkAuthorization.php";
    include_once "../controllers/studentController.php";

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
    <title>Student Dashboard</title>
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
    <?php  require_once "headerDash.php"; ?>
    <div class="main-container">
       <div class="home"> 
           
            <div class="main-menu">
                <a href="./teacher_feedback.php">Feedback</a>
                <?php  echo "<a href=uploadNotification.php?secId=".$section_id."&tid=".$tid."&subid=".$course_id.">Notifications</a>"   ?>
                <a href="./viewNotifications.php?">Notifications</a>
            </div>
         
       
        <div class="students-section">
            <h2>Section: <?php echo $department_name."--".$student_sec["name"]."--".$student_sec["year"] ;   ?></h2>
        <h3>Subjects</h3>
        <div>
                    <table>
                        <tr>
                            <th>Sl#</th>
                            <th>Subject Name</th>
                            <th>Subject Teacher</th>          
                        </tr>
                        <tr>
                            <?php
                                $i = 1;
                                foreach($courses as $c){
                                    echo "<tr>";
                                        echo "<td>$i</td>";
        
                                        echo "<td><a href='viewSubjectDetails.php?subi=".$c["id"]."&seci=".$sid."&sub=".$c["name"]."&sec=".$student_sec["name"]."'>".$c["name"]."</a></td>";
                                        $tech = getCourseTeacher($c["id"],$student["section_id"]);
                                        if(is_null($tech["name"])){
                                            $tech["name"]="--";
                                        }    
                                        echo "<td>".$tech["name"]."</td>";
                                    echo "</tr>"; 
                                    $i++;
                                }
                            ?>
                            
                        </tr>
                    </table>
                </div>
            </div>

    </div>
    

    </div>   
</body>
</html>