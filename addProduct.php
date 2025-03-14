<?php
session_start();
if(isset($_SESSION['error'])){
    foreach($_SESSION['error'] as  $value)
    echo $value . '<br>';
    unset($_SESSION['error']);
    session_destroy();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h1>Product Form</h1>
        <form action="handleProduct.php" method="POST">
            <!-- Name Field -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter product name" required>
            </div>

            <!-- Description Field -->
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" placeholder="Enter product description" rows="4"required ></textarea>
            </div>

            <!-- Price Field -->
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" placeholder="Enter product price" min="0" step="0.01" required>
            </div>

            <!-- Stock Field -->
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" min="0" placeholder="Enter product stock" required>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" name ='submit' class="submit-button">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>