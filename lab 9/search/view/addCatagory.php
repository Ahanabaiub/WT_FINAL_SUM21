<?php
    include '../controller/catagoryController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Catagory</title>
</head>
<body>
<?php  include 'header.php';?>
    <form action="" method="post">
        <fieldset>
                <table>
                    <tr>
                        <td></td>
                        <td><h2>Add Catagory</h2></td>
                        <span><?php $err_db?></span>
                    </tr>
                    <tr>
                        <td><b>Catagory Name :</b></td>
                        <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                        <td><span> <?php echo $err_name; ?></span></td>
                    </tr>
                    <tr>
					    <td><input type="submit" name="add_catagory" value="Submit"></td>
				    </tr>
        </fieldset>
    </form>
    <?php  include 'footer.php';?>
</body>
</html>