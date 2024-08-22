<?php
/* ficher que ens serveix per tancar la sessió */
    session_unset();

    session_destroy();

    header("location: index.php?accio=login")
?>