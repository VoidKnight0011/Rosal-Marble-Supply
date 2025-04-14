<?php
session_start();
    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
                        <a href="admin-dashboard.html">
                            <i class="fas fa-th-large"></i> Dashboard
                        </a>
                    </li>
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
                                        <th>Product ID</th>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>001</td>
                                        <td></td>
                                        <td>White Carrara Marble</td>
                                        <td>Premium Italian marble with elegant gray veining</td>
                                        <td>$75.00/sq.ft</td>
                                        <td>250 sq.ft</td>
                                        <td>
                                            <button class="btn btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-delete"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>002</td>
                                        <td></td>
                                        <td>Calacatta Gold</td>
                                        <td>Luxurious marble with distinctive gold veining</td>
                                        <td>$120.00/sq.ft</td>
                                        <td>180 sq.ft</td>
                                        <td>
                                            <button class="btn btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-delete"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>003</td>
                                        <td></td>
                                        <td>Emperador Dark</td>
                                        <td>Rich brown marble with subtle veining patterns</td>
                                        <td>$85.00/sq.ft</td>
                                        <td>320 sq.ft</td>
                                        <td>
                                            <button class="btn btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-delete"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>004</td>
                                        <td></td>
                                        <td>Statuario Marble</td>
                                        <td>Classic white marble with dramatic gray veining</td>
                                        <td>$95.00/sq.ft</td>
                                        <td>210 sq.ft</td>
                                        <td>
                                            <button class="btn btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-delete"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>005</td>
                                        <td></td>
                                        <td>Nero Marquina</td>
                                        <td>Striking black marble with white veining</td>
                                        <td>$90.00/sq.ft</td>
                                        <td>175 sq.ft</td>
                                        <td>
                                            <button class="btn btn-sm btn-edit"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-delete"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="admin-actions mt-4">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                        <i class="fas fa-plus"></i> Add New Product
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addProductForm">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="productName" required>
                            </div>
                            <div class="col-md-6">
                                <label for="productPrice" class="form-label">Price (per sq.ft)</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="productPrice" step="0.01" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="productQuantity" class="form-label">Quantity (sq.ft)</label>
                                <input type="number" class="form-control" id="productQuantity" required>
                            </div>
                            <div class="col-md-6">
                                <label for="productOrigin" class="form-label">Origin</label>
                                <input type="text" class="form-control" id="productOrigin">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="productDescription" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="productImage" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="productImage">
                        </div>
                        <div class="mb-3">
                            <label for="productFinishes" class="form-label">Available Finishes</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Polished" id="finishPolished">
                                <label class="form-check-label" for="finishPolished">Polished</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Honed" id="finishHoned">
                                <label class="form-check-label" for="finishHoned">Honed</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Brushed" id="finishBrushed">
                                <label class="form-check-label" for="finishBrushed">Brushed</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Leather" id="finishLeather">
                                <label class="form-check-label" for="finishLeather">Leather</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveProductBtn">Save Product</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src = "script.js"></script>
</body>
</html>