<?php
session_start();
session_destroy(); // Para poder destruir todas las sesiones, necesitamos crearlas aquí también.
header("Location:login.php");