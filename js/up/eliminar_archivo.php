<?php
if (isset($_POST['archivo'])) {
    $archivo = $_POST['archivo'];
    if (file_exists("../../negocio/$archivo")) {
        unlink("../../negocio/$archivo");
        echo 1;
    } else {
        echo 0;
    }
}
?>
