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

     $Categories = array("Lunch","Dinner","Breakfast");

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

            //$categories=$_POST["category"];

          //Database

          if(!$hasError)
          {
               $file_name= $_FILES['file'] ['name'];
               $file_temp_loc= $_FILES['file'] ['tmp_name'];
               $file_store= "Upload/".$file_name;

               move_uploaded_file($file_temp_loc, $file_store); 

               $rs=updateMeal("$name","$price","$Desc","$file_store","$categories",$_POST["id"]);
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
               $err_categories="Meal Type Required";
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
          
               $rs= insertMeal("$name","$price","$Desc","$file_store","$categories");
               
               if($rs===true)
               {
                    header("manager.php");
               }

               $err_db= $rs;

          }
     }

/***********************************Delete Tutor********************************/

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
               $rs=deleteMeal($_POST["id"]);
               var_dump($rs);
               if($rs===true)
               {
                    header("manager.php");
               }

               $err_db= $rs;
          }
     }

     function allMeals()
     {
     	$query= "select * from meals";
     	return $rs= get($query);
     }

     function getMeals($id)
     {
          $query= "select * from meals where id= $id";
          $rs= get($query);
          return $rs[0];
     }

     function updateMeal($name,$price,$Desc,$image,$Category,$id)
     {
          $query = "update meals set name='$name', price='$price', description='$Desc',img='$image',Category='$Category' where id=$id";
          return execute($query);
     }

     function insertMeal($name,$price,$Desc,$img,$Category)
     {
          $query="INSERT INTO meals VALUES(NULL,'$name','$price','$Desc','$img','$Category')";
          return execute($query);
     }

     function deleteMeal($id)
     {
          $query= "DELETE from meals where id= $id";
          return execute($query);
     }
?>