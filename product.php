<?php 
session_start();
if(isset($_SESSION['successful'])){

    echo $_SESSION['successful'];
    unset($_SESSION['successful']);
    session_destroy();
}
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="button-container">

        <button  onclick="window.location.href='viewAll.php'" class="button button-primary">Display All Products</button>
        <button  onclick="window.location.href='addProduct.php'" class="button button-secondary">Create New Product</button>
    </div>
</body>
</html>

