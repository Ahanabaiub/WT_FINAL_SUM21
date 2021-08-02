<?php

    require_once "./checkAuthorization.php";

    require_once "../controllers/studentController.php";
    $totalStudent = countStudents();
    $totalTeacher = countTeachers();

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="./css/style.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php  require_once "headerDash.php"; ?>
    <div class="main-container">
      <?php require_once "./adminNav.php"?>
       <div class="home">
            <div class="home-info">
                <p><?php echo $totalStudent["total"] ?></p>
                <p>Total Students</p>
            </div>
            <div class="home-info">
            <p><?php echo $totalTeacher["total"] ?></p>
                <p>Total Faculty</p>
            </div>
            <div class="home-info">
                <p>25</p>
                <p>Total Course</p>
            </div>
            <div class="home-info">
                <p>8</p>
                <p>Total Department</p>
            </div>
       </div>
    

    </div>   
</body>
</html>