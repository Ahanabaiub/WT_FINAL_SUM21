<?php
     //require_once "./checkAuthorization.php";
    include_once "../controllers/teacherController.php";
    $teachers = getAllTeachers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">
    <title>All Teachers</title>
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
<?php  require_once "./headerDash.php"; ?>
    <div class="main-container">
        <?php  include_once "./adminNav.php"?> 
        <div class="home">
            <h2>Teacher Management</h2>
            <div class="create-btn">
                <a href="./createTeacher.php">Create</a>
                <a href="./studentEnrollReport.php">Report</a>
            </div>
            <div class="students-section">
                <h3>All Teachers</h3>
                <table>
                    <tr>
                        <th>Sl#</th>
                        <th>CID </th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Address</th>
                        <th>Created</th>
                        <th>Edit</th>
                        <th>Delete</th>                
                    </tr>
                    <tr>
                        <?php
                            $i = 1;
                            foreach($teachers as $c){
                                echo "<tr>";
                                    echo "<td>$i</td>";
                                    echo "<td>".$c["cid"]."</td>";
                                    echo "<td>".$c["name"]."</td>";
                                    echo "<td>".$c["d_name"]."</td>";
                                    echo "<td>".$c["address"]."</td>";
                                    echo "<td>".$c["created"]."</td>";
                                    echo '<td><a href="./editTeacher.php?id='.$c['id'].'">Edit</a></td>';
                                    echo '<td><a href="./allTeachers.php?del='.$c['id'].'">Delete</a></td>';
                                echo "</tr>";
                                $i++;
                            }
                        ?>
                        
                    </tr>
                </table>
            </div>
        </div> 
    </div>
</body>
</html>