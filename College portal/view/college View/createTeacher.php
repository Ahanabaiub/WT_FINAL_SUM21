<?php include "header.php"; ?>
<?php
    include_once "../../controllers/c/teacherController.php";
?>


<html>
<head>
    
</head>
<body> <h3>Teacher Creation Form</h3>
                <form action=""  method="post">
        <fieldset>
            
                 <table>
                     <tr><?php echo $err_db?></tr>
                     <tr>
                        <td><b>College Id :</b></td>
                        <td><input type="text"  name="cid" value="<?php echo $cid; ?>"></td>
                        <td><span id="erId"> <?php echo $err_cid; ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Name :</b></td>
                        <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                        <td><span id="err_name"> <?php echo $err_name; ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Address:</b></td>
                        <td><input type="text" name="address"  value="<?php echo $address; ?>"></td>
                        <td><span id="err_address"><?php echo $err_address; ?> </span></td>
                    </tr>
                    <tr>
                        <td><b>Department :</b></td>
                        <td>
                            <select name="department" >
                                <option disabled selected>Department</option>
                                <?php
                                   foreach($departments as $c){
                                    echo "<option value='".$c["id"]."'>".$c["d_name"]."</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td><span ><?php echo $err_department; ?> </span></td>
                    </tr>
                    <tr>
                        <td><b>Password:</b></td>
                        <td>
                            <input type="text"  name="password" value="<?php echo $password; ?>"><br>
                        </td>
                        <td><span><?php echo $err_password; ?> </span></td>
                    </tr>
                <tr>
					<td  align="center"><input type="submit" name="add_teacher" value="Add teacher"></td>
					
				</tr>
            </table>
        </fieldset>
    </form>
</body>
</html>
<?php include "footer.php"; ?>