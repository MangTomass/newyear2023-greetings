<?php
session_start();

$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Guest';

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
            <p>Wishing you joy, peace, and prosperity in the coming year.</p>
            <p>From: <?php echo $name; ?></p>
        </div>
    </div>

    <div class="fireworks-container"></div>

    <script>
        const fireworksContainer = document.querySelector('.fireworks-container');
        const fireworks = new Fireworks.default(fireworksContainer);
        fireworks.start();
    </script>
</body>
</html>
