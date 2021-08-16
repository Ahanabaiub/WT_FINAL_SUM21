<?php 

    include_once "header.php";
  


?>
<html>
<header>
	
</header>
<body>
    <?php
         if(isset($_COOKIE["message"])){
            echo $_COOKIE["message"];
        }
    ?>
<ul>
<li> <a href="allCourses.php";>SEE ALL COURSE </a></li>
<li> <a href="CourseCreation.php";>CREATE COURSE </a></li>

<li> <a href="allTeacher.php";>SEE ALL TEACHER </a></li>
<li> <a href="createTeacher.php";>ADD TEACHER </a></li>

<li> <a href="assignTeacher.php";>ASSIGN TEACHER </a></li>
<li><a href="logout.php"> LOGOUT </a></li>
<ul>
</body>
 

</html>
<?php include "footer.php"; ?>