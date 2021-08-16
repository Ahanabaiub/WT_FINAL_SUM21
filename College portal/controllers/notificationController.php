<?php
 require_once "../models/db_config.php";

 $message="";
 $err_message="";


 if(isset($_POST["add_notification"])){
     



    $secId=$_GET['secId'];
    $subId=$_GET["subid"];
    $tid=$_GET["tid"];

    if(isset($_POST["message"])){
        $message=$_POST["message"];
         addNotification($secId,$subId,$tid,$message);
         header("location: allAssignedSection.php");
    }
    else{
        $err_message="Type a notification";
    }
    


 }


 function addNotification($secId,$subId,$tid,$message){
     $query="insert into notifications values(NULL,$secId,$subId,'$message',$tid,NULL)";
     return execute($query);
 }

?>