<?php
	$first_name="";
	$err_first_name="";	
	$last_name="";
	$err_last_name="";
	$studentid="";
	$err_studentid="";	
	$password = "";
    $err_password = "";	
	$department="";
	$err_department="";	
    $phonenumber = "";
    $err_phonenumber= "";
	$address = "";
    $err_address = "";

	$hasError=false;
	
	$array= array("Science","Busienss","Administration","Arts");
	
	
	if(isset($_POST["submit"])){
		if(empty($_POST["first_name"])){
			$hasError = true;
			$err_first_name="First Name Required";
		}
		else if(strlen($_POST["first_name"]) <= 2){
			$hasError = true;
			$err_name="Name must contain >2 character";
		}
		else{
			$name = $_POST["first_name"];
		}
		
		if(empty($_POST["last_name"])){
			$hasError = true;
			$err_last_name="Last Name Required";
		}
		else if(strlen($_POST["last_name"]) <= 2){
			$hasError = true;
			$err_name="Name must contain >2 character";
		}
		else{
			$name = $_POST["last_name"];
		}
		
		
		if(empty($_POST["studentid"])){
			$hasError = true;
			$err_studentid=" Id Required";
		}
		else if(strlen($_POST["studentid"]) <= 6){
			$hasError = true;
			$err_studentid=" Id must contain >8 character";
		}
		else{
			$studentid = $_POST["studentid"];
		}
		
		
		 if(empty($_POST["password"])){
            $hasError = true;
            $err_password = "Password Required.";
        }
        else if(strlen($_POST["password"]) < 6){
            $hasError = true;
            $err_password = "Minimum 6 characters need.";
        }
		else{
			$password = $_POST["password"];
		}
		
		if (!isset($_POST["department"])){
			$hasError = true;
			$err_department="department Required";
		}
		else{
			$department = $_POST["department"];
		}
		if(empty($_POST["phonenumber"])){
			$hasError = true;
			$err_phonenumber="Phone Number Required";
		}
		else{
			$phonenumber = $_POST["phonenumber"];
		}
		
		if(empty($_POST["address"])){
			$hasError = true;
			$err_address="Address Required";
		}
		else{
			$address = $_POST["address"];
		}
		
		
		if(!$hasError){
			header("location: studentDash.php");
			echo "<h1>Form submitted</h1>";
			echo $_POST["first_name"]."<br>";
			echo $_POST["last_name"]."<br>";
			echo $_POST["studentid"]."<br>";
			echo $_POST["password"]."<br>";
			echo $_POST["department"]."<br>";
			echo $_POST["phonenumber"]."<br>";
			echo $_POST["address"]."<br>";
			
			
		}
		
		
	}
	
?>