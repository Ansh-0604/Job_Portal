<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username;
            $_SESSION["user_role"] = $row["user_role"];
            header("Location: dashboard.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}
?>
