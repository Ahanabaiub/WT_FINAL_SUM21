<?php
include '../controller/catagoryController.php';

$categories = getAllCatagories();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>All Categories</title>
</head>
<body>
    <input type="text" onkeyup="searchCategory()" palceholder="Search..." name="sr">
    <div id = "suggession">

    </div>

         <table>
            <tr>
                <td>Id</td>
                    <td>Name</td>
            </tr>
            <?php 
                $i=1;
                    foreach($categories as $c){
                           echo "<tr>";
                           echo "<td>$i</td>";
                            echo "<td>".$c['name']."</td>";
                            echo '<td><a href="editCatagory.php?id='.$c['id'].'>Edit</a</td>';
                            echo "</tr>";   
                            
                            $i++;
                    }
            ?>
        </table> 
    <script>
        function searchCategory(){
            var key = innerHTML=document.getElementById("sr").value;
            if(key==""){
                return;
            }
            
            var xmlHttprequest = new XMLHttpRequest();
            xmlHttprequest.open("GET","search_cat.php?key="+key,true);
            xmlHttprequest.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200){
                    document.getElementById("suggession").innerHTML=this.responseText;
                }
            }
            xmlHttprequest.send();
        }
    </script>
</body>
</html>