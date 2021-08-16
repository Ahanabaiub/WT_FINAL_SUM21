<?php    
require_once "../controllers/notificationController.php";

?>

<h1>Notifications</h1>

<div>

<form action="" method="post">
	
    <fieldset>
    <?php
      
    ?>
        <table>
           
            <tr>
                <td>Notification: </td>
                <td>: <textarea  name="message" ><?php echo $message; ?></textarea> </td>
                <td><span > <?php echo $err_message;?> </span></td>
            </tr>
          
            
            <tr>
                <td colspan="2" align="right"><input type="Submit" name="add_notification" value="Add"></td>
                
            </tr>
        </table>
    </fieldset>
    </form>
</div>