<?php
include 'db.php'; // Database connection file

if (isset($_GET['id'])) {
    $jobId = $_GET['id'];
} else {
    echo "Job ID not specified.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $resume = $_FILES['resume']['name'];
    $resumeTemp = $_FILES['resume']['tmp_name'];
    $resumePath = "uploads/" . basename($resume);

    // Move uploaded file to the "uploads" directory
    if (move_uploaded_file($resumeTemp, $resumePath)) {
        $sql = "INSERT INTO job_applications (job_id, name, email, resume) 
                VALUES ('$jobId', '$name', '$email', '$resumePath')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Application submitted successfully!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload resume.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>Job Portal | Application</title>
</head>
<body>
    <header class="bg-light">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="/">
                    <img src="logo.webp" alt="Job Portal" width="60">
                    <h2 style="font-weight: bold; float: right; margin-right: 2px;">Job Portal</h2>
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
        <h2 class="text-center mb-4">Application Form</h2>
        <form action="application.php?id=<?php echo $jobId; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="resume" class="form-label">Upload Resume</label>
                <input type="file" class="form-control" id="resume" name="resume" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
    </section>

    <footer class="bg-dark text-white mt-5">
        <div class="container py-4 text-center">
            <p>&copy; 2024 Job Portal. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
