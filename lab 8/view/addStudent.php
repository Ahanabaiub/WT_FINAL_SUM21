<?php
    require_once "../controller/studentController.php";

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
                    <tr>
                        <td><b>Name :</b></td>
                        <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                        <td><span> <?php echo $err_name; ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Credit :</b></td>
                        <td><input type="text" name="credit" value="<?php echo $credit; ?>"></td>
                        <td><span><?php echo $err_credit; ?> </span></td>
                    </tr>
                    <tr>
                        <td><b>cgpa:</b></td>
                        <td>
                            <input type="text" name="cgpa" value="<?php echo $cgpa; ?>" placeholder="Number">
                        </td>
                        <td><span><?php echo $err_cgpa; ?> </span></td>
                    </tr>
                    <tr>
                        <td><b>Date Of Birth :</b></td>
                        <td>
                            <input type="text" name="dob" value="<?php echo $dob; ?>" placeholder="dd/mm/yy"><br>
                        </td>
                        <td><span><?php echo $err_dob; ?> </span></td>
                    </tr>
                    <tr>
                        <td><b>Department :</b></td>
                        <td>
                            <select name="department">
                                <option disabled selected>Department</option>
                                <?php
                                   foreach($department as $c){
                                    echo "<option value='".$c["id"]."'>".$c["name"]."</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td><span><?php echo $err_department; ?> </span></td>
                    </tr>
                <tr>
					<td colspan="2" align="right"><input type="submit" name="add_student" value="Add"></td>
					
				</tr>
            </table>
        </fieldset>
    </form>
</body>
</html>