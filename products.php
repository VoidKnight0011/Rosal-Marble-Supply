<?php
    include("connection.php");

        $sql = "SELECT * from products";
        $result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse d-lg-flex" id="navbarNav">
                <a class="navbar-brand col-lg-3 me-0" href="home.php">
                    <img src="images/rosal_marble_supply-logo.jpg" class="logo-img">
                </a>
                <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                    <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="products.php">Our Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                </ul>
                <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                    <a href="quote.php" class="btn btn-primary">GET A QUOTE</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="products-header py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold">OUR PRODUCTS</h1>
        </div>
    </section>

<section class="products-grid py-5">
    <div class="container">
        <div class="row g-4">
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-6 col-lg-4">
                    <div class="product-card" onclick="showProductModal('<?php echo $row['product_name']; ?>', '<?php echo $row['category']; ?>','<?php echo $row['product_description']; ?>', 'uploads/<?php echo $row['product_image']; ?>')">
                        <div class="product-image">
                            <img src="uploads/<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_name']; ?>" class="img-fluid">
                        </div>
                        <div class="product-info">
                            <h4 class="product-title"><?php echo $row['product_name']; ?></h4>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
    
    <div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img id="modalImage" src="/placeholder.svg" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h3 id="modalName"></h3>
                        <p>
                            <span id = "semi-bold">Category:</span> 
                            <span id="modalCategory" style="color: black;">
                        </p>
                        <p>
                            <span id = "semi-bold">Description:</span>
                            <span id="modalDesc" style="color: black;"></p>
                        </p>
                        <a href="quote.php" class="btn btn-primary w-100 mt-4">Get a Quote</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
    <footer class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <h3 class="mb-3">Rosal Marble Supply</h3>
                    <p id = "rosal-footer-p">We specialize in providing premium quality stones and marble to elevate your Projects. With Guaranteed quality and exceptional service, Secured with unparalleled service and craftmanship making your vision a reality. </p>
                </div>
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <h4 class="mb-3">COMPANY</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="services.php">Our Services</a></li>
                        <li class="mb-2"><a href="clients.php">Our Clients</a></li>
                        <li class="mb-2"><a href="about.php">About Us</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-4">
                    <h4 class="mb-3">CONTACT INFORMATION</h4>
                    <div class="contact-item mb-3">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>774 corner St. Jude, Acres Bukang Liwayway, Cebu City, Philippines</p>
                    </div>
                    <div class="contact-item mb-3">
                        <i class="fas fa-phone"></i>
                        <p>0962 137 4908</p>
                    </div>
                    <div class="contact-item mb-3">
                        <i class="fas fa-envelope"></i>
                        <p>rosalmarblesupply@gmail.com</p>
                    </div>
                    <h4 class="mb-2 mt-4">FOLLOW US</h4>
                    <span class="social-links">
                        <a href="https://www.facebook.com/profile.php?id=100091891141733">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src = "script_02.js"></script>
</html>