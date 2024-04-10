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

// Retrieve data from database
$sql = "SELECT * FROM paragraphs";
$result = mysqli_query($conn, $sql);

$paragraphs = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $paragraphs[] = $row['content'];
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Text</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <h1>Preview Text</h1>
        <div class="preview">
            <?php foreach ($paragraphs as $paragraph) { ?>
                <p><?php echo $paragraph; ?></p>
            <?php } ?>
        </div>
        <div class="buttons">
    <button onclick="window.location.href='home.php'" class="button">Add More Text</button>
</div>

    </div>
</body>
</html>
