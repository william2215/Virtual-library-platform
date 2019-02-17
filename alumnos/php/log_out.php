<?php
//iniciar
    session_start();
//Vaciar los documentos de la sesison
    $SESSION = array();
//destruir la sesion para que no queden coockies guardadas de parte del servidor
    session_destroy();

header("Location: ../../index.html")

    


?>