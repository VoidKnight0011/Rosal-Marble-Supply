    <?php
    function check_login($con){

        if (isset($_SESSION['admin_id'])) {
            $id = (int)$_SESSION['admin_id'];
            $query = "SELECT * FROM admin WHERE admin_id = '$id' LIMIT 1";

            $result = mysqli_query($con, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }

        header("Location: admin.php");
        exit();
    }




    
if(!isset($_SESSION['quoted'])) {
    $_SESSION['quoted'] = false;
    $_SESSION['quotedSubject'] = '';
    $_SESSION['quotedMessage'] = '';
}

    ?>