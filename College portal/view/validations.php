<?php
	$teachername="";
	$err_teachername="";
	$prepared="";
	$err_prepared="";
	$behaviour="";
	$err_behaviour="";
	$instructions="";
	$err_instructions="";
	$management="";
	$err_management="";
	$comment="";
	$err_comment="";
	
	$hasError=false;
	
	if(isset($_POST["submit"])){
		if(empty($_POST["teachername"])){
			$hasError = true;
			$err_teachername="Name Required";
		}
		else if(strlen($_POST["teachername"]) <= 2){
			$hasError = true;
			$err_name="Name must contain >2 character";
		}
		else{
			$name = $_POST["teachername"];
		}
		if(!isset($_POST["prepared"])){
			$hasError = true;
			$err_prepared="Prepared Required";
		}
		else{
			$prepared = $_POST["prepared"];
		}
		
		
		if(!isset($_POST["behaviour"])){
			$hasError = true;
			$err_behaviour="Behaviour Required";
		}
		else{
			$behaviour = $_POST["behaviour"];
		}
		
		if(!isset($_POST["instructions"])){
			$hasError = true;
			$err_instructions="Instructions Required";
		}
		else{
			$instructions = $_POST["instructions"];
		}
		
		
		if(!isset($_POST["management"])){
			$hasError = true;
			$err_management="Management Required";
		}
		else{
			$management = $_POST["management"];
		}
		if(empty($_POST["comment"])){
			$hasError = true;
			$err_comment="Comment Required";
		}
		else{
			$comment = $_POST["comment"];
		}
		
		
		if(!$hasError){
			echo "<h1>Form submitted</h1>";
			echo $_POST["teachername"]."<br>";
			echo $_POST["prepared"]."<br>";
			echo $_POST["behaviour"]."<br>";
			echo $_POST["instructions"]."<br>";
			echo $_POST["management"]."<br>";
			echo $_POST["comment"]."<br>";
		}
		
		
	}
	
?>