<?php
    session_Start();
    session_destroy();

    header('Refresh:0; url=http://localhost/schoolar2/src/signin.html');
?>