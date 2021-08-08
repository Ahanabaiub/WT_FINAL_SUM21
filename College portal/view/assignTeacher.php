<?php
    require_once "./checkAuthorization.php";
    include_once "../controllers/sectionController.php";
    $teachers = getTeachersByDepartment($_GET['dept']);
    
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
                
            </div>
            <div class="students-section">
                <h2>Section Info [<?php echo $_GET['dept']." -- ".$_GET['sec']."-- year:".$_GET["year"];?>]</h2>
                <div>
                    <h3>Assign teacher </h3>
                    <div>
                    <form action="" method="post">
                            <table>
                                <tr><?php echo $err_db?></tr>
                                <tr>
                                    <td><b>Teacher :</b></td>
                                    <td>
                                        <select name="id">
                                            <option disabled selected>Teacher</option>
                                            <?php
                                            foreach($teachers as $c){
                                                
                                                echo "<option value='".$c["id"]."'>".$c["name"]."</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td><span> <?php echo $err_id; ?></span></td>
                                </tr>
        
                            <tr>
                                <td colspan="2" align="right"><input type="submit" name="add_crs_tec" value="Add"></td>
                                
                            </tr>
                        </table>
                </form>
               
                    </div>
                </div>

            </div>
        </div> 
    </div>
</body>
</html>