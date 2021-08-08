<?php
    //require_once "./checkAuthorization.php";
    include_once "../controllers/teacherController.php";
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
            <h2>Teacher Management</h2>
            <div class="students-section">
                <h3>Teacher Creation Form</h3>
                <form action="" onsubmit="return validate()" method="post">
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
                        <td><input type="text" name="name" id="name" value="<?php echo $name; ?>"></td>
                        <td><span id="err_name"> <?php echo $err_name; ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Address:</b></td>
                        <td><input type="text" name="address" id="address" value="<?php echo $address; ?>"></td>
                        <td><span id="err_address"><?php echo $err_address; ?> </span></td>
                    </tr>
                    <tr>
                        <td><b>Department :</b></td>
                        <td>
                            <select name="department" id="department">
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
                        <td><b>Password:</b></td>
                        <td>
                            <input type="text" id="password" name="password" value="<?php echo $password; ?>"><br>
                        </td>
                        <td><span id='err_password'><?php echo $err_password; ?> </span></td>
                    </tr>
                <tr>
					<td colspan="2" align="right"><input type="submit" name="add_teacher" value="Add"></td>
					
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
            xhr.open("GET","utils/teacherIdCheck.php?id="+tid,true);
            xhr.onreadystatechange=function(){
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById("erId").innerHTML = this.responseText;
                }
            };
            xhr.send();
            
        }


        function get(id){
			return document.getElementById(id);
		}

        

        //////.........Javascript Clint side form validation...............
        var hasError=false;


        function validate(){
           
            refresh();
           

                if(get("name").value == ""){
					hasError = true;
					get("err_name").innerHTML = "*Name Required.";
				}
				else if(get("name").value.length <=3){
					hasError = true;
					get("err_name").innerHTML = "*Name must be > 3 char";
				}

                if(get("cid").value == ""){
					hasError = true;
					get("erId").innerHTML = "*College ID Required.";
				}
				else if(parseInt(get("cid").value) <3000 || parseInt(get("cid").value)>=4000){
					hasError = true;
					get("erId").innerHTML = "*Name must be >= 3000 and <4000";
				}

                if(get("address").value == ""){
					hasError = true;
					get("err_address").innerHTML = "*Address Required.";
				}



                if(get("department").selectedIndex == 0){
					hasError = true;
					get("err_department").innerHTML = "*Department Required.";
				}


                if(get("password").value == ""){
					hasError = true;
					get("err_password").innerHTML = "*Password Required.";
				}
			



                return !hasError;     

        }

        function refresh(){
				hasError=false;
				get("err_name").innerHTML ="";
				get("erId").innerHTML ="";
				get("err_address").innerHTML ="";
				get("err_department").innerHTML ="";
                get("err_password").innerHTML = "";
			}
    </script>
    
</body>
</html>