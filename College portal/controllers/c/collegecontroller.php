<?php
	 include_once "../../db_config.php";//we are connecting to the database using this
		
		$name="";//we copied everything from addcategory and paste it here
		$err_name="";
		$c_id="";//we copied everything from addcategory and paste it here
		$errc_id="";
		$pass="";//we copied everything from addcategory and paste it here
		$err_pass="";
		$name="";
		$err_name="";
		$has_err=false;
		$err_db=""; 
	if(isset($_POST["add"])){//if signup is clicked
	if(empty($_POST["name"])){
		$has_err=true;
		$err_name="name required";
		}
		else{
			$name=$_POST["name"];
		}
		else(empty($_POST["c_id"])){
		$has_err=true;
		$errc_id="id required";
		}
		else{
			$c_id=$_POST["c_id"];
		}
		if(empty($_POST["pass"])){
		$has_err=true;
		$err_pass="pass required";
		}
		else{
			$pass=$_POST["pass"];
		}
		if(!$has_err){
			$rs=insertCollege($_POST["name"],$_POST["c_id"],$_POST["pass"]);//the name is as validated name not as database name, if no error happens after getting the value from execute it will run and do things*****in databasewe use name as a uniqe key so same name cant be added twice
			if($rs=== true){
				//echo"submitted";
				header ("Location: allcategories.php");
			}
			$err_db=$rs;
			
			}
		}
		elseif(isset($_POST["edit_category"])){//for edit categorys data validation
			if(empty($_POST["name"])){
					$has_err=true;
					$err_name="name required";
			}
			else{
				$NAME=$_POST["name"];
			}
			if(!$has_err){//if everything is all ok and nothing has any error 
				$rs = editCategory($_POST["name"],$_POST["id"]);//will serch by id then if id maches it will execute function editCategory($name , $id) and will update the name only
				if($rs=== true){
					//echo"updated";
					header ("Location: allcategories.php");
				}
			$err_db=$rs;
			}
		}
		
		
		
		
		
		
		
	function insertCollege($NAME,$c_id,$pass){//functoin will have only one value*******insertCategory is calling execute function and passing query function, and execute will have an array,1st insert user 2nd execute call, after unning execute it will return true or false to the user 
		$query="insert into  categories values(NULL,'$NAME','$c_id','pass')";
		return execute($query);
		
	}
	function getAllcollege(){//to get all the categories but it will not print anything we need getCategory to see it
		$query = "select * from college";
		$rs= get($query);
		return $rs;
		
	}
	function getcollege($id){//to fetch from database//getting that specific id  
		$query="select * from college where id=$id";
		$rs= get($query);
		return $rs[0];//returning reasult*****as there will only have one id to edit at a time so there will b 1 id and as get query return value as an assosiative array so we will put the rs value as 0
	}
	function editCategory($name , $id){//which name we are changing for that we have to have that databases specific id , otherwist if we run this code without id all database name wil be change to new updated value
		$query="update categories set name='$name' where id=$id";
		return execute($query); //as we are updating/reinserting  the value we need execute not get,,,get is used when we try to see the value
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