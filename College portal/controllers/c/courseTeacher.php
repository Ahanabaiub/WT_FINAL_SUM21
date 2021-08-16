<?php
     include_once "../../models/db_config.php" ;

     $err_db = "";
     $err_id = "";
     $id="";

     if(isset($_POST["add_crs_tec"])){
         if(empty($_POST["id"])){
             $err_db="Choose Teacher";
         }
         else{
             $id=$_POST["id"];

            if(addCourseTeacher($id)){
                header("Location: assignTeacher.php?id=".$_GET['id'].'&sec='.$_GET['sec'].'&dept='.$_GET['dept']);
            }

            $err_db = "error";

         }


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
function getTeachersByDepartment($dept){

    $dptId = getdepartmentIdByName($dept);
    $query = "select * from teachers where department_id = $dptId";
    return get($query);

}