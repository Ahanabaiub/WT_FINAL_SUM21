<?php include 'formvalidations.php';?>
<html>
	<head>
		<script>
			var hasError=false;
			function get(id){
				return document.getElementById(id);
			}
			
			function validate(){
				refresh();
				if(get("first_name").value == ""){
					hasError = true;
					get("err_first_name").innerHTML = "*First Name Required";
				}
				else if(get("first_name").value.length <=2){
					hasError = true;
					get("err_first_name").innerHTML = "*Name must be > 2 char";
				}
            
				if(get("last_name").value == ""){
					hasError = true;
					get("err_last_name").innerHTML = "*Last Name Required";
				}
				else if(get("last_name").value.length <=2){
					hasError = true;
					get("err_last_name").innerHTML = "*Name must be > 2 char";
				}
				
				if(get("studentid").value == ""){
					hasError = true;
					get("err_studentid").innerHTML = "* Id Required";
				}
				
				if(get("password").value == ""){
					hasError = true;
					get("err_password").innerHTML = "*Password Required";
				}
				
				if(get("dept").selectedIndex == 0){
					hasError=true;
					get("err_dept").innerHTML = "*Department Required";
				}
				
				if(get("phonenumber").value == ""){
					hasError = true;
					get("err_phonenumber").innerHTML = "*Phone Number Required";
				}
				
				if(get("address").value == ""){
					hasError = true;
					get("err_address").innerHTML = "*Address Required";
				}
				
				
				return !hasError;
				
			}
			function refresh(){
				hasError=false;
				get("err_first_name").innerHTML ="";
				get("err_last_name").innerHTML ="";
				get("err_studentid").innerHTML ="";
				get("err_password").innerHTML ="";
				get("err_dept").innerHTML ="";
			    get("err_phonenumber").innerHTML ="";
				get("err_address").innerHTML ="";
				
				
			}
		</script>
	</head>
	<head>
	<body>
		<form action="" onsubmit="return validate()" method="post">
	
		<fieldset>
		<?php
		    echo"<h1>Update Student Form<h1>";
		?>
			<table>
				<tr>
					<td>First_Name</td>
					<td>: <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>" placeholder="Enter First_Name "> </td>
					<td><span id="err_first_name" > <?php echo $err_first_name;?> </span></td>
				</tr>
				
				<tr>
					<td>Last_Name</td>
					<td>: <input type="text"  id="last_name" name="last_name" value="<?php echo $last_name; ?>" placeholder="Enter Last_Name "> </td>
					<td><span id="err_last_name"> <?php echo $err_last_name;?> </span></td>
				</tr>
				<tr>
					<td>Student Id</td>
					<td>: <input type="text" id="studentid" name="studentid" placeholder="Enter Student Id">  </td>
					<td><span id="err_studentid"> <?php echo $err_studentid;?> </span></td>
				</tr>
				 <tr>
                        <td>Password</td>
                        <td>: <input type="password" id="password" name="password" value="<?php echo $password; ?>"></td>
                        <td><span id="err_password"><?php echo $err_password; ?> </span></td>
                    </tr>
				<tr>
					<td>Department</td>
					<td>: <select id="dept" name="department">
						<option disabled selected>---Select---</option>
						<?php
							foreach($array as $d){
								if($d == $department) 
									echo "<option selected>$d</option>";
								else
									echo "<option>$d</option>";
							}
						?>
						</select>
					</td>
					<td><span id="err_dept"> <?php echo $err_department;?> </span></td>
				</tr>
				
				<tr>
					<td>Phone Number</td>
					<td>: <input type="text" id="phonenumber" name="phonenumber" value="<?php echo $phonenumber; ?>" placeholder="Enter Phone Number "> </td>
					<td><span id="err_phonenumber" > <?php echo $err_phonenumber;?> </span></td>
				</tr>
				<tr>
					<td>Address</td>
					<td>: <input type="text" id="address" name="address" value="<?php echo $address; ?>" placeholder="Enter Address "> </td>
					<td><span id="err_address" > <?php echo $err_address;?> </span></td>
				</tr>
				
				<tr>
					<td colspan="2" align="right"><input type="Submit" name="submit" value="Update"></td>
					
				</tr>
			</table>
		</fieldset>
		</form>
	</body>
</html>