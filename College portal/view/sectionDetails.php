<?php

    require_once "./checkAuthorization.php";
    require_once "../controllers/studentController.php";
    require_once "../controllers/notesController.php";
    require_once "../controllers/notificationController.php";

    $t_cid = $_SESSION["loggedUserId"];
   // echo "teacher Id: ".$t_cid;
    $section_id = $_GET["id"];
    $sub=$_GET["sub"];
    $sec=$_GET["sec"];
    $students=getAllStudentsBySectionId($section_id);
    $notes = getAllNotes($section_id,$course_id);
    $course_id = getCourseIdbyName($_GET["sub"]);
    $tid = $t_cid;

    

  // echo '<td><a href="sectionDetails.php?id='.$section_id.'&sec='.$sec.'&sub='.$sub.'&dfile='.$c['file_name']."'>".$c['file_name']."</a></td>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="./css/style.css">
    <title>Section Details</title>
    <style>
       
       table, th, td{
           border: 1px solid black;
           padding: 5px; 
       }
       table{
           border-collapse: collapse;
           width: 95%;
           margin: 5px 10px;
       }
       
    </style>
</head>
<body>
    <div style=" background-color: #2962ff; padding: 10px 20px; ">
        <h1>Teacher DashBoard</h1>
    </div>
    <div class="main-container">
      <?php require_once "./teacherNav.php"?>
        <div>
            <h2>Section Details [Section: <?php echo $_GET['sec']." -- Subject: ".$_GET['sub']?>]</h2>
            <br>
            <span><?php echo $err_db ?></span>
            <div>
            
                <?php  echo "<a href=uploadNotification.php?secId=".$section_id."&tid=".$tid."&subid=".$course_id.">Notification</a>"   ?>
            </div>
            <div>
                <h3>Notes:</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <span>Upload Note(pdf)</span><input type="file" name="n_name"><span><?php echo $err_note  ?></span><br>
                    <input type="submit" name="add_note" value="Upload">
                </form>
                <div class="view-notes">
                <table>
                    <tr>
                        <th>Sl#</th>
                        <th>File Name</th>    
                        <th>Option</th>            
                    </tr>
                    <tr>
                        <?php
                            $i = 1;
                            foreach($notes as $c){
                                echo "<tr>";
                                    echo "<td>$i</td>";
                                    echo '<td><a href="'.$_SERVER["REQUEST_URI"]."&dfile=".$c['file_name'].'">'.$c['file_name']."</a></td>";
                                    echo "<td><a href=".$_SERVER["REQUEST_URI"]."&delfile=".$c['file_name']."&delfileId=".$c['id'].">Remove</a></td>";
                                echo "</tr>";
                                $i++;
                            }
                        ?>
                        
                    </tr>
                </table>
                
                </div>
            </div>
            <div>
                <form action="" method="post" enctype="multipart/form-data">
                    <span>Upload Assignment(pdf)</span><input type="file" name="assignment_name"><span><?php echo $err_assignment ?></span><br>
                    <input type="submit" name="add_assignment" value="Upload">
                </form>
            </div>
            <h3>All Students</h3>
                <table>
                    <tr>
                        <th>Sl#</th>
                        <th>CID </th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Date of Birth</th>
                        <th>Year</th>
                        <th>Blood</th>               
                    </tr>
                    <tr>
                        <?php
                            $i = 1;
                            foreach($students as $c){
                                echo "<tr>";
                                    echo "<td>$i</td>";
                                    echo "<td>".$c["cid"]."</td>";
                                    echo "<td>".$c["name"]."</td>";
                                    echo "<td>".$c["address"]."</td>";
                                    echo "<td>".$c["dob"]."</td>";
                                    echo "<td>".$c["year"]."</td>";
                                    echo "<td>".$c["blood"]."</td>";
                                   
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