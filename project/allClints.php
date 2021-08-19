<?php include 'managerheader.php';?>
<?php  
     include 'controllers/clints_info.php';
     $clint = allclints();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>All clint Info</title>
</head>
<body>
      <table align="center" border="1">
      	      <th>Sl</th>
                <th></th>
      	      <th>Name</th>
      	      <th>Phoneno</th>
      	      <th>Descrption</th>
                <th>Give special offer Type</th>
      	      <th></th>
      	      <th></th>

      	      <?php  
                   $i=1;
                   foreach ($clint as $t) 
                   {
                   	 echo "<tr>";
                             echo "<td>$i</td>";
                             echo "<td><img src='".$t["img"]."' width='100px' height='100px'></td>";
                             echo "<td>".$t["name"]."</td>";
                             echo "<td>".$t["phoneno"]."</td>";
                             echo "<td>".$t["desc"]."</td>";
                             echo "<td>".$t["category"]."</td>";
                             echo '<td colspan="2"><a href="editClint.php?id='.$t["id"].'">Special Offer</a></td>';
                             echo '<td><a href="deleteClint.php?id='.$t["id"].'">Delete</a></td>';
                      echo "</tr>";
                      $i++;
                   }
      	      ?>
      </table>
</body>
</html>
<?php include 'mainfooter.php';?>