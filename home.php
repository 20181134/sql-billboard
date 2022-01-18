<html>
    <head>
        <meta charset="utf-8">
        <title>SQL-billboard</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
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
        <br>
        <div class="timeline">
            <?php
            // form
            echo '<div class="form">';
            if (isset($_SESSION['user'])) {
                echo '<form action="" method="post">';
                echo "<h2>What's happening?</h2>";
                echo '<textarea name="contents"></textarea><br>';
                echo '<input type="submit" value="Post">';
                echo '</form>';
            } else {
                echo '<a href="./createaccount.php">Sign Up</a> or <a href="./login.php">Log In</a> to post tweets now!';
            }
            echo '</div>';
            // contents
            $pdo = new PDO('mysql:host=localhost;dbname=sqlbillboard;charset=utf8', 'admin', 'password');
            $sql = $pdo -> prepare('insert into contents values(?, ?, ?)');
            if (strlen($_REQUEST['contents'])) {
                $sql -> execute([$_SESSION['user']['username'], $_SESSION['user']['avatar'], $_REQUEST['contents']]);
            }
            foreach ($pdo->query('SELECT * FROM contents') as $row) {
                echo '<p><div class="tweets">';
                echo '<img class="icons" src="./', $row['avatar'], '.jpg">';
                echo '<div class="tweet"><span class="uploader">', $row['uploader'], '</span>';
                echo ' ', $row['tweets'], '</p></div></div>';
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                header('Location:./home.php');
                exit;
            }
            ?>
    </body>
</html>