<?php
    //require_once "./checkAuthorization.php";
    include_once "../controllers/teacherController.php";
    $teacher = getTeacher($_GET["id"]);
    $department = getAllDEpartments();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">
    <title>Edit Teacher</title>
</head>
<body>
<?php  require_once "./headerDash.php"; ?>
<div class="main-container">
        <?php  include_once "./adminNav.php"?> 
        <div class="home">
            <h2>Teacher Management</h2>
            <div class="students-section">
                <h3>Edit Teacher Information</h3>
                <form action="" method="post">
        <fieldset>
            <legend><b>Edit Teacher</b></legend>
                 <table>
                     <tr><?php echo $err_db?></tr>
                     <tr>
                         <input type="hidden" name="id" value="<?php echo $teacher["id"];?>">
                     </tr>
                     <tr>
                        <td><b>College Id :</b></td>
                        <td><input type="text" name="cid" value="<?php echo $teacher["cid"]; ?>"></td>
                        <td><span> <?php echo $err_cid; ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Name :</b></td>
                        <td><input type="text" name="name" value="<?php echo$teacher["name"]; ?>"></td>
                        <td><span> <?php echo $err_name; ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Address:</b></td>
                        <td><input type="text" name="address" value="<?php echo $teacher["address"]; ?>"></td>
                        <td><span><?php echo $err_address; ?> </span></td>
                    </tr>
                    <tr>
                        <td><b>Department :</b></td>
                        <td>
                            <select name="department">
                                <option disabled selected>Department</option>
                                <?php
                                   foreach($departments as $c){
                                    if($c['id']==$teacher['department_id']){
                                        echo "<option selected value='".$c["id"]."'>".$c["d_name"]."</option>";
                                    }
                                    else{
                                        echo "<option value='".$c["id"]."'>".$c["d_name"]."</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                        <td><span><?php echo $err_department; ?> </span></td>
                    </tr>
                <tr>
					<td colspan="2" align="right"><input type="submit" name="edit_teacher" value="Edit"></td>
					
				</tr>
            </table>
        </fieldset>
    </form>
            </div>
        </div> 
    </div>
    
</body>
</html>