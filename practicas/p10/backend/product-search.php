<?php
    require_once 'API/Productos.php';

    $search = new Productos('marketzone');

    $search->search($_GET['search']);
    
    echo $search->getResponse();
?>