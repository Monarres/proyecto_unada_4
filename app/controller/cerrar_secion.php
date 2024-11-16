<?php
    session_start(); //permite trabajar con sesiones

    session_unset();//libera la secion actual

    session_destroy();//destruye las variables de secion

    acho json_encode([1,"Secion finalizada"]);



?>