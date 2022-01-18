<html>
    <head>
        <meta charset="utf-8">
        <title>Log Out</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <?php
        session_start();
        unset($_SESSION['user']);
        if (!isset($_SESSION['user'])) {
            echo 'You have been logged out';
        } else {
            echo "You've already logged out";
        }
        ?>
        <a href="./home.php">Back to Home</a>
    </body>
</html>