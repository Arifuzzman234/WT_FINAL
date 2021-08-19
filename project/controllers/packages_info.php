<?php  
     include 'models/db_config.php';

     $name="";
     $err_name="";
     $price="";
     $err_price="";
     $Desc="";
     $err_Desc="";
     $err_db="";
     $categories="";
     $err_categories="";

     $hasError = false;

     $Categories = array("1500tk","3000k","5000k","100000tk");

/*************************Update meal************************************/
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

          if(empty($_POST["price"]))
          {
               $err_price="Price Required";
               $hasError = true;
          }

          else
          {
               $price=$_POST["price"];
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

           /// $categories=$_POST["category"];

          //Database

          if(!$hasError)
          {
               $file_name= $_FILES['file'] ['name'];
               $file_temp_loc= $_FILES['file'] ['tmp_name'];
               $file_store= "Upload/".$file_name;

               move_uploaded_file($file_temp_loc, $file_store); 

               $rs=updatePackage("$name","$price","$Desc","$file_store","$categories",$_POST["id"]);
               if($rs===true)
               {
                    header("Location: manager.php");
               }

               $err_db= "Dublicate Data";
          }
     }

/***********************************Insert package*************************************/

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

          if(empty($_POST["price"]))
          {
               $err_price="Price Required";
               $hasError = true;
          }

          else
          {
               $price=$_POST["price"];
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
               $err_categories="Choose your package Required";
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
          
               $rs= insertPackage("$name","$price","$Desc","$file_store","$categories");
               
               if($rs===true)
               {
                    header("manager.php");
               }

               $err_db= $rs;

          }
     }

/***********************************Delete package********************************/

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

          if(empty($_POST["price"]))
          {
               $err_price="Price Required";
               $hasError = true;
          }

          else
          {
               $price=$_POST["price"];
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


               ///$categories=$_POST["category"];


          //Database

          if(!$hasError)
          {
               $rs=deletePackage($_POST["id"]);
               var_dump($rs);
               if($rs===true)
               {
                    header("manager.php");
               }

               $err_db= $rs;
          }
     }

     function allPackages()
     {
     	$query= "select * from packages";
     	return $rs= get($query);
     }

     function getPackages($id)
     {
          $query= "select * from packages where id= $id";
          $rs= get($query);
          return $rs[0];
     }

     function updatePackage($name,$price,$Desc,$image,$Category,$id)
     {
          $query = "update packages set name='$name', price='$price', description='$Desc',img='$image',Category='$Category' where id=$id";
          return execute($query);
     }

     function insertPackage($name,$price,$Desc,$img,$Category)
     {
          $query="INSERT INTO packages VALUES(NULL,'$name','$price','$Desc','$img','$Category')";
          return execute($query);
     }

     function deletePackage($id)
     {
          $query= "DELETE from Packages where id= $id";
          return execute($query);
     }
?>