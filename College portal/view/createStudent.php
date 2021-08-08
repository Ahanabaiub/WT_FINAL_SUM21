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
                <form action="" method="post" onsubmit="return validate()">
        <fieldset>
           
                 <table>
                     <tr><?php echo $err_db?></tr>
                     <tr>
                        <td><b>College Id :</b></td>
                        <td><input type="text" id="cid" onfocusout="checkIdExistance(this.value)" name="cid" value="<?php echo $cid; ?>"></td>
                        <td><span id="erId"> <?php echo $err_cid; ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Name :</b></td>
                        <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                        <td><span id="err_name"> <?php echo $err_name; ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Address:</b></td>
                        <td><input type="text" name="address" value="<?php echo $address; ?>"></td>
                        <td><span id="err_address"><?php echo $err_address; ?> </span></td>
                    </tr>
                    <tr>
                        <td><b>Date Of Birth :</b></td>
                        <td>
                            <input type="text" name="dob" value="<?php echo $dob; ?>" placeholder="dd/mm/yy"><br>
                        </td>
                        <td><span id="err_dob"><?php echo $err_dob; ?> </span></td>
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
                        <td><span id="err_department"><?php echo $err_department; ?> </span></td>
                    </tr>
                    <tr>
                        <td><b>Year :</b></td>
                        <td>
                            <input type="text" name="year" value="<?php echo $year; ?>"><br>
                        </td>
                        <td><span id="err_year"><?php echo $err_year; ?> </span></td>
                    </tr>
                    <tr>
                        <td><b>Blood Group :</b></td>
                        <td>
                            <input type="text" name="blood" value="<?php echo $blood; ?>"><br>
                        </td>
                        <td><span id="err_blood"><?php echo $err_blood; ?> </span></td>
                    </tr>
                    <tr>
                        <td><b>Password:</b></td>
                        <td>
                            <input type="text" name="password" value="<?php echo $password; ?>"><br>
                        </td>
                        <td><span id="err_password"><?php echo $err_password; ?> </span></td>
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

    <script>
        function checkIdExistance(tid){
            if(tid.length==0){
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("GET","utils/studentIdCheck.php?id="+tid,true);
            xhr.onreadystatechange=function(){
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById("erId").innerHTML = this.responseText;
                }
            };
            xhr.send();
            
        }


        function validate(){

        }
    </script>
    
</body>
</html>