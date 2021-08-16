<?php include "header.php"; ?>
<?php
    include_once "../../controllers/c/courseTeacher.php";
    $teachers = getTeachersByDepartment($_GET['dept']);
    if(isset($_COOKIE["message"])){
        echo $_COOKIE["message"];
    }
    
?>


<html >
<head>
</head>
<body> 
   <h3>Assign teacher </h3>
                   
                    <form action="" method="post">
                            <table>
                                <tr><?php echo $err_db?></tr>
                                <tr>
                                    <td><b>Teacher :</b></td>
                                    <td>
                                        <select name="id">
                                            <option disabled selected>Teacher</option>
                                            <?php
                                            foreach($teachers as $c){
                                                
                                                echo "<option value='".$c["id"]."'>".$c["name"]."</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td><span> <?php echo $err_id; ?></span></td>
                                </tr>
        
                            <tr>
                                <td colspan="2" align="right"><input type="submit" name="add_crs_tec" value="Add"></td>
                                
                            </tr>
                        </table>
                </form>
</body>
</html>
<?php include "footer.php"; ?>