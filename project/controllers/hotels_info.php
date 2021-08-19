<?php  
     include 'models/db_config.php';

     $name="";
     $err_name="";
     $roomno="";
     $err_roomno="";
     $Desc="";
     $err_Desc="";
     $err_db="";
     $categories="";
     $err_categories="";

     $hasError = false;

     $Categories = array("Single Bed","Double Bed","Tripple Bed","Queen","King");

/*************************Update Hotel************************************/
     if(isset($_POST["Edit"]))
     {
          if(empty($_POST["name"]))
          {
               $err_name="Name Required";
               $hasError = true;
          }

          else
          {
               $name=$_POST["name"];
          }

          if(empty($_POST["roomno"]))
          {
               $err_roomno="Room No Required";
               $hasError = true;
          }

          else
          {
               $roomno=$_POST["roomno"];
          }

          if(empty($_POST["desc"]))
          {
               $err_Desc="Description Required";
               $hasError = true;
          }

          else
          {  
               $Desc=$_POST["desc"];
          }

         ///   $categories=$_POST["category"];

          //Database

          if(!$hasError)
          {
               $file_name= $_FILES['file'] ['name'];
               $file_temp_loc= $_FILES['file'] ['tmp_name'];
               $file_store= "Upload/".$file_name;

               move_uploaded_file($file_temp_loc, $file_store); 

               $rs=updateHotel("$name","$roomno","$Desc","$file_store","$categories",$_POST["id"]);
               if($rs===true)
               {
                    header("Location: manager.php");
               }

               $err_db= "Dublicate Data";
          }
     }

/***********************************Insert Hotel*************************************/

if(isset($_POST["Insert"]))
     {
           if(empty($_POST["name"]))
          {
               $err_name="Name Required";
               $hasError = true;
          }

          else
          {
               $name=$_POST["name"];
          }

          if(empty($_POST["roomno"]))
          {
               $err_roomno="RoomNO Required";
               $hasError = true;
          }

          else
          {
               $roomno=$_POST["roomno"];
          }

          if(empty($_POST["desc"]))
          {
               $err_Desc="Description Required";
               $hasError = true;
          }

          else
          {  
               $Desc=$_POST["desc"];
          }

          if(!isset($_POST["Category"]))
          {
               $err_categories="Room Type Required";
               $hasError = true;
          }

          else
          {
               $categories=$_POST["Category"];
          }

          //Database

          if(!$hasError)
          {
               $file_name= $_FILES['file'] ['name'];
               $file_temp_loc= $_FILES['file'] ['tmp_name'];
               $file_store= "Upload/".$file_name;

               move_uploaded_file($file_temp_loc, $file_store);  
          
               $rs= insertHotel("$name","$roomno","$Desc","$file_store","$categories");
               
               if($rs===true)
               {
                    header("manager.php");
               }

               $err_db= $rs;

          }
     }

/***********************************Delete hotel********************************/

if(isset($_POST["Delete"]))
     {
          if(empty($_POST["name"]))
          {
               $err_name="Name Required";
               $hasError = true;
          }

          else
          {
               $name=$_POST["name"];
          }

            if(empty($_POST["RoomNO"]))
          {
               $err_roomno="RoomNo Required";
               $hasError = true;
          }

          else
          {
               $roomno=$_POST["roomno"];
          }

          if(empty($_POST["desc"]))
          {
               $err_Desc="Description Required";
               $hasError = true;
          }

          else
          {  
               $Desc=$_POST["desc"];
          }


               $categories=$_POST["category"];


          //Database

          if(!$hasError)
          {
               $rs=deleteHotel($_POST["id"]);
               var_dump($rs);
               if($rs===true)
               {
                    header("manager.php");
               }

               $err_db= $rs;
          }
     }

     function allHotels()
     {
     	$query= "select * from hotels";
     	return $rs= get($query);
     }

     function getHotels($id)
     {
          $query= "select * from hotels where id= $id";
          $rs= get($query);
          return $rs[0];
     }

     function updateHotel($name,$roomno,$Desc,$image,$Category,$id)
     {
          $query = "update hotels set name='$name', roomno='$roomno', description='$Desc',img='$image',Category='$Category' where id=$id";
          return execute($query);
     }

     function insertHotel($name,$roomno,$Desc,$img,$Category)
     {
          $query="INSERT INTO hotels VALUES(NULL,'$name','$roomno','$Desc','$img','$Category')";
          return execute($query);
     }

     function deleteHotel($id)
     {
          $query= "DELETE from hotels where id= $id";
          return execute($query);
     }
?>