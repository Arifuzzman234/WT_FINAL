<?php include 'managerheader.php';?>
<?php  
     include 'controllers/hotels_info.php';
     $hotel = allHotels();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>All Hotel Room Info</title>
</head>
<body>
      <table align="center" border="1">
      	      <th>Sl</th>
                <th></th>
      	      <th>Name</th>
      	      <th>Room No</th>
      	      <th>Descrption</th>
                <th>Hotel Room Type</th>
      	      <th></th>
      	      <th></th>

      	      <?php  
                   $i=1;
                   foreach ($hotel as $t) 
                   {
                   	 echo "<tr>";
                             echo "<td>$i</td>";
                             echo "<td><img src='".$t["img"]."' width='100px' height='100px'></td>";
                             echo "<td>".$t["name"]."</td>";
                             echo "<td>".$t["roomno"]."</td>";
                             echo "<td>".$t["desc"]."</td>";
                             echo "<td>".$t["category"]."</td>";
                             echo '<td colspan="2"><a href="editHotel.php?id='.$t["id"].'">Edit</a></td>';
                             echo '<td><a href="deleteHotel.php?id='.$t["id"].'">Delete</a></td>';
                      echo "</tr>";
                      $i++;
                   }
      	      ?>
      </table>
</body>
</html>
<?php include 'mainfooter.php';?>