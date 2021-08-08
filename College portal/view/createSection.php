<?php
     require_once "./checkAuthorization.php";
    include_once "../controllers/sectionController.php";
    $sections = getAllsections();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">
    <title>All Sections</title>
    <style>
       
    </style>
</head>
<body> 
<?php  require_once "./headerDash.php"; ?>
    <div class="main-container">
        <?php  include_once "./adminNav.php"?> 
        <div class="home">
            <h2>Section Management</h2>
            <div class="create-btn">
                <a href="./createSection.php">Create</a>
                <a href="./studentEnrollReport.php">Report</a>
            </div>
           
            <div class="students-section">
                <h3>All Section</h3>
                <table>
                    <tr>
                        <th>Sl#</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Year</th>   
                        <th>Session</th>              
                    </tr>
                    <tr>
                        <?php
                            $i = 1;
                            foreach($sections as $c){
                                echo "<tr>";
                                    echo "<td>$i</td>";
                                    echo "<td>".$c["name"]."</td>";
                                    echo "<td>".$c["d_name"]."</td>";
                                    echo "<td>".$c["year"]."</td>";
                                    echo "<td>".$c["session"]."</td>";
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