<?php
      include "../model/db_config.php";

      $name = "";
      $err_name = "";
      $err_db = "";

      if(isset($_POST["add_catagory"])){
            if(empty($_post["name"])){
                $hasError = true;
                $err_name = "Required";
            }
            else{
                $name = $_POST["name"];
                if(execute($query)){
                        header("Location: allCatagoris.php");
                }

                $db_err = "Failed.";
            }
      }


      function insertCatagory($catagory){
            $query="insert into categories values(NULL,'$name')";
            return execute($query);
      }

      function getAllCatagories(){
            $query = "select * from categories";
            return get($query);
      }

      function getCategory($id){
            $query = "select * from categories where id=$id";
            $rs = get($query);

            return $rs[0];

      }

      function searchCatagory($key){
            $query = "select name from categories where name like '%$key%'";
            return get($query);
      }
?>