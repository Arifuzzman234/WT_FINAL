<?php  
     include 'models/db_config.php';

     $name="";
     $err_name="";
     $phoneno="";
     $err_phoneno="";
     $Desc="";
     $err_Desc="";
     $err_db="";
     $categories="";
     $err_categories="";

     $hasError = false;

     $Categories = array("Summer Deal","14 Days America","Winter Deal","One month Europe");

/*************************Update meal************************************/
     if(isset($_POST["special offer"]))
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

          if(empty($_POST["phoneno"]))
          {
               $err_phoneno="Phoneno Required";
               $hasError = true;
          }

          else
          {
               $phoneno=$_POST["phoneno"];
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

               $rs=updateClint("$name","$phoneno","$Desc","$file_store","$categories",$_POST["id"]);
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

          if(empty($_POST["phoneno"]))
          {
               $err_phoneno="Phone No Required";
               $hasError = true;
          }

          else
          {
               $phoneno=$_POST["phoneno"];
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
          
               $rs= insertClint("$name","$phoneno","$Desc","$file_store","$categories");
               
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

          if(empty($_POST["phoneno"]))
          {
               $err_phoneno="Phoneno Required";
               $hasError = true;
          }

          else
          {
               $phoneno=$_POST["phoneno"];
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
               $rs=deleteClint($_POST["id"]);
               var_dump($rs);
               if($rs===true)
               {
                    header("manager.php");
               }

               $err_db= $rs;
          }
     }

     function allClints()
     {
     	$query= "select * from clints";
     	return $rs= get($query);
     }

     function getClints($id)
     {
          $query= "select * from clints where id= $id";
          $rs= get($query);
          return $rs[0];
     }

     function updateClint($name,$phoneno,$Desc,$image,$Category,$id)
     {
          $query = "update clints set name='$name', price='$price', description='$Desc',img='$image',Category='$Category' where id=$id";
          return execute($query);
     }

     function insertClint($name,$phoneno,$Desc,$img,$Category)
     {
          $query="INSERT INTO clints VALUES(NULL,'$name','$phoneno','$Desc','$img','$Category')";
          return execute($query);
     }

     function deleteClint($id)
     {
          $query= "DELETE from clints where id= $id";
          return execute($query);
     }
?>