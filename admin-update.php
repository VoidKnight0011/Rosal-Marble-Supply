<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);

if(!isset($_GET['edit'])) {
    header('location: admin-dashboard.php');
    exit;
}

$id = $_GET['edit'];

if(isset($_POST['update_product'])) {
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_category = $_POST['category'];
    $product_id = $_POST['product_id'];

    if(!empty($_FILES['product_image']['name'])) {
        $product_image_name = $_FILES['product_image']['name'];
        $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
        $product_image_folder = 'uploads/'.$product_image_name;
        
        $update = "UPDATE products SET product_name = '$product_name', category = '$product_category', 
                  product_description = '$product_description', product_image = '$product_image_name' 
                  WHERE product_id = $product_id";
                  
        $upload = mysqli_query($con, $update);
        if($upload) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            header('location: admin-dashboard.php');
            exit;
        } else {
            $message[] = 'Could Not Update Product!';
        }
    } else {
        $update = "UPDATE products SET product_name = '$product_name', category = '$product_category', 
                  product_description = '$product_description' WHERE product_id = $product_id";
                  
        $upload = mysqli_query($con, $update);
        if($upload) {
            header('location: admin-dashboard.php');
            exit;
        } else {
            $message[] = 'Could Not Update Product!';
        }
    }
}

$select = mysqli_query($con, "SELECT * FROM products WHERE product_id = $id");
$row = mysqli_fetch_assoc($select);
if(!$row) {
    header('location: admin-dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
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
                    <li><a href="add-product.php"><i class="fas fa-plus"></i> Add Products</a></li>
                    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
                </ul>
            </nav>
        </div>
        
        <div class="main-content">
            <header class="admin-header">
                <h1>Update Product</h1>
            </header>
            
            <div class="container">
                <?php
                if(isset($message)) {
                    foreach($message as $msg) {
                        echo '<div class="alert alert-danger">'.$msg.'</div>';
                    }
                }
                ?>
                
                <div class="form-container">
                    <h2 class="form-title">Product Information</h2>
                    
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                        
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" required value="<?php echo $row['product_name']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Product Category</label>
                            <select class="form-select" id="category" name="category">
                                <option value="">Choose Stone Type</option>
                                <option <?php if($row['category'] == 'Cement') echo 'selected'; ?>>Cement</option>
                                <option <?php if($row['category'] == 'Crazy Cut') echo 'selected'; ?>>Crazy Cut</option>
                                <option <?php if($row['category'] == 'Marbles') echo 'selected'; ?>>Marbles</option>
                                <option <?php if($row['category'] == 'Pebbles') echo 'selected'; ?>>Pebbles</option>
                                <option <?php if($row['category'] == 'Rubbles') echo 'selected'; ?>>Rubbles</option>
                                <option <?php if($row['category'] == 'Stone') echo 'selected'; ?>>Stone</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="product_description" class="form-label">Product Description</label>
                            <textarea class="form-control" id="product_description" name="product_description" rows="4" required><?php echo $row['product_description']; ?></textarea>
                        </div>
                        

                        <div class="mb-4">
                            <label for="product_image" class="form-label">Product Image</label>
                            <input class="form-control" type="file" id="product_image" name="product_image" accept="image/*">

                        <?php if(!empty($row['product_image'])): ?>
                            <div class="mt-2">
                                <p>Current image:</p>
                                <img class = "product-image-admin" src="uploads/<?php echo $row['product_image']; ?>">
                            </div>
                            <?php endif; ?>
                        </div>
                            <small class="text-muted">Leave empty to keep the current image</small>
                    
                        
                        <div class="form-actions">
                            <a href="admin-dashboard.php" class="btn btn-cancel">Cancel</a>
                            <button type="submit" class="btn btn-submit" name="update_product">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>