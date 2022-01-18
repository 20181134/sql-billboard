<html>
    <head>
        <meta charset="utf-8">
        <title>Create a new account</title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <h1>Create a new account</h1>
        <form action="account-output.php" method="post" enctype="multipart/form-data">
            Username: <input type="text" name="username"><br>
            Password: <input type="text" name="password"><br>
            Avatar: <input type="file" name="avatar"><br>
            <input type="submit" value="Create">
        </form>
        <p>Avatar must be .jpg file or .png file, or others which can open with .jpg extension</p>
    </body>
</html> 