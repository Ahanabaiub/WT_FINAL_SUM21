<?php include_once "header.php"; ?>
<?php
   include_once "../../controllers/c/CourseController.php";
   if(isset($_COOKIE["message"])){
    echo $_COOKIE["message"];
}
?>


<html>
<head>
 
</head>
<body> 
          <h2>Create COURSE</h2>
                <form action=""  onsubmit="return validate()"  method="post">
                            <table>
                                <tr><?php echo $err_db?></tr>
                                <tr>
                                    <td><b>Name :</b></td>
                                    <td><input type="text"  id="name" name="name" value="<?php echo $name; ?>"></td>
                                    <td><span id="err_name"> <?php echo $err_name; ?></span></td>
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
                                    <td><b>Year:</b></td>
                                    <td>
                                        <input type="text" id="year" name="year" value="<?php echo $year; ?>"><br>
                                    </td>
                                    <td><span id="err_year"><?php echo $err_year; ?> </span></td>
                                </tr>
                            <tr>
                                <td  align="center"><input type="submit" name="add_course" value="Add Course"></td>
                                
                            </tr>
                        </table>
                </form>
</body>
<script>
      var hasError=false;
      function get(id){
			return document.getElementById(id);
		}

function validate(){

    console.log("hello");
  
   
    refresh();
   

        if(get("name").value == ""){
            hasError = true;
            get("err_name").innerHTML = "*Name Required.";
        }
        else if(get("name").value.length <=3){
            hasError = true;
            get("err_name").innerHTML = "*Name must be > 3 char";
        }

      


        if(get("department").selectedIndex == 0){
            hasError = true;
            get("err_department").innerHTML = "*Department Required.";
        }

        if(get("year").value == ""){
            hasError = true;
            get("err_year").innerHTML = "*Year Required.";
        }



        return !hasError;     

}

function refresh(){
        hasError=false;
        get("err_name").innerHTML ="";
       
        get("err_department").innerHTML ="";
        get("err_year").innerHTML = "";
       
    }
</script>
</html>
<?php include "footer.php"; ?>