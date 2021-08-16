<?php
    //require_once "./checkAuthorization.php";
    include_once "../../controllers/c/teacherController.php";
    $teacher = getTeacher($_GET["id"]);
    $department = getAllDEpartments();
    if(isset($_COOKIE["message"])){
        echo $_COOKIE["message"];
    }
?>


<html>
<head>
    
</head>
<body>
            <h2>Teacher Management</h2>
         <form action="" method="post">
        <fieldset>
            <b>Edit Teacher</b>
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
					<td  align="center"><input type="submit" name="edit_teacher" value="Edit"></td>
					
				</tr>
            </table>
        </fieldset>
    </form>
</body>
</html>