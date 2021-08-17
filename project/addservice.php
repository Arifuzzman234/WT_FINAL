<?php include 'managerheader.php';
	require_once 'controllers/ServiceController.php';
	require_once 'controllers/CategoryController.php';
	$categories = getAllCategories();
?>
<!--addproduct starts -->
<div class="center">
	<h5 class="text-danger"><?php echo $err_db;?></h5>
	<form action="" method="post" enctype="multipart/form-data" class="form-horizontal form-material">
		<div class="form-group">
			<h4 class="text">Name:</h4> 
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<h4 class="text">Category:</h4> 
			<select name="c_id" class="form-control">
				<option disabled selected>Choose</option>
				<?php
					foreach($categories as $c){
						echo '<option value="'.$c["id"].'">'.$c["name"].'</option>';
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<h4 class="text">Cost:</h4> 
			<input type="text" name="price" class="form-control">
		</div>
		
		<div class="form-group">
			<h4 class="text">Description:</h4> 
			<textarea type="text" name="desc" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<h4 class="text">Image</h4> 
			<input type="file" name="p_image" class="form-control">
			
		</div>
		<div class="form-group text-center">
			
			<input type="submit" name="add_service" class="btn btn-success" value="Add service" class="form-control">
		</div>
	</form>
</div>
<?php include 'mainfooter.php';?>