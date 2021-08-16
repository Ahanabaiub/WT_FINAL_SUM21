<?php

    require_once "../controllers/notificationController.php";

    $notifications = getAllNotifications($_GET["secId"]);

    
?>


<div >
    <h1>Notifications</h1>


    <?php

        foreach($notifications as $n){
            $teacherName = getTeacherName($n["teacher_id"]);
                            
                echo '<div style="width: 350px; padding:10px 15px; background-color: #00e5ff;">';
                echo '<h3>'.$teacherName.'</h3>';
                echo '<p>'.$n["message"].'</p>';
                echo '<small>'.$n["given_time"].'</small>';
                echo '</div>';
                echo "<br>";

        }

    ?>




</div>