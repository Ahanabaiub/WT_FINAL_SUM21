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
                <form action="" method="post">
                            <table>
                                <tr><?php echo $err_db?></tr>
                                <tr>
                                    <td><b>Name :</b></td>
                                    <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                                    <td><span> <?php echo $err_name; ?></span></td>
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
                                    <td><b>Year:</b></td>
                                    <td>
                                        <input type="text" name="year" value="<?php echo $year; ?>"><br>
                                    </td>
                                    <td><span><?php echo $err_year; ?> </span></td>
                                </tr>
                            <tr>
                                <td  align="center"><input type="submit" name="add_course" value="Add Course"></td>
                                
                            </tr>
                        </table>
                </form>
</body>
</html>
<?php include "footer.php"; ?>