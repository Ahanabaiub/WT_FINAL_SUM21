<?php
    require_once "./checkAuthorization.php";
    include_once "../controllers/courseController.php";
    $courses = getAllcourse();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">
    <title>All Subjects</title>
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
            
            #editBtn{
                margin-right: 15px;
            }

    </style>
</head>
<body> 
<?php  require_once "./headerDash.php"; ?>
    <div class="main-container">
        <?php  include_once "./adminNav.php"?> 
        <div class="home">
            <h2>Subjects Management</h2>
            <div class="create-btn">
                <a href="./coursecreation.php">Create</a>
            </div>
            <div class="students-section">
               <div id="allSub">
                    <h3>All Subjects</h3>
                    <table>
                        <tr>
                            <th>Sl#</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Year</th>   
                            <th>Option</th>              
                        </tr>
                        <tr>
                            <?php
                                $i = 1;
                                foreach($courses as $c){
                                    echo "<tr>";
                                        echo "<td>$i</td>";
                                        echo "<td>".$c["name"]."</td>";
                                        echo "<td>".$c["d_name"]."</td>";
                                        echo "<td>".$c["year"]."</td>";
                                        echo '<td><a id="editBtn" href="./editCourse.php?id='.$c['id'].'">Edit</a>';
                                        echo '<a href="./allCourses.php?del='.$c['id'].'">Delete</a></td>';
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