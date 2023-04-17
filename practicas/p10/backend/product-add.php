<?php
    require_once 'API/Productos.php';

    $add = new Productos('marketzone');

    $add->add(json_decode(json_encode($_POST)));
    
    echo $add->getResponse();
?>