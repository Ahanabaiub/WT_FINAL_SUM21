<?php
     require_once "../models/db_config.php";

     $cid = "";
     $err_cid = "";

     $id = "";
     $name = "";
     $err_name="";

     $dob = "";
     $err_dob ="";

     $address = "";
     $err_address = "";

     $year = "";
     $err_year = "";

     $blood = "";
     $err_blood  ="";

     $password = "";
     $err_password  ="";

     $err_db="";

     $departments = getAllDepartments();
     $department = "";
     $err_department = "";

     $enroll_year = "";
     $enroll_month = "";
     $err_report = "";

     $hasError = false;

     if(isset($_POST["add_student"])){

         // echo "add student fired";

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
      
          if(empty($_POST["dob"])){
              $hasError = true;
              $err_dob  ="Date of Birth Required.";
          }
          else{
              $dob = $_POST["dob"];
          }
      
          if(empty($_POST["year"])){
              $hasError = true;
              $err_year  ="year Required.";
          }
          else{
              $year = $_POST["year"];
          }

          if(empty($_POST["blood"])){
               $hasError = true;
               $err_blood  ="blood Required.";
          }
          else{
               $blood = $_POST["blood"];
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
              $rs = insertStudent($cid,$name,$department,$address,$dob,$year,$blood,$password);
                if ($rs === true){
                     header("Location: ./allStudents.php");
                }
                $err_db = $rs;
      
          }
      
      }
      elseif (isset($_POST["edit_student"])) {
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
      
          if(empty($_POST["dob"])){
              $hasError = true;
              $err_dob  ="Date of Birth Required.";
          }
          else{
              $dob = $_POST["dob"];
          }
      
          if(empty($_POST["year"])){
              $hasError = true;
              $err_year  ="year Required.";
          }
          else{
              $year = $_POST["year"];
          }

          if(empty($_POST["blood"])){
               $hasError = true;
               $err_blood  ="blood Required.";
          }
          else{
               $blood = $_POST["blood"];
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
               $rs = editStudent($id,$cid,$name,$department,$address,$dob,$year,$blood);
                 if ($rs === true){
                      header("Location: ./allStudents.php");
                 }
                 $err_db = $rs;
       
           }
      
      }
      elseif(isset($_GET["del"])){

          $rs= deleteStudent($_GET['del']);

          if($rs === true){
               header("Location: ./allStudents.php");
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
    


     function getAllStudents(){
          $query ="select s.*,d.d_name from students s left join departments d on s.department_id = d.id";
          $rs = get($query);
          return $rs;
     }

     function insertStudent($cid,$name,$department,$address,$dob,$year,$blood,$password){
          $query ="INSERT INTO students VALUES (NULL,$cid,'$name',$department,'$address','$dob',$year,'$blood','$password',NULL,NULL)";
          return execute($query);
     }

     function getStudent($id){
          $query ="SELECT * FROM students where id = $id";
          $rs = get($query);
          return $rs[0];
     }

     function getAllDepartments(){
          $query ="SELECT * FROM departments";
          $rs = get($query);
          return $rs;
     }

     function editStudent($id,$cid,$name,$department,$address,$dob,$year,$blood){
          $query = "update students set cid=$cid,name='$name',department_id=$department,address='$address',dob='$dob',year=$year,blood='$blood' where id=$id";
          return execute($query);
          
     }

     function deleteStudent($id){

          $query = "delete from students where id=$id";
          return execute($query);

     }

     function countStudents(){
          $query = "select COUNT(*) as total from students";
          $rs = get($query);
          return $rs[0];
     }
     function countTeachers(){
          $query = "select COUNT(*) as total from teachers";
          $rs = get($query);
          return $rs[0];
     }


     function generateReport($year,$month){

         // $query ="select * from students where created like '%$year-$month%'";
         $query="select s.*,d.d_name from students s left join departments d on s.department_id = d.id where created like '%$year-$month%'";
          $rs = get($query);
          return $rs;

     }

     function getAllStudentsBySectionId($section_id){
          $query = "select * from students where section_id=$section_id";
          $rs = get($query);
          return $rs;
     }
?>