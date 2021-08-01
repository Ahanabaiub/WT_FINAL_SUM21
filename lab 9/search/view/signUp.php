<?php
    include '../controller/signupController.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <?php  include 'header.php';?>
    <form action="" method="post">
        <fieldset>
                <table>
                    <tr>
                        <td></td>
                        <td><h2>Sign Up</h2></td>
                        <span><?php $err_db?></span>
                    </tr>
                    <tr>
                        <td><b>Name :</b></td>
                        <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
                        <td><span> <?php echo $err_name; ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Email :</b></td>
                        <td><input type="text" name="email" value="<?php echo $email; ?>"></td>
                        <td><span> <?php echo $err_email; ?></span></td>
                    </tr>
                    <tr>
                        <td><b>Password :</b></td>
                        <td><input type="text" name="password" value="<?php echo $password; ?>"></td>
                        <td><span> <?php echo $err_password; ?></span></td>
                    </tr>    
                    <tr>
					    <td><input type="submit" name="sign_up" value="Submit"></td>
				    </tr>
        </fieldset>
    </form>
    <?php  include 'footer.php';?>
</body>
</html>