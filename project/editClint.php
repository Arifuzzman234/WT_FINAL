<?php include 'managerheader.php';?>
<?php  
     include 'controllers/clints_info.php';
     $id= $_GET["id"];
     $p= getClints($id);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Clint</title>
</head>
<body>
      <form action="" method="post" enctype="multipart/form-data">
      	     <table align="center">
      	     	<?php echo $err_db;?> 
      	     	<input type="hidden" name="id" value="<?php echo $id?>">
      	     	    <tr>
      	     	    	<td><h2 align="center">Name</h2></td>
      	     	    	<td>
      	     	    		<input type="text" name="name" size="50" value="<?php echo $p["name"]; ?>">
      	     	            <span>
                                 <?php echo $err_name;?>   
                            </span>
      	     	    	</td>
      	     	    </tr>

      	     	    <tr>
                        <td><h2 align="center">Phoneno</h2></td>
      	     	    	<td>
      	     	    		<input type="text" name="phoneno" size="50" value="<?php echo $p["phoneno"]; ?>">
      	     	            <span>
                                 <?php echo $err_phoneno;?>   
                            </span>
      	     	    	</td>    	     	    	
      	     	    </tr>

      	     	    <tr>
      	     	    	<td><h2 align="center">Descrption</h2></td>
      	     	    	<td>
      	     	    		<input type="text" name="desc" size="50" value="<?php echo $p["desc"]; ?>">
      	     	            <span>
                                 <?php echo $err_Desc;?>   
                            </span>
      	     	    	</td>  
      	     	    </tr>

                    <tr>
                            <td><h2 align="center">Special Offer</h2></td>
                            <td>
                                <select name="category">
                                     <option selected disabled><?php echo $p["category"]; ?></option>
                                          <?php
                                          foreach($Categories as $cd)
                                          {
                                             if($categories == $cd)
                                                  echo "<option selected>$cd</option>" ;
                                             else
                                                  echo "<option>$cd</option>";
                                          }
                                          ?>
                                </select>
                                <span>
                                      <?php echo $err_categories;?>   
                                </span>
                            </td>
                        </tr>

      	     	    <tr>
                             <td><h2 align="center">Image</h2></td>
                             <td>
                                 <input type="file" name="file" value="<?php echo $p["img"]; ?>"> 
                             </td>
                        </tr>
      	     </table>

      	     <div align="center">
      	     	   <input type="submit" name="Special offer" value="Submit">
      	     </div><br>
      </form>
</body>
</html>
<?php include 'mainfooter.php';?>