<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schoolar - Sign up</title>
    <link rel= "icon" type="image/png" href="icon\batpepe.png">
</head>
<body>
    <center><h1>Register form</h1></center>
    <form name = "register-form" action="signup.php" method="post">
    <table border="0" align="center">
        <tr><td><input type="text" name="f_name"
            placeholder="Your firstname" required></td></tr>

        <tr><td><input type="text" name="l_name"
            placeholder="Your lastname" required></td></tr>

        <tr><td><input type="text" name="mail"
            placeholder="example@email.com" required></td></tr>

        <tr><td><input type="password" name="pass"
            placeholder="**********"required></td></tr>

        <tr><td><input type="file" name="photo" required></td></tr>

        <tr><td align="center"><button>Register</button></td></tr>
    </table>
</body>
</html>

<?php

    include('../../config/database.php');

    $fname      = $_POST['f_name'];
    $lname      = $_POST['l_name'];
    $email      = $_POST['mail'];
    $passwd    = $_POST['pass'];

    //$enc_pass=sha1($passwd);
    $enc_pass=$passwd;

    $sql_mail_validation = "
    SELECT
        COUNT(email) as total
    FROM
        users
        WHERE email = '$email'
        LIMIT 1
    ";

    $res = pg_query($conn, $sql_mail_validation);

    if ($res){
        $row = pg_fetch_assoc($res);
        if($row['total'] > 0){
            
            echo " Cyka blyat! ya tienes una cuenta con ese correo";
            header('refresh:0;
            url=http://localhost/schoolar2/src/login.html');
        }else{
            $sql = "INSERT INTO users (firstname, lastname, email, password)
                VALUES('$fname','$lname','$email','$enc_pass')
            ";

            $res = pg_query($conn, $sql);

            if ($res){
                echo "<script>alert('User has been created. Go to login page')</script>";
                header('Refresh:0; url=http://localhost/schoolar2/src/login.html');
            }else{
            echo "Cyka blyat! un error";
            }
        }
    }
?>