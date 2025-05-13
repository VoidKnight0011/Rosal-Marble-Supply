<?php
session_start();
    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

$sql    = "SELECT * FROM products";
$result = mysqli_query($con, $sql);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($con, "DELETE FROM products WHERE product_id = $id");
    header('location: admin-dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Rosal Marble Supply</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="admin-container">
        <div class="sidebar">
            <div class="logo-container">
                <img src="images/rosal_marble_supply-logo.jpg" alt="RMS Logo" class="admin-logo">
                <div class="company-name">Rosal Marble Supply</div>
            </div>
            
            <div class="admin-welcome">
                <h2>Welcome, Admin!</h2>
            </div>
            
            <nav class="admin-nav">
                <ul>
                    <li class="active">
                        <a href="admin-dashboard.php">
                        <i class="fas fa-th-large"></i> Dashboard
                        </a>
                    </li>
                    <ul>
                            <li>
                                <a href="admin-add.php">
                                    <i class="fas fa-plus"></i> Add Products
                                </a>
                            </li>
                        </ul>
                    <li>
                        <a href="logout.php">
                            <i class="fas fa-sign-out-alt"></i> Log Out
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        
        <div class="main-content">
            <header class="admin-header">
                <h1>Admin Dashboard</h1>
            </header>
            
            <div class="content-container">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover product-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product Category</th>
                                        <th>Product Image</th>
                                        <th>Description</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>

                                <?php
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                ?>

                                <tbody>
                                <tr>
                                    <td><?php echo $row['product_name'] ?></td>
                                    <td><?php echo $row['category']?></td>
                                    <td><img id="php-img" src="uploads/<?php echo $row['product_image'] ?>" style="width: 100px; height: auto;"></td>
                                    <td><?php echo $row['product_description'] ?></td>
                                    <td>
                                        <a href = "admin-update.php?edit=<?php echo $row['product_id']?>" class = "btn btn-primary">Update</a>
                                        <a href = "admin-dashboard.php?delete=<?php echo $row['product_id']?>" class = "btn btn-primary">Delete</a>

                                    </td>
                                </tr>
                                </tbody>
                                
                                <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src = "script.js"></script>
</body>
</html>