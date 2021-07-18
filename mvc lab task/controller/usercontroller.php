<<?php
    include 'Models/dbconfig.php';
    $name="";
    $err_name="";
    $pass="";
    $err_pass="";
    $err_db="";
    
    $hasError=false;
    
 
    if (isset ($_POST["Login"])){
        if(empty($_POST["name"])){
            $err_name="Name is Required";
            $hasError = true;
        }
        else{
            $name=$_POST["name"];
        }
        if(empty($_POST["pass"])){
            $err_pass="pass Required";
            $hasError = true;
        }
        else{
            $pass=$_POST["pass"];
        }
        if(authenticateUser($_POST["name"],$_POST["pass"])){
            session_start();
            $_SESSION["Loggeduser"] = $_POST["name"];
            header("Location: dashboard.php");
        }
        $err_db= "Username password invalid";
    }
 
    
 
    
    function authenticateUser($name,$pass){
        $query ="select * from admin where name='$name' and 'password='$pass'";
        $rs = get($query);
        if (count($rs)>0){
            return true;
        }
        return false;
    }
 
?>

?>