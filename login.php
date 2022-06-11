<?php
include 'config.php';
// Check whether email or password is set from android if
if (isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
    // Innitialize Variable
    $result = '';
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    // Query database for row exist or not
    $sql = 'SELECT * FROM tbl_login WHERE email = :email AND password = :password';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount()) {
        $result = "true";
    } elseif (!$stmt->rowCount()) {
        $result = "false";
    }
    // send result back to android
    echo $result;
}
