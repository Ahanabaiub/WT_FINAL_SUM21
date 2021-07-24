<?php

    require_once "../models/db_config.php";

    session_start();
    $cid = "";
    $err_cid="";

    $password = "";
    $err_password  = "";
    $db_err = "";
    $hasError = false;

    if(isset($_POST["login_btn"])){

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

            if($cid>=1000 && $cid<2000){
                //student
            }
            else if($cid>=2000 && $cid<3000){
                //admin
            
               $rs= authenticateUser($cid,$password);

               if($rs){
                   // echo getAdminName($cid);
                   $_SESSION["loggedUser"] = getAdminName($cid);
                   header("Location: adminDash.php");
               }
               else{
                $db_err ="Invalid userId Password.";
               }

            }
            else if($cid>=3000 && $cid<4000){
                //teacher
            }

        }

    }


    function authenticateUser($cid,$password){
		$query = "select * from admin where cid='$cid' and password='$password'";
		$rs = get($query);
		if(count($rs)>0){
			return true;
		}
		return false;
		
	}

    function getAdminName($admin_id){

        $query = "select * from admin where cid = $admin_id";
        $rs = get($query);
        $nm = $rs[0];
        return $nm["name"];

    }

?>