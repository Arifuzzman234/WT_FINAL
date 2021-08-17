<?php include 'managerheader.php';
	require_once 'controllers/ServiceController.php';
	$services = getServices();
?>
<!--All Products starts -->

<script src="js/services.js"></script>
<div class="center">
	<h3 class="text">All Services</h3>
	<input type="text" class="form-control" onkeyup="search(this)" placeholder="Search..." >
	<div id="suggestions">
	</div>
	<table class="table table-striped">
		<thead>
			<th>Sl#</th>
			<th></th>
			<th> Name</th>
			<th>Category </th>
			<th> Cost</th>
			<th></th>
			<th></th>
			
		</thead>
		<tbody>
		
			<?php
				$i=1;
				foreach($services as $p){
					echo "<tr>";
						
						echo "<td>$i</td>";
						echo "<td><img src='".$p["img"]."' width='100px' height='100px'></td>";
						echo "<td>".$p["name"]."</td>";
						echo "<td>".$p["c_name"]."</td>";
						echo "<td>".$p["cost"]."</td>";
						
						echo '<td><a href="editproduct.php?id='.$p["id"].'" class="btn btn-success">Edit</a></td>';
						echo '<td><a class="btn btn-danger">Delete</td>';
					echo "</tr>";
					$i++;
				}
			?>
		</tbody>
	</table>
</div>
<!--Products ends -->
<?php include 'mainfooter.php';?>