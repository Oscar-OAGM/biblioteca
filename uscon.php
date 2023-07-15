<?php
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];


    if ($usuario=="lcp" and $contra=="123") {
        echo '<script lenguage="javascript">';
        echo 'alert ("Usuario y contraseña correcta")
        window.location="menu.php";
        </script>';
    } else {
        echo '<script lenguage="javascript">';
        echo 'alert ("Usuario o contraseña incorrecta")
        window.location="index.html";
        </script>';
    }

?>