<?php
session_start();

$_SESSION['quoted'] = true;
$_SESSION['quotedSubject'] = isset($_GET['subject']) ? $_GET['subject'] : '';
$_SESSION['quotedMessage'] = isset($_GET['message']) ? $_GET['message'] : '';

header("Location: quote.php");
exit();
?>