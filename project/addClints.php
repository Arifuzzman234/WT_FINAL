<?php include 'managerheader.php';?>

<?php  
     include 'controllers/clints_info.php';
?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <title>Insert Clint Info</title>
</head>
<body>
      <form action="" method="post" enctype="multipart/form-data">
               <table align="center">
                        <tr>
                         <td><h2 align="center">Name</h2></td>
                         <td>
                              <input type="text" name="name" size="50" value="<?php echo $name; ?>">
                                <span>
                                 <?php echo $err_name;?>   
                            </span>
                         </td>
                        </tr>

                        <tr>
                        <td><h2 align="center">Phoneno</h2></td>
                         <td>
                              <input type="text" name="phoneno" size="50" value="<?php echo $phoneno; ?>">
                                <span>
                                 <?php echo $err_phoneno;?>   
                            </span>
                         </td>                    
                        </tr>

                        <tr>
                         <td><h2 align="center">Description</h2></td>
                         <td>
                              <input type="text" name="desc" size="50" value="<?php echo $Desc; ?>">
                                <span>
                                 <?php echo $err_Desc;?>   
                                </span>
                         </td>  
                        </tr>

                        <tr>
                            <td><h2 align="center">ADD Special Offer </h2></td>
                            <td>
                                <select name="Category">
                                     <option selected disabled>meal</option>
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
                                 <input type="file" name="file"> 
                             </td>
                        </tr>
               </table>

               <div align="center">
                       <input type="submit" name="Insert" value="Submit">
               </div><br>
      </form>
</body>
</html>
<?php include 'mainfooter.php';?>