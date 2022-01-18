<html>
    <head>
        <meta charset="utf-8">
        <title>Log In</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <?php
        session_start();
        unset($_SESSION['user']);
        $pdo = new PDO('mysql:host=localhost;dbname=sqlbillboard;charset=utf8;', 'admin', 'password');
        $sql = $pdo->prepare('SELECT * FROM userdata where username=? and password=?');
        if ($sql->execute([$_REQUEST['username'], $_REQUEST['password']])) {
            foreach ($sql as $row) {
                $_SESSION['user']=[
                    'username'=>$row['username'],
                    'password'=>$row['password'],
                    'avatar'=>$row['avatar']
                ];
            }
        }
        if (isset($_SESSION['user'])) {
            echo 'Logged in as ', $_SESSION['user']['username'], '<br>';
        } else {
            echo 'Username or password is wrong<br>';
        }
        ?>
        <a href="./home.php">Back to Home</a>
    </body>
</html>