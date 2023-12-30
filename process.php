<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $_SESSION['name'] = $_POST['name'];

            $uniqueIdentifier = generateUniqueIdentifier();

            $_SESSION['userDetails'][$uniqueIdentifier] = [
                'name' => $_POST['name'],
                'message' => isset($_POST['customMessage']) ? $_POST['customMessage'] : '',
            ];

            $generatedLink = 'https://newyear2024.jmbataller.site/index.php?uid=' . $uniqueIdentifier;

            $_SESSION['generatedLink'] = $generatedLink;

            header('Location: index.php');
            exit();
        }
    }

    header('Location: index.php');
    exit();

    function generateUniqueIdentifier($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
?>
