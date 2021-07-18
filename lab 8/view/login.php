<?php
    include_once "../controller/userController.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form action="" method="POST">
        <fieldset>
                <table>
                    <tr>
                        <td></td>
                        <td><h2>Login</h2></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><span><?php echo $db_err; ?></span></td>
                    </tr>
                    <tr>
                        <td><b>User Name :</b></td>
                        <td><input type="text" name="cid" value="<?php echo $cid; ?>"></td>
                        <td><span> <?php echo $err_cid; ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Password :</b></td>
                        <td><input type="text" name="password" value="<?php echo $password; ?>"></td>
                        <td><span> <?php echo $err_password; ?></span></td>
                    </tr>    
                    <tr>
					    <td colspan="2" align="right"><input type="submit" name="submit" value="Submit"></td>
				    </tr>
        </fieldset>

    </form>
    
</body>
</html>