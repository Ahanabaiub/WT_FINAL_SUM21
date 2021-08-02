<?php
    require_once "./checkAuthorization.php";
    include_once "../controllers/courseController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">
    <title>Create Subjects</title>
</head>
<body> 
<?php  require_once "./headerDash.php"; ?>
    <div class="main-container">
        <?php  include_once "./adminNav.php"?> 
        <div class="home">
            <h2>Subjects Management</h2>
            <div class="students-section">
               
                <h3>Create Subject</h3>
                <form action="" method="post">
                            <table>
                                <tr><?php echo $err_db?></tr>
                                <tr>
                                    <td><b>Name :</b></td>
                                    <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                                    <td><span> <?php echo $err_name; ?></span></td>
                                </tr>
                                <tr>
                                    <td><b>Department :</b></td>
                                    <td>
                                        <select name="department">
                                            <option disabled selected>Department</option>
                                            <?php
                                            foreach($departments as $c){
                                                echo "<option value='".$c["id"]."'>".$c["d_name"]."</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td><span><?php echo $err_department; ?> </span></td>
                                </tr>
                                    <td><b>Year:</b></td>
                                    <td>
                                        <input type="text" name="year" value="<?php echo $year; ?>"><br>
                                    </td>
                                    <td><span><?php echo $err_year; ?> </span></td>
                                </tr>
                            <tr>
                                <td colspan="2" align="right"><input type="submit" name="add_course" value="Add"></td>
                                
                            </tr>
                        </table>
                </form>
               
            </div>
        </div> 
    </div>
</body>
</html>








