<?php
include 'db.php'; // Database connection file

$successMessage = ""; // Variable to hold success message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $company = $_POST['company'];
    $location = $_POST['location'];
    $salary = $_POST['salary'];
    $description = $_POST['description'];

    // Insert job data into the database
    $sql = "INSERT INTO job_listings (title, company, location, salary, description) 
            VALUES ('$title', '$company', '$location', '$salary', '$description')";
    
    if (mysqli_query($conn, $sql)) {
        $successMessage = "Job posted successfully!"; // Set success message
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>Job Portal | Post a Job</title>
    <script>
        // Function to show alert message if job is posted successfully
        function showAlert() {
            const message = "<?php echo addslashes($successMessage); ?>"; // Escape quotes for JavaScript
            if (message) {
                alert(message); // Show alert only if there is a message
            }
        }
    </script>
</head>
<body onload="showAlert()"> <!-- Call showAlert on page load -->
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
                        <li class="nav-item"><a class="nav-link" href="post-job.php">Post a Job</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <section class="container my-5">
        <h2 class="text-center mb-4">Post a Job</h2>

        <!-- Job Posting Form -->
        <form action="post-job.php" method="POST" class="w-50 mx-auto">
            <div class="mb-3">
                <label for="jobTitle" class="form-label">Job Title</label>
                <input type="text" class="form-control" id="jobTitle" name="title" required>
            </div>
            <div class="mb-3">
                <label for="companyName" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="companyName" name="company" required>
            </div>
            <div class="mb-3">
                <label for="jobLocation" class="form-label">Location</label>
                <input type="text" class="form-control" id="jobLocation" name="location" required>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" class="form-control" id="salary" name="salary" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Job Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post Job</button>
        </form>
    </section>
</body>
</html>
