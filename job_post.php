<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Post a Job</title>
</head>
<body>
    <h2>Post a New Job</h2>
    <form action="post_job.php" method="post">
        <label>Job Title:</label>
        <input type="text" name="title" required><br>
        <label>Description:</label>
        <textarea name="description" required></textarea><br>
        <label>Company:</label>
        <input type="text" name="company" required><br>
        <label>Location:</label>
        <input type="text" name="location" required><br>
        <label>Salary:</label>
        <input type="text" name="salary" required><br>
        <input type="submit" value="Post Job">
    </form>
</body>
</html>
