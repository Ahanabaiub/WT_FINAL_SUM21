<?php
     require_once "../models/db_config.php";

 function getAllsections(){

    $query ="select s.*,d.d_name from sections s left join departments d on s.department_id = d.id";
    $rs = get($query);

    return $rs;

}

?>