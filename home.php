<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "user_registration"; // Your database name

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $_POST["content"];

    // Escape special characters to prevent SQL injection
    $content = mysqli_real_escape_string($conn, $content);

    // Insert data into database
    $sql = "INSERT INTO paragraphs(content) VALUES ('$content')";

    if (mysqli_query($conn, $sql)) {
        echo "Text added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Text</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <h1>Add Text</h1>
        <form action="home.php" method="post">
            <label for="content">Enter Text:</label>
            <textarea id="content" name="content" rows="4" cols="50" required></textarea>
            <button type="submit">Add Text</button>
        </form>
        <div class="buttons">
    <button onclick="window.location.href='preview.php'" class="button">Preview Text</button>
</div>
<div class="buttons">
    <button onclick="window.location.href='home.html'" class="button">Back to Home</button>
</div>

    </div>
</body>
</html>
