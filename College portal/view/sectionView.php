<?php
    require_once "./checkAuthorization.php";
    include_once "../controllers/sectionController.php";
    
    //$sections = getAllsections();
    $year = getYearBySectionId($_GET["id"]);
    $courses=getCoursesByDeptYear($_GET['dept'],$year);
    $students=getAllStudentsBySectionId($_GET["id"]);
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">
    <title>All Sections</title>
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
            <h2>Section Management</h2>
            <div class="create-btn">
                
            </div>
            <div class="students-section">
                <h2>Section Info [<?php echo $_GET['dept']." -- ".$_GET['sec']."-- year:".$year;?>]</h2>
                <div>
                    <h3>Courses :</h3>
                    <div>
                        <table>
                            <tr>
                                <th>Sl#</th>
                                <th>Name</th>
                                <th>Teacher</th>  
                                <th>Option</th>             
                            </tr>
                            <tr>
                                <?php
                                    $i = 1;
                                    foreach($courses as $c){
                                        echo "<tr>";
                                            echo "<td>$i</td>";
                                            echo "<td>".$c["name"]."</td>";
                                            $tech = getCourseTeacher($c["id"],$_GET["id"]);
                                            if(is_null($tech["name"])){
                                                $tech["name"]="--";
                                            }    
                                            echo "<td>".$tech["name"]."</td>";
                                            if($tech["name"]=="--"){
                                                echo "<td><a href='assignTeacher.php?dept=".$_GET['dept']."&sec=".$_GET['sec']."&year=".$year."&id=".$_GET["id"]."&cid=".$c["id"]."'>Add</a></td>";
                                            }
                                            else{
                                                echo "<td><a href='assignTeacher.php?dept=".$_GET['dept']."&sec=".$_GET['sec']."&year=".$year."&id=".$_GET["id"]."&cid=".$c["id"]."'>Change</a></td>";
                                            }
                                        echo "</tr>"; 
                                        $i++;
                                    }
                                ?>
                                
                            </tr>
                        </table>
                    </div>
                    <br><br>
                    <div>
                        <h3>Uploaded Notes :</h3>
                        <div>
                            <?php
                                
                                foreach($courses as $c){
                                    echo '<div class="noteContainer">';
                                    echo '<p>'.$c["name"].'</p>';
                                    $course_id=getCourseIdByName($c["name"]);
                                    $notes = getAllNotes($_GET["id"],$course_id);
                                         echo "<table>";
                                        foreach($notes as $n){
                                           
                                            echo "<tr>";
                                                echo '<td><a href="'.$_SERVER["REQUEST_URI"]."&dfile=".$n['file_name']."&sub=".$c["name"].'">'.$n['file_name']."</a></td>";
                                                echo "<td><a href=".$_SERVER["REQUEST_URI"]."&delfile=".$n['file_name']."&delfileId=".$n['id']."&sub=".$c["name"].">Remove</a></td>";
                                            echo "</tr>";
                                            
                                        }
                                        echo "</table>";
                                    echo '<hr>';
                                    echo '';
                                    echo '</div>';
                                    
                                }
                            ?>

                        </div>
                    
                    </div>
                    <br><br>
                    <h3>Section Students :</h3>
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
                            $j = 1;
                            foreach($students as $c){
                                echo "<tr>";
                                    echo "<td>$j</td>";
                                    echo "<td>".$c["cid"]."</td>";
                                    echo "<td>".$c["name"]."</td>";
                                    echo "<td>".$c["address"]."</td>";
                                    echo "<td>".$c["dob"]."</td>";
                                    echo "<td>".$c["year"]."</td>";
                                    echo "<td>".$c["blood"]."</td>";
                                   
                                echo "</tr>";
                                $j++;
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