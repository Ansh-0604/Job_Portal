<?php
include 'db.php'; // Database connection file
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>Job Portal | Job Listings</title>
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
        <h2 class="text-center mb-4">Job Listings</h2>
        <div class="row">
            <?php
            $query = "SELECT * FROM job_listings ORDER BY created_at DESC";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <div class='col-md-4'>
                        <div class='card mb-4'>
                            <div class='card-body'>
                                <h5 class='card-title'>{$row['title']}</h5>
                                <h6 class='card-subtitle mb-2 text-muted'>{$row['company']}</h6>
                                <p class='card-text'><strong>Location:</strong> {$row['location']}</p>
                                <p class='card-text'><strong>Salary:</strong>Rs. {$row['salary']} </p>
                                <p class='card-text'>{$row['description']}</p>
                                <a href='application.php?id={$row['id']}' class='btn btn-primary'>Apply</a>
                            </div>
                        </div>
                    </div>";
                }
            } else {
                echo "<p class='text-center'>No jobs available.</p>";
            }

            mysqli_close($conn);
            ?>
        </div>
    </section>
</body>
</html>
