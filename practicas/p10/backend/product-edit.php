<?php
    require_once 'API/Productos.php';

    $edit = new Productos('marketzone');

    $edit->edit(json_decode(json_encode($_POST)));
    
    echo $edit->getResponse();
?>