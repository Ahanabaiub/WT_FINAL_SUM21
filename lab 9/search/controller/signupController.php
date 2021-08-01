<?php

    include "../model/db_config.php";
    $name="";
    $err_name = "";

    $email = "";
    $err_email ="";
    $password ="";
    $err_password="";
    $err_db ="";

    $hasError= false;


    if(isset($_POST["sign_up"])){

        if(empty($_POST["name"])){
            $hasError = true;
            $name = "First Name Required.";
        }
        else if(isNumberExist($_POST["name"])){
            $hasError = true;
            $err_fname = "Cannot Contain Numbers.";

        }
        else{
            $name = htmlspecialchars($_POST["name"]);
        }

        if(empty($_POST["email"])){
            $hasError = true;
            $err_email = "Email Required.";
        }
        else if(!strpos($_POST["email"],"@")){
            $hasError = true;
            $err_email = "Must Contain '@' .";

        }
        else if(!strpos($_POST["email"],".",strpos($_POST["email"],"@")+1)){
            $hasError = true;
            $err_email = "Must contain '.' after '@' .";

        }
        else{
            $email = htmlspecialchars($_POST["email"]);
        }

        if(empty($_POST["password"])){
            $hasError = true;
            $err_password = "Password Required.";
        }
        else if(strlen($_POST["password"]) < 8){
            $hasError = true;
            $err_password = "Minimum 8 characters need.";
        }
        else if(!strpos($_POST["password"],"#") && !strpos($_POST["password"],"?")){
            $hasError = true;
            $err_password = "Must Contain a Special character(# or ? )";

        }
        else if(!isNumberExist($_POST["password"])){
            $hasError = true;
            $err_password = "Must Contain a number.";
        }
        else if(!upperCaseExist($_POST["password"]) || !lowerCaseExist($_POST["password"])){
            $hasError = true;
            $err_password = "Must contain Upper and Lower case.";

        }
        else{
            $password = htmlspecialchars($_POST["password"]);
        }

        if(!$hasErroro){
            $rs=insertUser($name,$email,$password);
            if($rs === true){
                header("Location: login.php");
            }
            else{
                $err_db =$rs;
            }
        }

    }
    else if(isset($_POST["login_btn"])){
        if(empty($_POST["email"])){
            $hasError = true;
            $err_email = "Email Required.";
        }
        else if(!strpos($_POST["email"],"@")){
            $hasError = true;
            $err_email = "Must Contain '@' .";

        }
        else if(!strpos($_POST["email"],".",strpos($_POST["email"],"@")+1)){
            $hasError = true;
            $err_email = "Must contain '.' after '@' .";

        }
        else{
            $email = htmlspecialchars($_POST["email"]);
        }


        if(empty($_POST["password"])){
            $hasError = true;
            $err_password = "Password Required.";
        }
        else if(strlen($_POST["password"]) < 8){
            $hasError = true;
            $err_password = "Minimum 8 characters need.";
        }
        else if(!strpos($_POST["password"],"#") && !strpos($_POST["password"],"?")){
            $hasError = true;
            $err_password = "Must Contain a Special character(# or ? )";

        }
        else if(!isNumberExist($_POST["password"])){
            $hasError = true;
            $err_password = "Must Contain a number.";
        }
        else if(!upperCaseExist($_POST["password"]) || !lowerCaseExist($_POST["password"])){
            $hasError = true;
            $err_password = "Must contain Upper and Lower case.";

        }
        else{
            $password = htmlspecialchars($_POST["password"]);
        }

        if(!$hasError){
            if(authenticateUser($email,$password)){
                header("Location: dashbord.php");
            }
            else{
                $err_db = "Invalid email or password. "
            }
        }

    }
    function insertUser($name,$email,$password){
        $query = "insert into users values(NULL, $name,$email,$password)";

        return execute($query);
    }

    function authenticateuser($email,$password) {
        $query="select * from users where email='$email' and passwprd='$password'";
        $rs=get($query);

        if(count($rs)>0){
            return true;
        }

        return false;

    }   
?>