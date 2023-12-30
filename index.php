<?php
session_start();

include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uniqueIdentifier = uniqid();

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $message = isset($_POST['customMessage']) ? $_POST['customMessage'] : '';

    $sql = "INSERT INTO user_details (uid, name, message) VALUES ('$uniqueIdentifier', '$name', '$message')";
    $result = $conn->query($sql);

    if ($result) {
        $generatedLink = 'https://newyear2024.jmbataller.site/index.php?uid=' . $uniqueIdentifier;

        $_SESSION['generatedLink'] = $generatedLink;

        header('Location: ' . $generatedLink);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$generatedLink = isset($_SESSION['generatedLink']) ? $_SESSION['generatedLink'] : null;

$userDetails = [];
if (isset($_GET['uid'])) {
    $uid = $conn->real_escape_string($_GET['uid']);
    $sql = "SELECT * FROM user_details WHERE uid = '$uid'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userDetails = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/fireworks-js@2.x/dist/index.umd.js"></script>
    <title>Happy New Year Greetings</title>
</head>
<body>
<div class="container">
    <div class="greeting-card">
        <h1>Happy New Year!</h1>

        <?php
        $message = !empty($userDetails['message']) ? $userDetails['message'] : 'Wishing you joy, peace, and prosperity in the coming year.';
        echo '<p>' . $message . '</p>';
        ?>

        <?php
        if (!empty($userDetails['name'])) {
            echo '<p>-from ' . $userDetails['name'] . '</p>';
        }
        ?>

        <hr>

        <form action="index.php" method="post">
            <label for="customMessage">Custom Message:</label>
            <textarea id="customMessage" name="customMessage" rows="4" cols="50"></textarea>


            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" required>

            <button type="submit">Generate Link</button>
        </form>

        <?php
        if (!empty($generatedLink)) {
            echo '<p>Share this link with your friends:</p>';
            echo '<p><a id="generatedLink" href="' . $generatedLink . '">' . $generatedLink . '</a></p>';
            echo '<button onclick="copyGeneratedLink()">Copy Link</button>';
        }
        ?>
    </div>
</div>

<div class="fireworks-container"></div>

<script>
    function copyGeneratedLink() {
        var generatedLink = document.getElementById('generatedLink');
        var tempInput = document.createElement('input');
        document.body.appendChild(tempInput);
        tempInput.value = generatedLink.href;
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        alert('Link copied to clipboard!');
    }

    const fireworksContainer = document.querySelector('.fireworks-container');
    const fireworks = new Fireworks.default(fireworksContainer);
    fireworks.start();
</script>
</body>
</html>
