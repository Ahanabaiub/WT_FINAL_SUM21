<?php
    require_once "./checkAuthorization.php";
    include_once "../controllers/studentController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">
    <title>Create Student</title>
</head>
<body>
<?php  require_once "./headerDash.php"; ?>
<div class="main-container">
        <?php  include_once "./adminNav.php"?> 
        <div class="home">
            <h2>Student Management</h2>
            <div class="students-section">
                <h3>Student Creation Form</h3>
                <form action="" method="post">
        <fieldset>
            <legend><b>Add Student</b></legend>
                 <table>
                     <tr><?php echo $err_db?></tr>
                     <tr>
                        <td><b>College Id :</b></td>
                        <td><input type="text" name="cid" value="<?php echo $cid; ?>"></td>
                        <td><span> <?php echo $err_cid; ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Name :</b></td>
                        <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                        <td><span> <?php echo $err_name; ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Address:</b></td>
                        <td><input type="text" name="address" value="<?php echo $address; ?>"></td>
                        <td><span><?php echo $err_address; ?> </span></td>
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
                                   foreach($departments as $c){
                                    echo "<option value='".$c["id"]."'>".$c["d_name"]."</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td><span><?php echo $err_department; ?> </span></td>
                    </tr>
                    <tr>
                        <td><b>Year :</b></td>
                        <td>
                            <input type="text" name="year" value="<?php echo $year; ?>"><br>
                        </td>
                        <td><span><?php echo $err_year; ?> </span></td>
                    </tr>
                    <tr>
                        <td><b>Blood Group :</b></td>
                        <td>
                            <input type="text" name="blood" value="<?php echo $blood; ?>"><br>
                        </td>
                        <td><span><?php echo $err_blood; ?> </span></td>
                    </tr>
                    <tr>
                        <td><b>Password:</b></td>
                        <td>
                            <input type="text" name="password" value="<?php echo $password; ?>"><br>
                        </td>
                        <td><span><?php echo $err_password; ?> </span></td>
                    </tr>
                <tr>
					<td colspan="2" align="right"><input type="submit" name="add_student" value="Add"></td>
					
				</tr>
            </table>
        </fieldset>
    </form>
            </div>
        </div> 
    </div>
    
</body>
</html>