<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
</head>
<body>
    <button onClick="loadDoc()">Profile Info</button>
    <div id="demo">

    </div>


    <script>

        function loadDoc(){
            var xmlHttprequest = new XMLHttpRequest();
            xmlHttprequest.open("GET","myProfile.php",true);
            xmlHttprequest.onreadystatechange=function(){
                if(this.readyState==4 && this.status==200){
                    document.getElementById("demo").innerHTML=this.responseText;
                }
            }
            xmlHttprequest.send();
        }
    </script>
</body>
</html>