<?php include_once "header.php"; ?>
<?php
     include_once "../../models/db_config.php" ;
 $cid = "";
 $err_cid = "";
 $id = "";
 $name = "";
 $err_name="";
 $address = "";
 $err_address = "";
 $password = "";
 $err_password  ="";
 $departments = getAllDepartments();
 $department = "";
     $err_department = "";

     $enroll_year = "";
     $enroll_month = "";
     $err_report = "";

     $hasError = false;
	 $err_db="";

     if(isset($_POST["add_teacher"])){

          if(empty($_POST["cid"])){
               $hasError = true;
               $err_cid  ="College ID Required.";
           }
           else{
               $cid= $_POST["cid"];
           }

          if(empty($_POST["name"])){
              $hasError = true;
              $err_name  ="Name Required.";
          }
          else{
              $name = $_POST["name"];
          }
      
         
          if(empty($_POST["address"])){
               $hasError = true;
               $err_address  ="address Required.";
          }
          else{
               $address = $_POST["address"];
          }

          if(empty($_POST["password"])){
               $hasError = true;
               $err_password  ="password Required.";
          }
          else{
               $password = $_POST["password"];
          }

          if(empty($_POST["department"])){
               $hasError = true;
               $err_department  ="department Required.";
          }
          else{
               $department = $_POST["department"];
          }
      
      
          if(!$hasError){
              $rs = insertTeacher($cid,$name,$department,$address,$password);
                if ($rs === true){
                     header("Location: ./allTeachers.php");
                }
                $err_db = $rs;
      
          }
      
      }
      elseif (isset($_POST["edit_teacher"])) {
           $id = $_POST["id"];
          if(empty($_POST["cid"])){
               $hasError = true;
               $err_cid  ="College ID Required.";
           }
           else{
               $cid= $_POST["cid"];
           }

          if(empty($_POST["name"])){
              $hasError = true;
              $err_name  ="Name Required.";
          }
          else{
              $name = $_POST["name"];
          }
      

          if(empty($_POST["address"])){
               $hasError = true;
               $err_address  ="address Required.";
          }
          else{
               $address = $_POST["address"];
          }


          if(empty($_POST["department"])){
               $hasError = true;
               $err_department  ="department Required.";
          }
          else{
               $department = $_POST["department"];
          }

          if(!$hasError){
               $rs = editTeacher($id,$cid,$name,$department,$address);
                 if ($rs === true){
                      header("Location: ./allTeachers.php");
                 }
                 $err_db = $rs;
       
           }
      
      }
      elseif(isset($_GET["del"])){

          $rs= deleteTeacher($_GET['del']);

          if($rs === true){
               header("Location:allTeachers.php");
          }
          $err_db = $rs;
      }
      elseif (isset($_POST["s_e_search"])) {

          if(empty($_POST["year"]) && empty($_POST["month"])){
               $err_report = "Select Year or Month.";
               $hasError = true;
          }
          else{
               $enroll_year = $_POST["year"];
               $enroll_month = $_POST["month"];
          }

         
     
      }
    


     function getAllTeachers(){
          $query ="select t.*,d.d_name from teachers t left join departments d on t.department_id = d.id";
          $rs = get($query);
          return $rs;
     }

     function insertTeacher($cid,$name,$department,$address,$password){
          $query ="INSERT INTO teachers VALUES (NULL,$cid,'$name',$department,'$password','$address',NULL)";
          return execute($query);
     }

     function getTeacher($id){
          $query ="SELECT * FROM teachers where id = $id";
          $rs = get($query);
          return $rs[0];
     }

     function getAllDepartments(){
          $query ="SELECT * FROM departments";
          $rs = get($query);
          return $rs;
     }

     function editTeacher($id,$cid,$name,$department,$address){
          $query = "update teachers set cid=$cid,name='$name',department_id=$department,address='$address' where id=$id";
          return execute($query);
          
     }

     function deleteTeacher($id){

          $query = "delete from teachers where id=$id";
          return execute($query);

     }
?>
<?php include "footer.php"; ?>