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

                $rs= authenticateStudent($cid,$password);

                if($rs){
                    // echo getAdminName($cid);
                    $_SESSION["loggedUser"] = getStudentName($cid);
                    $_SESSION["cid"]=$cid;
                    $_SESSION["dashName"]="Student DashBoard";
                     setcookie("studentCookie","Hello Student",time()+70);
                    if(isset($_POST["remember_me"])){
                      setcookie("userCookie",$cid,time()+60);
                      setcookie("userPass",$password,time()+60);
                    }
                    else{
                     setcookie("userCookie",$cid,60);
                     setcookie("userPass",$password,60);
                    }
                    header("Location: studentDash.php");
                }
                else{
                 $db_err ="Invalid userId Password.";
                }
            }
            else if($cid>=2000 && $cid<3000){
                //admin
            
               $rs= authenticateAdmin($cid,$password);

               if($rs){
                   // echo getAdminName($cid);
                   $_SESSION["loggedUser"] = getAdminName($cid);
                   $_SESSION["dashName"]="Admin DashBoard";
                   if(isset($_POST["remember_me"])){
                     setcookie("userCookie",$cid,time()+60);
                     setcookie("userPass",$password,time()+60);
                   }
                   else{
                    setcookie("userCookie",$cid,60);
                    setcookie("userPass",$password,60);
                   }
                   header("Location: adminDash.php");
               }
               else{
                $db_err ="Invalid userId Password.";
               }

            }
            else if($cid>=3000 && $cid<4000){
                //teacher

                
               $rs= authenticateTeacher($cid,$password);

               if($rs){
                   $_SESSION["loggedUser"] = getTeacherName($cid);
                   $_SESSION["dashName"]="Teacher DashBoard";
                   $_SESSION["loggedUserId"]=getTeacherId($cid);
                   header("Location: teacherDash.php");
               }
               else{
                $db_err ="Invalid userId Password.";
               }

            }
            else if($cid>=4000 && $cid<5000){
                //College

                
               $rs= authenticateCollege($cid,$password);

               if($rs){
                   $_SESSION["loggedUser"] = getCollegeName($cid);
                   $_SESSION["dashName"]="Teacher DashBoard";
                   $_SESSION["loggedUserId"]=getCollegeId($cid);
                   ////college cookie...........
                   setcookie("message","Hello Cookie",time()+80);
                   header("Location: ../view/college view/dashboard.php");
               }
               else{
                $db_err ="Invalid userId Password.";
               }

            }
            else{
                $db_err ="Invalid userId Password.";
            }

        }

    }


    function authenticateAdmin($cid,$password){
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

    function  getStudentName($cid){
        $query = "select * from students where cid = $cid";
        $rs = get($query);
        $nm = $rs[0];
        return $nm["name"];
    }

    function authenticateStudent($cid,$password){
        $query = "select * from students where cid='$cid' and password='$password'";
		$rs = get($query);
		if(count($rs)>0){
			return true;
		}
		return false;
    }

    function authenticateTeacher($cid,$password){
        $query = "select * from teachers where cid='$cid' and password='$password'";
		$rs = get($query);
		if(count($rs)>0){
			return true;
		}
		return false;

    }
    ///////........college..........
    function getCollegeName($cid){

        $query = "select * from college_user where c_id = $cid";
        $rs = get($query);
        $nm = $rs[0];
        return $nm["name"];
        
    }


    function getCollegeId($cid){
        $query = "select * from college_user where c_id = $cid";
        $rs = get($query);
        $nm = $rs[0];
        return $nm["id"];
    }

    function authenticateCollege($cid,$password){

        $query = "select * from college_user where c_id ";
        $rs = get($query);

        if(count($rs)>0){
			return true;
		}
		return false;

    }

    function getTeacherName($cid){
        $query = "select * from teachers where cid = $cid";
        $rs = get($query);
        $nm = $rs[0];
        return $nm["name"];

    }

    function getTeacherId($cid){
        $query = "select * from teachers where cid = $cid";
        $rs = get($query);
        $nm = $rs[0];
        return $nm["id"];
    }

?>