<?php include "header.php"; ?>
<?php
    include_once "../../controllers/c/teacherController.php";
    $teachers = getAllTeachers();
?>


<html >
<head>
    
</head>
<body> 

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
</body>
</html>
<?php include "footer.php"; ?>