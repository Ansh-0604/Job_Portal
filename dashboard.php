<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION["username"]; ?></h1>
    <?php if ($_SESSION["user_role"] == "employer"): ?>
        <a href="job_post.php">Post a Job</a>
    <?php endif; ?>
    <a href="logout.php">Logout</a>
</body>
</html>
