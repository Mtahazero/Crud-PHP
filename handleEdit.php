<?php 

session_start();
require_once('connection.php');



if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])){
    if(isset($_GET['id'])){
        
        $id =$_GET['id'];
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
            $result = mysqli_query($conn,"SELECT * FROM products WHERE id = $id");
            $row = mysqli_fetch_assoc($result);

            if($name == $row['name']&&$description == $row['description']&&$price == $row['price']&&$stock == $row['stock']){
                $_SESSION['success'] = "Edit Product is Successful";
                header('location:viewAll.php');
                exit();
            }else{
                $query = "UPDATE products SET name='$name',description='$description',price='$price',stock='$stock',updated_at=now() WHERE id ='$id'";
                $result = mysqli_query($conn,$query);
                if($result){
                    $_SESSION['success'] = "Save Product is Successful  ";
                    header('location:viewAll.php');
                    exit();
                }else{
                    $_SESSION['error'] = "UPDate Product is not Successful";
                    header("location:edit.php?id=$id");
                    exit();
                }

            }
        }else{
            $_SESSION['error'] = "UPDate Product is not Successful";
            header("location:edit.php?id=$id");
            exit();
        }


    }else{
        header("location:viewAll.php");
        exit();
    }
}
else{
    header("location:viewAll.php");
    exit();
}



?>