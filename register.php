<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>JobX | Register</title>
</head>
<body>
    <header class="bg-light">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="/">
                    <img src="logo.webp" alt="JobX" width="60">
                    <h2 style="font-weight: bold; float: right;margin-right: 2px;">JobX</h2>
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="jobs.php">Jobs</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <section class="container my-5">
        <h2 class="text-center mb-4">Register</h2>

        <?php
        include 'db.php';  // Include the database connection file

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);  // Hash the password for security

            // Insert user into database
            $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
            
            if (mysqli_query($conn, $query)) {
                echo "<div class='alert alert-success'>Registration successful! You can now <a href='login.php'>log in</a>.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: Could not register. Please try again later.</div>";
            }
        }

        mysqli_close($conn); // Close the database connection
        ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </section>

    <footer class="bg-dark text-white mt-5">
        <div class="container py-4">
            <div class="text-center py-3">
                <p>&copy; 2024 JobX. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
