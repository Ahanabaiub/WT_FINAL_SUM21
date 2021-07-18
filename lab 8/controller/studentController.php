<?php

require_once '../model/db_config.php';

$name = "";
$err_name = "";
$credit = "";
$err_credit = "";

$cgpa = "";
$err_cgpa = "";

$dob = "";
$err_dob ="";
$err_db="";


$hasError = false;

$department = getAllDEpartments();
$err_department ="";

if(isset($_POST["add_student"])){

    if(empty($_POST["name"])){
        $hasError = true;
        $err_name  ="Name Required.";
    }
    else{
        $name = $_POST["name"];
    }

    if(empty($_POST["credit"])){
        $hasError = true;
        $err_credit  ="credit Required.";
    }
    else{
        $credit = $_POST["credit"];
    }

    if(empty($_POST["cgpa"])){
        $hasError = true;
        $err_cgpa  ="cgpa Required.";
    }
    else{
        $cgpa = $_POST["cgpa"];
    }


    if(!$hasError){
        $rs = insertStudent($_POST["name"],$_POST["credit"],$_POST["cgpa"],$_POST["dob"],$_POST["dpt_id"]);
		if ($rs === true){
			header("Location: allStudents.php");
		}
		$err_db = $rs;

    }

}
elseif(isset($_POST["edit_student"])){

        $rs = editStudent($_POST['id'],$name,$dob,$credit,$cgpa,$_POST["dpt_id"]);
		if($rs === true){
			header("Location: allStudents.php");
		}
		$err_db = $rs;
}

function insertStudent($name,$credit,$cgpa,$dob,$department){
    $query = "insert into students values (NULL,'$name','$dob',$credit,$cgpa,$department)";
    return execute($query);
}


function getAllDEpartments(){
    $query = "select * from departments";
	$rs = get($query);
	return $rs;
}

function getStudent($id){
    $query = "select * from students where id=$id";
    $rs=get($query);
    return $rs[0];
}

function getAllStudents(){
    $query ="select s.*,d.d_name from students s left join departments d on s.d_id = d.id";
    $rs = get($query);
    return $rs;
}

function editStudent($id,$name,$dob,$credit,$cgpa,$dpt){
    $query = "update students set name=$name dob=$dob credit=$credit cgpa=$cgpa d_id=$dpt where id=$id";
    return execute($query);
    
}


?>