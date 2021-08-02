<?php

$err_note = "";
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
                $target="./uploads/".$_FILES['n_name']['name'];
                move_uploaded_file($_FILES["n_name"]["tmp_name"],$target);
                $rs = saveNote($_GET["id"],$course_id,$_FILES["n_name"]["name"]);
                if($rs!==true){
                    $err_db=$rs;
                }
               
            }
        }

    }
    elseif(isset($_GET["dfile"])){
        $file=$_GET["dfile"];
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename='.$file);        
        file_get_contents($file);
     
    }
    elseif (isset($_GET["delfile"])) {
        $file="./uploads/".$_GET["delfile"];

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