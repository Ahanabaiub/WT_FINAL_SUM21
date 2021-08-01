<?php
    include "../model/catagoryController.php";
    $id = $_GET["id"]; 
    $c= getCategory($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Catagory</title>
</head>
<body>
<?php  include 'header.php';?>
<form action="" method="post">
        <fieldset>
                <table>
                    <tr>
                        <td></td>
                        <td><h2>Edit Catagory</h2></td>
                        <span><?php $err_db?></span>
                    </tr>
                    <tr>
                        <td><b>Name :</b></td>
                        <td><input type="text" name="name" value="<?php echo $c["name"]; ?>"></td>
                        <td><span> <?php echo $err_name; ?></span></td>
                    </tr>   
                    <tr>
					    <td><input type="submit" name="edit_ctg" value="Submit"></td>
				    </tr>
                </table>    
        </fieldset>
    </form>
<?php  include 'footer.php';?>
</body>
</html>