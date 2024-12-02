<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Apply for Job</title>
</head>
<body>
    <?php include('header.php'); ?>
    
    <div class="container">
        <h2>Apply for Job</h2>
        <?php
        include('db.php');
        
        if (isset($_GET['id'])) {
            $job_id = $_GET['id'];
            $sql = "SELECT * FROM jobs WHERE id = $job_id"; // Fetch job details
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<h3>" . $row["job_title"] . "</h3>";
                echo "<p>Company: " . $row["company"] . "</p>";
                echo "<p>Location: " . $row["location"] . "</p>";
                echo "<form action='submit_application.php' method='post'>";
                echo "<input type='hidden' name='job_id' value='" . $row["id"] . "'>";
                echo "<label for='applicant_name'>Your Name:</label><br>";
                echo "<input type='text' id='applicant_name' name='applicant_name' required><br>";
                echo "<input type='submit' value='Apply'>";
                echo "</form>";
            } else {
                echo "<p>Job not found.</p>";
            }
        } else {
            echo "<p>No job selected.</p>";
        }
        $conn->close();
        ?>
    </div>

    <?php include('footer.php'); ?>
</body>
</html>
