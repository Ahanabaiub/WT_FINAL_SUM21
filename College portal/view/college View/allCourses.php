<?php include "header.php"; ?>
<?php
    include_once "../../controllers/c/CourseController.php";
    $courses = getAllcourse();
?>


<html >
<head>
 
</head>
<body>
  			<h2>All COURSES</h2>
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
                                        echo '<td><a id="editBtn" href="editCourse.php?id='.$c['id'].'">Edit</a>'; echo '<a href="allCourses.php?del='.$c['id'].'">Delete</a></td>';
                                    echo "</tr>";
                                    $i++;
                                }
                            ?>
                            
                        </tr>
                    </table>
</body>
</html>
<?php include "footer.php"; ?>