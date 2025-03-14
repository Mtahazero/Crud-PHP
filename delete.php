<?php

session_start();

if(isset($_GET['id'])){
   
    require_once("connection.php");

    $id =$_GET['id'];
   
    $fetch = mysqli_query($conn,"SELECT * FROM products WHERE Id = $id");

    if(mysqli_num_rows($fetch)<1 || $id <=0 ){
        $_SESSION['error'] = "ID Is not Found ";
        header("location:viewAll.php");
        exit;
    }

    $query = "DELETE FROM products WHERE id = $id";
    $result =mysqli_query($conn,$query);

    if(!$result){
        $_SESSION['error'] = "DELET Product is Not Success";
        header("location:viewAll.php");
        exit;

    }else{
        $_SESSION['success'] =  "DELET Product is Successful";
        header("location:viewAll.php");
        exit;
    }
     


}
$_SESSION['error'] = "No product ID provided.";
header("location:viewAll.php");


?>