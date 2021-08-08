<?php

    require_once "../../models/db_config.php";

    if(isset($_GET["id"])){

        $rs = checkStudentId($_GET["id"]);

        if($rs>0){
            echo "Id Already Exist.";
        }
        else{
            echo "";
        }

    }


    function checkStudentId($cid){
        $query = "select count(*) as total from students where cid = $cid";

        $rs = get($query);
    
        return $rs[0]["total"];
    }

?>