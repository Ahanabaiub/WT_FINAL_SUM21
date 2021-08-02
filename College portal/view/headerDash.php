<?php
    require_once "./checkAuthorization.php";

    $userName=$_SESSION["loggedUser"];
    $dashName=$_SESSION["dashName"];
?>

<div class="header">
    <span id="dashName"><?php echo $dashName;?></span>
   <span class="header-link">
      <a href="#"><?php echo $userName;?></a>
      <a href="./logout.php">Logout</a>
   </span>
</div>