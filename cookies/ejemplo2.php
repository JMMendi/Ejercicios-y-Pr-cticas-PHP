<?php
    // Verificamos si es la primera vez que se visita la página y si no, nos dirá la fecha de la última visita
    if(isset($_COOKIE['ultima_visita'])) {
        $ultima_vez = $_COOKIE['ultima_visita'];
        echo "Tu ultima visita fue: ".date('d-m-Y, H:i:s', $ultima_vez);
    } else {
        $ultima_vez = "Esta es tu primera vez en la página. Shame on you";
    }
    setcookie('ultima_visita', time(), time()+(365*24*60*60));
?>
