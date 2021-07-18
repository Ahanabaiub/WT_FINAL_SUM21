<?php
    require_once "../controller/studentController.php";

    $student = getStudent($_GET["id"]);
    $department = getAllDEpartments();
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Student</title>
</head>
<body>
    <?php require_once "header.php" ?>
    <form action="" method="post">
        <fieldset>
            <legend><b>Add Student</b></legend>
                 <table>
                     <tr><?php echo $err_db?></tr>
                     <tr>
                        <td><input type="hidden" name="id" value="<?php echo $student['id']; ?>"></td>
                        
                    </tr>
                    <tr>
                        <td><b>Name :</b></td>
                        <td><input type="text" name="name" value="<?php echo $student['name']; ?>"></td>
                        <td><span> <?php echo $err_name; ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Credit :</b></td>
                        <td><input type="text" name="credit" value="<?php echo $student['credit']; ?>"></td>
                        <td><span><?php echo $err_credit; ?> </span></td>
                    </tr>
                    <tr>
                        <td><b>cgpa:</b></td>
                        <td>
                            <input type="text" name="cgpa" value="<?php echo $student['cgpa']; ?>">
                        </td>
                        <td><span><?php echo $err_cgpa; ?> </span></td>
                    </tr>
                    <tr>
                        <td><b>Date Of Birth :</b></td>
                        <td>
                            <input type="text" name="dob" value="<?php echo $student['dob']; ?>" placeholder="dd/mm/yy"><br>
                        </td>
                        <td><span><?php echo $err_dob; ?> </span></td>
                    </tr>
                    <tr>
                        <td><b>Department :</b></td>
                        <td>
                            <select name="dpt_id">
                                <?php
                                   foreach($department as $c){
                                    if($c['id']==$student['d_id']){
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
					<td colspan="2" align="right"><input type="submit" name="edit_student" value="Edit"></td>
					
				</tr>
            </table>
        </fieldset>
    </form>
</body>
</html>