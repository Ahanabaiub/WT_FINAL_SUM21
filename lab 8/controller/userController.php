<?php

    require_once '../model/db_config.php';
    $cid = "";
    $err_cid  ="";

    $password = "";
    $err_password = "";

    $db_err = "";
    $hasError = false;

    if(isset($_POST["submit"])){

        if(empty($_POST["cid"])){
            $hasError = true;
            $err_cid  ="ID Required.";
        }
        else{
            $cid = $_POST["cid"];
        }

        if(empty($_POST["password"])){
            $hasError = true;
            $err_password  ="Password Required.";
        }
        else{
            $password = $_POST["password"];
        }

        if(!$hasError){
			if(authenticateUser($cid,$password)){
				header("Location: dashboard.php");
			}
			$db_err = "Username password invalid";
		}

    }

    function authenticateUser($cid,$password){
		$query = "select * from admin where user_name='$cid' and password='$password'";
		$rs = get($query);
		if(count($rs)>0){
			return true;
		}
		return false;
		
	}

?>