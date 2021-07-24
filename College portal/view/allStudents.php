<?php
     require_once "./checkAuthorization.php";
    include_once "../controllers/studentController.php";
    $students = getAllStudents();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">
    <title>All Students</title>
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
            <h2>Student Management</h2>
            <div class="create-btn">
                <a href="./createStudent.php">Create</a>
                <a href="./studentEnrollReport.php">Report</a>
            </div>
            <div class="students-section">
                <h3>All Students</h3>
                <table>
                    <tr>
                        <th>Sl#</th>
                        <th>CID </th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Address</th>
                        <th>Date of Birth</th>
                        <th>Year</th>
                        <th>Blood</th>
                        <th>Created</th>
                        <th>Edit</th>
                        <th>Delete</th>                
                    </tr>
                    <tr>
                        <?php
                            $i = 1;
                            foreach($students as $c){
                                echo "<tr>";
                                    echo "<td>$i</td>";
                                    echo "<td>".$c["cid"]."</td>";
                                    echo "<td>".$c["name"]."</td>";
                                    echo "<td>".$c["d_name"]."</td>";
                                    echo "<td>".$c["address"]."</td>";
                                    echo "<td>".$c["dob"]."</td>";
                                    echo "<td>".$c["year"]."</td>";
                                    echo "<td>".$c["blood"]."</td>";
                                    echo "<td>".$c["created"]."</td>";
                                    echo '<td><a href="editStudents.php?id='.$c['id'].'">Edit</a></td>';
                                    echo '<td><a href="./allStudents.php?del='.$c['id'].'">Delete</a></td>';
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