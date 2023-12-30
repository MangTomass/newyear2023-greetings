<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy New Year Greetings</title>
</head>
<body>
    <?php
    $name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Guest';

    echo "<div class='container'>
            <div class='greeting-card'>
                <h1>Happy New Year!</h1>
                <p>Wishing you joy, peace, and prosperity in the coming year.</p>
                <p>From: $name</p>
            </div>
          </div>";
    ?>
</body>
</html>
