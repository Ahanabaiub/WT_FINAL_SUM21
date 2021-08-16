<?php include 'validations.php';?>
<html>
	<head>
		<script>
			var hasError=false;
			function get(id){
				return document.getElementById(id);
			}
			
			function validate(){
				refresh();
				if(get("teachername").value == ""){
					hasError = true;
					get("err_teachername").innerHTML = "*Name Required";
				}
				else if(get("teachername").value.length <=2){
					hasError = true;
					get("err_teachername").innerHTML = "*Name must be > 2 char";
				}
				if(get("comment").value == ""){
					hasError = true;
					get("err_comment").innerHTML = "*Comment Required";
				}
				if(!get("Good").checked && !get("Average").checked && !get("Bad").checked){
					hasError=true;
					get("err_pre").innerHTML = "*Prepared Required";
					
				}
				if(!get("Friendly").checked && !get("Rude").checked && !get("Kind").checked){
					hasError=true;
					get("err_beh").innerHTML = "*Behaviour Required";
					
				}
				if(!get("Very Much").checked && !get("Little").checked && !get("Not So").checked){
					hasError=true;
					get("err_ins").innerHTML = "*Instructions Required";
					
				}
				
				if(!get("Well Organized").checked && !get("Medium").checked && !get("Messed Up").checked){
					hasError=true;
					get("err_man").innerHTML = "*Management Required";
					
				}
				
				
				return !hasError;
				
			}
			function refresh(){
				hasError=false;
				get("err_teachername").innerHTML ="";
				get("err_comment").innerHTML ="";
				get("err_pre").innerHTML ="";
				get("err_beh").innerHTML ="";
				get("err_ins").innerHTML ="";
				get("err_man").innerHTML ="";
				
				
				
			}
		</script>
	</head>
	
	<body>
		<form action="" onsubmit="return validate()" method="post">
		<fieldset>
		<?php
		    echo"<h1>Create Teacher Feedback Form<h1>";
		?>
			<table>
				<tr>
					<td>TeacherName</td>
					<td>: <input id="teachername" type="text" name="teachername" value="<?php echo $teachername; ?>" placeholder="Enter Teacher Name "> </td>
					<td><span id="err_teachername"> <?php echo $err_teachername;?> </span></td>
				</tr>
				<tr>
				     <td>How Prepared Is The Teacher's Lesson Plan?</td>
					<td>: <input type="radio" id="Good" value="Good" <?php if($prepared=="Good") echo "checked"; ?> name="prepared"> Good <input name="prepared" id="Average" <?php if($prepared=="Average") echo "checked"; ?> value="Average" type="radio"> Average <input name="prepared" id="Bad" <?php if($prepared=="Bad") echo "checked"; ?> value="Bad" type="radio"> Bad </td>
					<td><span id="err_pre"> <?php echo $err_prepared;?> </span></td>
				</tr>
				
				<tr>
				     <td>How Is The Teacher's Overall Behaviour?</td>
					<td>: <input type="radio" id="Friendly" value="Friendly" <?php if($behaviour=="Friendly") echo "checked"; ?> name="behaviour"> Friendly <input name="behaviour" id="Rude" <?php if($behaviour=="Rude") echo "checked"; ?> value="Rude" type="radio"> Rude <input name="behaviour" id="Kind" <?php if($behaviour=="Kind") echo "checked"; ?> value="Kind" type="radio"> Kind </td>
					<td><span id="err_beh"> <?php echo $err_behaviour;?> </span></td>
				</tr>
				
				<tr>
				     <td>How Clear And Intersting Are The Instructions?</td>
					<td>: <input type="radio" id="Very Much" value="Very Much" <?php if($instructions=="Very Much") echo "checked"; ?> name="instructions"> Very Much <input name="instructions" id="Little" <?php if($instructions=="Little") echo "checked"; ?> value="Little" type="radio"> Little <input name="instructions" id="Not So" <?php if($instructions=="Not So") echo "checked"; ?> value="Not So" type="radio"> Not So </td>
					<td><span id="err_ins"> <?php echo $err_instructions;?> </span></td>
				</tr>
						
				<tr>
				     <td>How Is The Teacher's Classroom Management ?</td>
					<td>: <input type="radio" id="Well Organized" value="Well Organized" <?php if($management=="Well Organized") echo "checked"; ?> name="management"> Well Organized <input name="management" id="Medium" <?php if($management=="Medium") echo "checked"; ?> value="Medium" type="radio"> Medium <input name="management" id="Messed Up" <?php if($management=="Messed Up") echo "checked"; ?> value="Messed Up" type="radio"> Messed Up </td>
					<td><span id="err_man"> <?php echo $err_management;?> </span></td>
				</tr>
				<tr>
					<td>Comment</td>
					<td>: <textarea id="comment" name="comment" ><?php echo $comment; ?></textarea>
					<td><span id="err_comment"> <?php echo $err_comment;?> </span></td>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="right"><input type="submit" name="submit" value="Submit"></td>
					
				</tr>
			</table>
		</fieldset>
		</form>
	</body>
</html>