<?php
	require_once "models/db_config.php";
	//validation varables
	$err_db="";
	if(isset($_POST["Add_service"])){
		//do validations
		//if no error
		$fileType = strtolower(pathinfo(basename($_FILES["p_image"]["name"]),PATHINFO_EXTENSION));
		$file = "storage/product_images/".uniqid().".$fileType";
		move_uploaded_file($_FILES["p_image"]["tmp_name"],$file);
		
		$rs = insertservice($_POST["name"],$_POST["c_id"],$_POST["cost"],$_POST["desc"],$file);
		if($rs === true){
			header("Location: allservices.php");
		}
		$err_db = $rs;
		
	}
	
	function insertservice($name,$c_id,$cost,$desc,$img){
		$query = "insert into services values (NULL,'$name',$c_id,$price,'$desc','$img')";
		return execute($query);
	}
	function updateService($name,$c_id,$price,$qty,$desc,$img,$id){
		$query = "update products set name='$name', c_id=$c_id, cost=$cost,description='$desc' where id=$id";
		return execute($query);
	}
	function deleteServices(){
		
	}
	function getServices(){
		$query ="select p.*,c.name as 'c_name' from services p left join categories c on c.id = p.c_id";
		$rs = get($query);
		return $rs;
	}
	function getService($id){
		$query = "select * from services where id = $id";
		$rs = get($query);
		return $rs[0];
	}
	function search($key){
		$query = "select p.id,p.name from services p left join categories c on c.id = p.c_id where p.name like '%$key%' or c.name like '%$key%'";
		$rs = get($query);
		return $rs;
	}
?>