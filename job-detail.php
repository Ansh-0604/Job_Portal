<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>JobX | Job Details</title>
</head>
<body>
    <header class="bg-light">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="/">
                    <img src="logo.jpg" alt="JobX" width="60">
                    <h2 style="font-weight: bold; float: right; margin-right: 2px;">JobX</h2>
                </a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="jobs.php">Jobs</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <section class="container my-5">
        <?php
        include 'db.php'; // Include the database connection

        if (isset($_GET['id'])) {
            $job_id = intval($_GET['id']); // Retrieve and sanitize the job ID

            // Fetch the job details from the database
            $query = "SELECT * FROM job_listings WHERE id = $job_id";
            $result = mysqli_query($conn, $query);

            // Check if the job exists
            if (mysqli_num_rows($result) > 0) {
                $job = mysqli_fetch_assoc($result);

                echo "<h2 class='text-center mb-4'>{$job['job_title']}</h2>";
                echo "<p><strong>Location:</strong> {$job['location']}</p>";
                echo "<p><strong>Salary:</strong> {$job['salary']}</p>";
                echo "<p><strong>Job Description:</strong> {$job['description']}</p>";

                // Example responsibilities (replace with dynamic content if available)
                echo "<p><strong>Responsibilities:</strong></p>";
                echo "<ul>
                        <li>Develop high-quality software design and architecture.</li>
                        <li>Identify, prioritize, and execute tasks in the software development life cycle.</li>
                        <li>Automate tasks through appropriate tools and scripting.</li>
                        <li>Review and debug code.</li>
                        <li>Collaborate with internal teams to produce software design and architecture.</li>
                      </ul>";

                echo "<button class='btn btn-success' onclick=\"window.location.href='application.php?id={$job['id']}'\">Apply Now</button>";
            } else {
                echo "<p class='text-center'>Job not found.</p>";
            }
        } else {
            echo "<p class='text-center'>No job selected.</p>";
        }

        mysqli_close($conn); // Close the database connection
        ?>
    </section>

    <footer class="bg-dark text-white mt-5">
        <div class="container py-4 text-center">
            <p>&copy; 2024 JobX. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
