<?php
    require_once 'API/Productos.php';

    $delete = new Productos('marketzone');

    $delete->delete($_POST['id']);
    
    echo $delete->getResponse();
?>