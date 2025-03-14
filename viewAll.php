<?php 

session_start();
if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
    session_destroy();
} 
if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
    session_destroy();
}

require_once ('connection.php');

$query = 'SELECT * FROM products' ;

$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
    <link rel="stylesheet" href="css/table.css">
</head>
<body>
    <div class="table-container">
        <h1>Product List</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?=$row['name']?></td>
                        <td><?=$row['description']?></td>
                        <td><?=$row['price']?></td>
                        <td><?=$row['stock']?></td>
                        <td>
                        <button onclick="window.location.href='edit.php?id=<?= $row['id'] ?>'" class="edit-btn">Edit</button>
                            <button onclick="window.location.href='delete.php?id=<?= $row['id'] ?>'" class="delete-btn">Delete</button>
                        </td>
                    </tr>
                <?php endwhile ?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</body>
</html>