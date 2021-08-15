<?php
    include_once "../controllers/userController.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        td{
            padding-top: 10px;
        }
        
.er-msg{
    color: #a30000;
}
    </style>
</head>
<body>
    <span></span>
    <form action="" method="POST">
        <div class="login-section" align="center">
            <table >
                <tr>
                    <td></td>
                    <td><h2>Login</h2></td>
                </tr>
                <tr>
                    <td></td>
                    <td><span><?php echo $db_err; ?></span></td>
                </tr>
                <tr>
                    <td><b>User ID </b></td>
                    <td>: <input type="text" name="cid" value="<?php if(isset($_COOKIE["userCookie"])){echo $_COOKIE["userCookie"];} ?>"></td>
                   
                </tr>
                <tr>
                    <td></td>
                     <td><span class="er-msg"> <?php echo $err_cid; ?></span></td>
                </tr>
                <tr>
                    <td><b>Password </b></td>
                    <td>: <input type="password" name="password" value="<?php if(isset($_COOKIE["userPass"])){echo $_COOKIE["userPass"];} ?>"></td>
                </tr> 
                <tr>
                    <td></td>
                    <td><span class="er-msg"> <?php echo $err_password; ?></span></td>
                </tr> 
                <tr>
                    <td align="right"><input type="checkbox" name="remember_me"></td>
                    <td> Remember Me</td>
                </tr>  
                <tr>
                    <td></td>
                    <td colspan="2"><input type="submit" class="login-btn" name="login_btn" value="Login"></td>
                </tr>
            </table>    
        </div>

    </form>
    
</body>
</html>