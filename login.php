<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>Job Portal | Login</title>
</head>
<body>
    <section class="container my-5">
        <h2 class="text-center mb-4">Login</h2>
        <form id="loginForm" class="w-50 mx-auto" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <div id="loginMessage" class="text-center mt-3">
            <?php
            session_start();
            include 'db.php'; // Include the database connection

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                
                // Query to verify user credentials
                $query = "SELECT * FROM users WHERE username='$username'";
                $result = mysqli_query($conn, $query);
                
                if ($result && mysqli_num_rows($result) > 0) {
                    $user = mysqli_fetch_assoc($result);
                    if (password_verify($password, $user['password'])) {
                        // If credentials match, set session and redirect with alert
                        $_SESSION['username'] = $username;
                        echo "<script>alert('Login successful! Welcome, $username.'); window.location.href='index.php';</script>";
                        exit;
                    } else {
                        echo "<p style='color: red;'>Invalid username or password. Please try again.</p>";
                    }
                } else {
                    echo "<p style='color: red;'>Invalid username or password. Please try again.</p>";
                }

                mysqli_close($conn); // Close database connection
            }
            ?>
        </div>

        <!-- Link to Register page -->
        <div class="text-center mt-3">
            <p>Don't have an account? <a href="register.php">Register here</a>.</p>
        </div>
    </section>

    <footer class="bg-dark text-white mt-5">
        <div class="container py-4 text-center">
            <p>&copy; 2024 Job Portal. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
