<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get a Quote - Rosal Marble Supply</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse d-lg-flex" id="navbarNav">
                <a class="navbar-brand col-lg-3 me-0" href="home.php">
                    <img src="images/rosal_marble_supply-logo.jpg" alt="RMS Logo" class="logo-img">
                </a>
                <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                    <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="products.php">Our Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                </ul>
                <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                    <a href="quote.php" class="btn btn-primary active">GET A QUOTE</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="contact-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="contact-form-container">
                        <h1 class="form-title text-center mb-4">SEND A MESSAGE TO US</h1>
                        <form id="contactForm" action="send-message.php" method="post">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                            </div>
                            <div class="mb-3">
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" id="recipient" name="recipient">
                                    <option value="" selected>Email Recipient</option>
                                    <option value="sales">rosalmarblesupply@gmail.com</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <textarea class="form-control" id="message" name="message" rows="6" placeholder="Your Message" required></textarea>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-send">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <footer class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <h3 class="mb-3">Rosal Marble Supply</h3>
                    <p>Embark on a journey of transformation with Rosal Marble Supply.</p>
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
                    <div class="social-links">
                        <a href="https://www.facebook.com/profile.php?id=100091891141733">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src = "script.js"></script>
</body>
</html>