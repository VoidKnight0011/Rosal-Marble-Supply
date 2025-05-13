<?php
session_start();

include("connection.php");
include("functions.php");

$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password) && !is_numeric($username)) {
        $query = "SELECT * FROM admin WHERE username = '$username' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['password'] === $password) {
                $_SESSION['admin_id'] = $user_data['admin_id'];
                header("Location: admin-dashboard.php");
                die;
            } else {
                $errorMessage = "Incorrect Username or Password";
            }
        } else {
            $errorMessage = "Incorrect Username or Password";
        }
    } else {
        $errorMessage = "Please enter valid username and password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="admin-login-body">
    <div class="admin-login-container">
        <div class="row h-100 m-0">
            <div class="col-md-6 logo-section">
                <div class="logo-content">
                    <img src="images/rosal_marble_supply-logo.jpg" alt="Rosal Marble Supply Logo" class="admin-logo">
                    <h1 class="company-name">Rosal Marble Supply</h1>
                </div>
            </div>

            <div class="col-md-6 form-section">
                <div class="login-form-container">
                    <h1 class="form-title">Admin Login</h1>
                    <form method="post" action="">
                        <div class="inputGroup">
                            <i class="bi bi-person-fill"></i>
                            <input type="text" name="username" id="text" placeholder="Username" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="inputGroup">
                            <i class="bi bi-lock-fill"></i>
                            <input type="password" name="password" id="text" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>

                        <?php if (!empty($errorMessage)): ?>
                            <div class="error-message"><?php echo $errorMessage; ?></div>
                        <?php endif; ?>

                        <input type="submit" class="btn btn-primary login-btn" value="Login" name="adminLogin">
                    </form>
                    <div class="back-to-site">
                        <a href="home.php"><i class="bi bi-arrow-left"></i> Back to Website</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>