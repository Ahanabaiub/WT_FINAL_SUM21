<?php
 require_once "./checkAuthorization.php";
    include_once "../controllers/studentController.php";
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
            <div class="students-section">
                <h3>Student Enrollment Report</h3>
                <span><?php echo $err_report; ?></span>
                <form action="" method="post">
                    <input type="text" placeholder="2021" name="year" value="<?php echo $enroll_year?>">
                    <input type="text" placeholder="04" name="month" value="<?php echo $enroll_month?>">
                   
                    <input type="submit" name="s_e_search" value="Search">
                </form>

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
                    </tr>
                    <tr>
                        <?php
                            $i = 1;
                           if($enroll_year!="" || $enroll_month!=""){
                               $students =  generateReport($enroll_year,$enroll_month);
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
        
                                echo "</tr>";
                                $i++;
                            }
                           }
                        ?>
                        
                    </tr>
                </table>
            </div>
        </div> 
    </div>
</body>
</html>