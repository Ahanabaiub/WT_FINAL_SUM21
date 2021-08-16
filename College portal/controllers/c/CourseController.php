<?php include_once "header.php"; ?>
<?php include_once "../../models/db_config.php";//we are connecting to the database using this
		$err_db="";

    $name="";
    $err_name="";

    $year = "";
    $err_year = "";

    $departments = getAllDepartments();
    $department = "";
    $err_department = "";
    $hasError=false;

    if(isset($_POST["add_course"])){

        if(empty($_POST["name"])){
             $hasError = true;
             $err_name  ="Name Required.";
         }
         else{
             $name= $_POST["name"];
         }
    
        if(empty($_POST["year"])){
            $hasError = true;
            $err_year  ="year Required.";
        }
        else{
            $year = $_POST["year"];
        }

      
        if(empty($_POST["department"])){
             $hasError = true;
             $err_department  ="department Required.";
        }
        else{
             $department = $_POST["department"];
        }
    
    
        if(!$hasError){
            $rs = insertCourse($name,$department,$year);
              if ($rs === true){
                   header("Location:allCourses.php");
              }
              $err_db = $rs;
    
        }
    
    }
    elseif(isset($_POST["edit_course"])){

        if(empty($_POST["name"])){
             $hasError = true;
             $err_name  ="Name Required";
         }
         else{
             $name= $_POST["name"];
         }
    
        if(empty($_POST["year"])){
            $hasError = true;
            $err_year  ="year Required";
        }
        else{
            $year = $_POST["year"];
        }

      
        if(empty($_POST["department"])){
             $hasError = true;
             $err_department  ="department Required";
        }
        else{
             $department = $_POST["department"];
        }
    
    
        if(!$hasError){
            $rs = editCourse($_GET['id'],$name,$department,$year);
              if ($rs === true){
                   header("Location: allCourses.php");
              }
              $err_db = $rs;
    
        }
    
    }
    elseif(isset($_GET["del"])){

        $rs= deleteCourse($_GET['del']);

        if($rs === true){
             header("Location: ./allCourses.php");
        }
        $err_db = $rs;
    }




	 function insertCourse($name,$department,$year){
        $query ="INSERT INTO courses VALUES (NULL,'$name',$department,$year)";
        return execute($query);
   }
   
    function getAllcourse(){
        $query="select c.*,d.d_name from courses c left join departments d on c.department_id=d.id";
        $rs=get($query);

        return $rs;
    }

    function getAllDepartments(){
        $query ="SELECT * FROM departments";
        $rs = get($query);
        return $rs;
   }

  

   function getCourse($id){

        $query ="SELECT * FROM courses where id = $id";
        $rs = get($query);
        return $rs[0];

   }


   function editCourse($id,$name,$department,$year){
    $query = "update courses set name='$name',department_id=$department,year=$year where id=$id";
    return execute($query);
   }

   function deleteCourse($id){

        $query = "delete from courses where id=$id";
        return execute($query);

   }


?>
<?php include "footer.php"; ?>