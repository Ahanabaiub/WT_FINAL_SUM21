<?php
include '../controller/catagoryController.php';
$key = $_GET['key'];
$catagories = searchCatagory($key);

if(count($catagories)>0){
    foreach($categories as $c){
       
        echo "<td>".$c['name']."</td>";
    }
}
?>