<?php
     require_once "./checkAuthorization.php";
    include_once "../controllers/sectionController.php";
    $sections = getAllsections();
    $departments = getAllDEpartments();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">
    <title>All Sections</title>
    <style>
       
table, th, td{
    border: 1px solid black;
    padding: 5px; 
}
table{
    border-collapse: collapse;
    width: 97%;
    margin: 5px 10px;
}

.form-strct{
    display: block;
}


.section-form{
    display: inline-block;
    margin-left:15px;
}

.btn{
    background: teal;
    padding:4px 10px;
    border-radius: 5px;
    color: rgb(235, 231, 231);
    font-size: 17px;
    border: none;

}

#success-msg{
    margin: 50px 80px;
    background-color: rgb(209, 231, 221) ;
    color: rgb(15, 81, 50);
    padding: 10px 15px;
}


    </style>
</head>
<body> 
<?php  require_once "./headerDash.php"; ?>
    <div class="main-container">
        <?php  include_once "./adminNav.php"?> 
        <div class="home">
            <h2>Section Management</h2>
            <diV style="margin-left: 290px">
            <?php
                if($succ!=""){
                    echo '<span id="success-msg">'.$succ.'</span>';
                }
            ?>
            <span id="failed-msg"><?php echo $err_db ?></span>
            </div>
            <div class="create-btn" style="margin: 15px 10px">
                <button id="crt-btn" class="btn" onclick="createSection()">Close</button>
            </div>
            <div id="create-section" style="display: block; margin:5px 15px;">
                <h3>Create A Section</h3>
                <form action="" method="post">
                    <div class="section-form">
                        <span  class="form-strct" >Name :</span> <br>
                        <span class="form-strct" >Department :</span> <br>
                        <span class="form-strct" >Year :</span><br>
                        <span class="form-strct" >Session :</span><br>
                    </div>
                    <div class="section-form" >
                        <input type="text" name="name" class="form-strct" value="<?php echo $name; ?> "><span class="err-msg"><?php  echo $err_name;?></span><br>
                        <select name="department" class="form-strct" >
                                <option disabled selected>Department</option>
                                <?php
                                   foreach($departments as $c){
                                       if($c["id"]==$department)
                                       {
                                        echo "<option selected value='".$c["id"]."'>".$c["d_name"]."</option>";
                                       }
                                       else{
                                        echo "<option  value='".$c["id"]."'>".$c["d_name"]."</option>";
                                       }
                                    }
                                ?>
                        </select><span class="err-msg"><?php  echo $err_department;?></span><br>
                        <input type="text" name="year" class="form-strct" value="<?php echo $year; ?> "><span class="err-msg"><?php  echo $err_year;?></span><br>
                        <input type="text" name="session"  class="form-strct" value="<?php echo $session;?> "><span class="err-msg"><?php  echo $err_session;?></span><br>
                    </div>
                    <br>
                    <input type="submit" class="btn"  name="add-section" value="Add"> 
                </form>

            </div>
            <div class="students-section">
                <h3>All Section</h3>
                <table>
                    <tr>
                        <th>Sl#</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Year</th>   
                        <th>Session</th>   
                        <th>Option</th>             
                    </tr>
                    <tr>
                        <?php
                            $i = 1;
                            foreach($sections as $c){
                                echo "<tr>";
                                    echo "<td>$i</td>";
                                    echo "<td>".$c["name"]."</td>";
                                    echo "<td>".$c["d_name"]."</td>";
                                    echo "<td>".$c["year"]."</td>";
                                    echo "<td>".$c["session"]."</td>";
                                    echo '<td><a href="./sectionView.php?id='.$c['id'].'&sec='.$c['name'].'&dept='.$c['d_name'].'">View</a></td>';
                                echo "</tr>";
                                $i++;
                            }
                        ?>
                        
                    </tr>
                </table>
            </div>
        </div> 
    </div>
</body>

<script>
    function createSection(){
       
        document.querySelectorAll(".err-msg").forEach(item=>item.innerHTML="");
       // document.querySelectorAll(".form-strct").forEach(item=>item.value="");
        document.querySelectorAll(".form-strct").forEach((item)=>{
           if(item.tagName==="SELECT"){
               item[0].selected="selected";
           }
           else{
               item.value="";
           }
           
           });

     
      
        if(document.getElementById("crt-btn").innerHTML=="Create"){
            document.getElementById("create-section").style.display="block";
            document.getElementById("crt-btn").innerHTML="Close";
        }
        else if(document.getElementById("crt-btn").innerHTML=="Close"){
            document.getElementById("create-section").style.display="none";
            document.getElementById("crt-btn").innerHTML="Create";
        }
       
    }
</script>
</html>