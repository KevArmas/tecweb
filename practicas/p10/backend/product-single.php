<?php
    require_once 'API/Productos.php';

    $searchID = new Productos('marketzone');

    $searchID->search($_GET['search']);
    
    echo $searchID->getResponse();
?>