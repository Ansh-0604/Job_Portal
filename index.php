<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <title>JobX | Job Portal</title>
</head>
<body>
    <header class="bg-light">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="/">
                    <img src="logo.webp" alt="JobX" width="60">
                    <h2 style="font-weight: bold; float: right; margin-right: 2px;">JobX</h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="jobs.php">Jobs</a></li>
                        <li class="nav-item"><a class="nav-link" href="post-job.php">Post a Job</a></li>
                        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!-- Banner -->
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center justify-content-center bg-warning text-white p-5" style="height: 80vh;">
                <div>
                    <h1>Find Your Dream Job</h1>
                    <p class="mb-4"><em>Where talent meets opportunity.</em></p>
                    <a href="jobs.php" class="btn btn-light btn-lg">Browse Jobs &#10142;</a>
                </div>
            </div>
            <div class="col-md-6">
                <img src="banner.webp" alt="Job Opportunities" class="img-fluid" style="height: 80vh;">
            </div>
        </div>
    </section>

    <section class="container my-5" id="about">
        <h2 class="text-center mb-4">About Us</h2>
        <p>We are dedicated to connecting job seekers with top employers. Our platform is designed to streamline the job search process and make it easier for candidates to find positions that match their skills and interests.</p>
    </section>

    <section class="container my-5" id="job-listings">
        <h2 class="text-center mb-4">Available Jobs</h2>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Job Title</th>
                    <th>Company</th>
                    <th>Location</th>
                    <th>Salary</th>
                    <th>Apply</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php';

                // Fetch jobs from the database
                $query = "SELECT * FROM job_listings"; // Updated table name
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['title']}</td>
                                <td>{$row['company']}</td>
                                <td>{$row['location']}</td>
                                <td>{$row['salary']}</td>
                                <td><a href='application.php?id={$row['id']}' class='btn btn-primary'>Apply</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>No jobs available</td></tr>";
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5">
        <div class="container py-4">
            <div class="text-center py-3">
                <p>&copy; 2024 JobX. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
