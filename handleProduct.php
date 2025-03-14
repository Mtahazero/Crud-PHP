<?php

session_start();

require_once('connection.php');
function location($header){
    return header("location:$header");
}

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){

   

    $name =htmlentities($_POST['name']);
    $description =htmlentities($_POST['description']);
    $price =htmlentities($_POST['price']);
    $stock =htmlentities($_POST['stock']);
    
    $Error = array();

    if(empty($name))  $Error['name'] = "name is required";
    if(empty($description)) $Error['description'] = "description is required";
    if($price <= 0) $Error['price'] = "price mast be a positive number";
    if($stock < 0) $Error['stock'] = "Stock cannot be negative";

    
    if(empty($Error)){
        //$conn =mysqli_connect('localhost','root','','test');
        if(!$conn){
            $Error['connect'] = "Database is Not connection";
            location('addProduct.php');
            exit ;
        }
        $query = "INSERT INTO products(`name`,`description`,`price`,`stock`) VALUES ('$name','$description','$price','$stock')";
        $result = mysqli_query($conn,$query);
        if(!$result){
            $_SESSION['error'] = 'Add Producted is not Successful';
            location('addProduct.php');
            exit ;
        }
        $_SESSION['successful'] = 'Add Producted is Successful';
        location('Product.php');
        exit ;
    }
    $_SESSION['error'] = $Error;
    location('addProduct.php');
    exit ;
    
}
location('product.php');
exit ;
?>