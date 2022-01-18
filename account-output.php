<html>
    <head>
        <meta charset="utf-8">
        <title>Create a new account</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <h1>Create a new account</h1>
        <?php
        // Avatar
        if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
            if (!file_exists('avatar')) {
                mkdir('avatar');
            }
            $file='avatar/'.basename($_FILES['avatar']['tmp_name']);
            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $file)) {
                echo 'Uploaded your avatar';
            } else {
                echo 'Could not upload your avatar<br>';
            }
        } else {
            echo 'Your avatar was not recognized as an uploaded file<br>';
            switch ($_FILES['avatar']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_INI_SIZE:
                    echo 'File you upload is too large (larger than digit of upload_max_filesize directive)';
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo 'File you upload is too large (larger than digit of MAX_FILE_SIZE';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo 'Internet connection error';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo 'No files found';
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    echo 'No temporary file found';
                    break;
                default:
                    echo 'Unknown error';
                    break;
            }
        }
        // Save username and password to SQL database
        // Connect to PDO
        session_start();
        $pdo = new PDO('mysql:host=localhost;dbname=sqlbillboard;charset=utf8;', 'admin', 'password');
        $sql = $pdo->prepare('insert into userdata values(?, ?, ?)');
        if ($sql -> execute([$_REQUEST['username'], $_REQUEST['password'], $file])) {
            foreach ($sql as $row) {
                $_SESSION['userdata'] = [
                    'username' => $row['username'],
                    'password' => $row['password'],
                    'avatar' => $row ['avatar']
                ];
            }
        } else {
            echo 'Could not add your information to SQL database<br>';
        }
        ?>
        <a href="./home.php">Back to Home</a>
    </body>
</html>