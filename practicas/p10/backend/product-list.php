<?php
    require_once 'API/Productos.php';

    $newproduct = new Productos('marketzone');

    $newproduct->list();
    
    echo $newproduct->getResponse();
?>