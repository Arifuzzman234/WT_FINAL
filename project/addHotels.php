<?php include 'managerheader.php';?>

<?php  
     include 'controllers/hotels_info.php';
?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <title>Insert Hotel</title>
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
                        <td><h2 align="center">RoomNO</h2></td>
                         <td>
                              <input type="text" name="roomno" size="50" value="<?php echo $roomno; ?>">
                                <span>
                                 <?php echo $err_roomno;?>   
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
                            <td><h2 align="center">Hotel Room Type</h2></td>
                            <td>
                                <select name="Category">
                                     <option selected disabled>room</option>
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