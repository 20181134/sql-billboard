<html>
    <head>
        <meta charset="utf-8">
        <title>Log In</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <!-- header links start here -->
        <div class="links">
            <a href="home.php"><img src=""><!-- insert logo --></a>
            <a href="./home.php">Home</a>
            <a href="./profile.php">Profile</a>
            <a href="./setting.php">Setting</a>
            <div class="login">
                <?php
                session_start();
                if (isset($_SESSION['user'])) {
                    echo '<a href="logout.php">Logging in as ', $_SESSION['user']['username'], '</a>';
                } else {
                    echo '<a href="login.php">Log In</a>';
                }
                ?>
            </div>
        </div>
        <!-- header links end here -->
        <?php
        if (isset($_SESSION['user'])) {
            header('Location:./logout.php');
            exit;
        } else {
            echo '<form action="login-output.php" method="post">';
            echo 'Username: <input type="text" name="username"><br>';
            echo 'Password: <input type="password" name="password"><br>';
            echo '<input type="submit" value="Log In">';
            echo '</form>';
        }
        ?>
    </body>
</html>