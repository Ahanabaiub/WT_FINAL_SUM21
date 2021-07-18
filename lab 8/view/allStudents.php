
<?php
    require_once "header.php";
    require_once "../controller/studentController.php";
    $students = getAllStudents();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>All Students</title>
</head>
<body>

<h3>All Students</h3>
	<table border="1">
		<thead>
			<th>Sl#</th>
			<th>Name</th>
			<th>Credit </th>
			<th>CGPA</th>
			<th>Date of Birth</th>
            <th>Department</th>
            <th>Edit</th>
            <th>Delete</th>
			
		</thead>
		<tbody>
			<?php
				$i = 1;
				foreach($students as $c){
					echo "<tr>";
						echo "<td>$i</td>";
						echo "<td>".$c["name"]."</td>";
                        echo "<td>".$c["credit"]."</td>";
                        echo "<td>".$c["cgpa"]."</td>";
                        echo "<td>".$c["dob"]."</td>";
                        echo "<td>".$c["d_name"]."</td>";
						echo '<td><a href="editStudents.php?id='.$c['id'].'">Edit</a></td>';
						echo '<td><a href="#">Delete</a></td>';
					echo "</tr>";
					$i++;
				}
			?>
			
		</tbody>
	</table>
    
</body>
</html>