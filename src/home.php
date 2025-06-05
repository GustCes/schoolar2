<?php
    session_start();

    if(!isset($_SESSION['user_id'])){
        header('Refresh:0; url=http://localhost/schoolar2/src/signin.html');
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Schoolar2 - Home</title>
        <link rel= "icon" type="image/png" href="icon\batpepe.png">
    </head>
    <body>
        <a href = "backend/logout.php">Logout</a>;
    </body>
</html>