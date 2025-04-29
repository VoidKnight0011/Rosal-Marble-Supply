<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);

if(isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];

    $product_image_name = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploads/'.$product_image_name;

    if(empty($product_name) || empty($product_price) || empty($product_image_name) || empty($product_description) || empty($product_quantity)) {
        $message[] = 'Please Fill Out Everything!';
    } else {
        $insert = "INSERT INTO products(product_name, product_description, product_price, product_quantity, product_image) VALUES('$product_name', '$product_description', '$product_price', '$product_quantity', '$product_image_name')";
        $upload = mysqli_query($con, $insert);
        if($upload) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $message[] = 'New Product Added!';
        } else {
            $message[] = 'Could Not Add Product!';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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
                    <li><a href="admin-dashboard.php"><i class="fas fa-th-large"></i> Dashboard</a></li>
                    <li class="active"><a href="add-product.php"><i class="fas fa-plus"></i> Add Products</a></li>
                    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                </ul>
            </nav>
        </div>
        
        <div class="main-content">
            <header class="admin-header">
                <h1>Add to List of Products</h1>
            </header>
            
            <div class="container">
                <?php
                if(isset($message)) {
                    foreach($message as $msg) {
                        echo '<span>'.$msg.'</span>';
                    }
                }
                ?>
                
                <div class="form-container">
                    <h2 class="form-title">Product Information</h2>
                    
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="product_description" class="form-label">Product Description</label>
                            <textarea class="form-control" id="product_description" name="product_description" rows="4" required></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="product_price" class="form-label">Product Price</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" class="form-control" name="product_price" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="product_quantity" class="form-label">Product Quantity</label>
                            <input type="number" class="form-control" name="product_quantity" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="product_image" class="form-label">Product Image</label>
                            <input class="form-control" type="file" id="product_image" name="product_image" accept="image/*" required>
                        </div>
                        
                        <div class="form-actions">
                            <a href="admin-dashboard.php" class="btn btn-cancel">Cancel</a>
                            <button type="submit" class="btn btn-submit" name="add_product">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>