<?php include "header.php"; ?><?php
   
   include_once "../../controllers/c/CourseController.php";
    $course = getCourse($_GET["id"]);
    
    $department = getAllDEpartments();
?>

<html>
<head>
    <title>Edit Subjects</title>
</head>
<body> 
                 <h3>Edit course</h3>
               <form action="" method="post">
                            <table>
                                <tr><?php echo $err_db?></tr>
                                <input type="hidden" name="id" value=<?php echo $course["id"] ?>>
                                <tr>
                                    <td><b>Name :</b></td>
                                    <td><input type="text" name="name" value="<?php echo $course["name"]; ?>"></td>
                                    <td><span> <?php echo $err_name; ?></span></td>
                                </tr>
                                <tr>
                                    <td><b>Department :</b></td>
                                    <td>
                                        <select name="department">
                                            <option disabled selected>Department</option>
                                            <?php
                                            foreach($departments as $c){
                                                if($c['id']==$course['department_id']){
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
                                    <td><b>Year:</b></td>
                                    <td>
                                        <input type="text" name="year" value="<?php echo  $course["year"]; ?>"><br>
                                    </td>
                                    <td><span><?php echo $err_year; ?> </span></td>
                                </tr>
                            <tr>
                                <td colspan="2" align="right"><input type="submit" name="edit_course" value="Add"></td>
                                
                            </tr>
                        </table>
                </form>
</body>
</html>
<?php include "footer.php"; ?>
