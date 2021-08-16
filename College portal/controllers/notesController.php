<?php

$err_note = "";
$err_assignment="";
$err_db ="";
$course_id = getCourseIdbyName($_GET['sub']);

    if(isset($_POST["add_note"])){

       // echo "file name: ".gettype($_FILES['n_name']['name']);

        if(empty($_FILES['n_name']['name'])){
            $err_note="Choose a file.";
        }
        else{
            $type= strtolower(pathinfo(basename($_FILES['n_name']['name']), PATHINFO_EXTENSION));
          
            if($type!="pdf"){
                $err_note="Choose pdf file only.";
            }
            else{
                $target="./uploads/".$_GET["sub"]."_".$_GET["sec"];
                if(!is_dir($target)){
                    mkdir($target);
                }
                $fileName = str_replace(" ","_",$_FILES['n_name']['name']);
                $target=$target."/".$fileName;
                //$target="./uploads/".$_FILES['n_name']['name'];
                move_uploaded_file($_FILES["n_name"]["tmp_name"],$target);
                $rs = saveNote($_GET["id"],$course_id,$fileName);
                if($rs!==true){
                    $err_db=$rs;
                }
               
            }
        }

    }
    elseif(isset($_GET["dfile"])){

        $file="./uploads/".$_GET["sub"]."_".$_GET["sec"]."/".$_GET["dfile"];
    
        if(!file_exists($file)){ // file does not exist
            $err_db="file does not exist";
        } else {
            header("Content-Disposition: attachment; filename=" . $_GET["dfile"]);   
            $fp = fopen($file, "r");
            while (!feof($fp))
            {
                echo fread($fp, 65536);
                flush(); // this is essential for large downloads
            } 
            fclose($fp); 
        }
     
    }
    elseif (isset($_GET["delfile"])) {
        //echo $_GET["delfile"]." ".$_GET["delfileId"];
        $file="./uploads/".$_GET["sub"]."_".$_GET["sec"]."/".$_GET["delfile"];

        if(file_exists($file)){
            if(!(unlink($file) && deleteNotebyId($_GET["delfileId"]))){
                $err_db = "File cannot deleted due to an error.";
            }
    
            $pos=strpos($_SERVER["REQUEST_URI"],"&delfile");
            header("Location: ".substr($_SERVER["REQUEST_URI"],0,$pos));
        }
        else{
            $err_db = "File Does not exists";
        }
       
    }


    function saveNote($section_id,$course_id,$fileName){
        $fileName = str_replace(" ","_",$fileName);
        $query="insert into notes values(NULL,$section_id,$course_id,'$fileName')";
        return execute($query);

    }

    function  getCourseIdbyName($name){
        $query = "select * from courses where name = '$name'";
        $rs = get($query);
        $val =  $rs[0];
       // echo "id: ".$val["id"];
        return $val["id"];
    }

    function getAllNotes($section_id,$course_id){
        $query="select * from notes where section_id=$section_id and course_id=$course_id";
        $rs = get($query);
        return $rs;
    }

    function deleteNotebyId($id){
        $query="delete from notes where id=$id";
        return execute($query);
    }


?>
