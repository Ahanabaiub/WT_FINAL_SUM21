<?php
     require_once "../models/db_config.php";

     $err_db = "";
     $succ="";
     $err_id = "";
     $id="";

     $name= "";
     $err_name="";
     $department="";
     $err_department="";
     $year="";
     $err_year="";
     $session="";
     $err_session="";
     $hasError=false;

     if(isset($_POST["add_crs_tec"])){
         if(empty($_POST["id"])){
             $err_db="Choose a Teacher.";
         }
         else{
             $id=$_POST["id"];

            if(addCourseTeacher($id)){
                header("Location: sectionView.php?id=".$_GET['id'].'&sec='.$_GET['sec'].'&dept='.$_GET['dept']);
            }

            $err_db = "Something Wrong";

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
    elseif(isset($_POST["add-section"])){
        
        if(empty(trim($_POST["name"]))){
            $err_name="Name Required.";
            $hasError=true;
        }
        else{
            $name=$_POST["name"];
        }

        if(empty($_POST["department"])){
            $err_department="Department Required.";
            $hasError=true;
        }
        else{
            $department=$_POST["department"];
        }

        if(empty(trim($_POST["year"]))){
            $err_year="Year Required.";
            $hasError=true;
        }
        else{
            $year=$_POST["year"];
        }

        if(empty(trim($_POST["session"]))){
            $err_session="session Required.";
            $hasError=true;
        }
        else{
            $session=$_POST["session"];
        }


        if(!$hasError){
            $rs=createSection($department,$name,$year,$session);
            if($rs===true){
                $succ="Section Successfully Created";
            }
            else{
                $err_db=$rs;
            }
        }
    }

 function getAllsections(){

    $query ="select s.*,d.d_name from sections s left join departments d on s.department_id = d.id";
    $rs = get($query);

    return $rs;

}

function  getYearBySectionId($id){

    $query = "select year from sections where id=$id";
    $rs =  get($query);

    return $rs[0]["year"];

}

function getCoursesByDeptYear($dptName,$year){
    $dId = getdepartmentIdByName($dptName);
    $query="select * from courses where department_id=$dId and year=$year";
    $rs=get($query);
    return $rs;
}

function getdepartmentIdByName($dptName){
    $query="select id from departments where d_name='$dptName'";
    $rs = get($query);
    return $rs[0]["id"];
}

function getCourseTeacher($cId,$secId){
    $query = "select ct.*,t.name from course_teacher ct left join teachers t on ct.teacher_id=t.id WHERE ct.course_id = $cId and ct.section_id = $secId";
    $rs=get($query);
    if($rs){
        return $rs[0];
    }
    else{
        return array("name"=>"--");
    }
}

function getAllStudentsBySectionId($section_id){
    $query = "select * from students where section_id=$section_id";
    $rs = get($query);
    return $rs;
}

function getTeachersByDepartment($dept){

    $dptId = getdepartmentIdByName($dept);
    $query = "select * from teachers where department_id = $dptId";
    return get($query);

}

function checkCourseTeacherId($id,$cid){
    $query = "select *,count(*) as total from course_teacher where course_id = $cid and section_id=$id";

    $rs = get($query);

    return $rs[0];

}

function getAllDepartments(){
    $query ="SELECT * FROM departments";
    $rs = get($query);
    return $rs;
}

function addCourseTeacher($tId){
    $secId = $_GET["id"];
    $cid=$_GET["cid"];
    $ct = checkCourseTeacherId($secId,$cid);


    if($ct["total"]==0){
        $query="insert into course_teacher values(NULL,$secId,$cid,$tId)";
        return execute($query);
    }
    else{
        $ID=$ct["id"];
        $query="update course_teacher set teacher_id=$tId where id =$ID ";
        return execute($query);
    }

}

function getAllNotes($section_id,$course_id){
    $query="select * from notes where section_id=$section_id and course_id=$course_id";
    $rs = get($query);
    return $rs;
}

function  getCourseIdbyName($name){
    $query = "select * from courses where name = '$name'";
    $rs = get($query);
    $val =  $rs[0];
   // echo "id: ".$val["id"];
    return $val["id"];
}

function createSection($department,$name,$year,$session){
    $query="insert into sections values(NULL,$department,'$name',$year,'$session')";
    return execute($query);
}


function deleteNotebyId($id){
    $query="delete from notes where id=$id";
    return execute($query);
}


?>