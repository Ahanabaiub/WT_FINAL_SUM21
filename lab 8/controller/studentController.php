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
        if(authenticateUser($cid,$password)){
            header("Location: dashboard.php");
        }
        $db_err = "Username password invalid";


        $rs = insertStudent($_POST["name"],$_POST["credit"],$_POST["cgpa"],$_POST["dob"],$_POST["department"]);
		if ($rs === true){
			header("Location: allproducts.php");
		}
		$err_db = $rs;

    }

}

function insertStudent($name,$credit,$cgpa,$dob,$department){
    $query = "insert into products values (NULL,'$name',$credit,$cgpa,$dob,$department)";
    return execute($query);
}


function getAllDEpartments(){
    $query = "select * from departments";
	$rs = get($query);
	return $rs;
}


?>