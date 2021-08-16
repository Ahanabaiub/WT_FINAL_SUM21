<?php

    require_once "../../models/db_config.php";

    if(isset($_GET["q"])){

        $rs = getCourse($_GET["q"]);

        if(count($rs)==0){
            echo "<h2>No Result found.</h2>";
        }
        else{
            $courses = $rs;
            // return $courses[0]["name"];
             $result =  "<h3>Search Result</h3>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Year</th>
                    <th>Option</th>                 
                </tr>";
                    
            
                        foreach($courses as $c){
                            $result.="<tr>";
                            $result.= "<td>".$c["name"]."</td>";
                            $result.="<td>".$c["d_name"]."</td>";
                            $result.= "<td>".$c["year"]."</td>";
                            $result.='<td><a id="editBtn" href="./editCourse.php?id='.$c['id'].'">Edit</a>';
                            $result.='<a href="./allCourses.php?del='.$c['id'].'">Delete</a></td>';
                            $result.= "</tr>";
                        }
                    
                    
            $result.= "</table>";
            echo $result;
        }

    }

    function getCourse($key){
        $query = "select c.*,d.d_name from courses c left join departments d on c.department_id=d.id
                  where name like '%$key%' or d_name like '%$key%' or year like '%$key%' ";
        return get($query);          
    }

?>