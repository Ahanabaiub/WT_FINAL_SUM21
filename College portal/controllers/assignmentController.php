<?php

$err_assignment="";
$err_db ="";


if(isset($_POST["add_assignment"])){

    // echo "file name: ".gettype($_FILES['n_name']['name']);

     if(empty($_FILES['assignment_name']['name'])){
         $err_note="Choose a file.";
     }
     else{
         $type= strtolower(pathinfo(basename($_FILES['assignment_name']['name']), PATHINFO_EXTENSION));
       
         if($type!="pdf"){
             $err_note="Choose pdf file only.";
         }
         else{
             $target="./uploads/".$_GET["sub"]."_".$_GET["sec"];
             if(!is_dir($target)){
                 mkdir($target);
             }
             $fileName = str_replace(" ","_",$_FILES['assignment_name']['name']);
             $target=$target."/".$fileName;
             //$target="./uploads/".$_FILES['n_name']['name'];
             move_uploaded_file($_FILES["assignment_name"]["tmp_name"],$target);
             $rs = saveNote($_GET["id"],$course_id,$fileName);
             if($rs!==true){
                 $err_db=$rs;
             }
            
         }
     }

 }

?>