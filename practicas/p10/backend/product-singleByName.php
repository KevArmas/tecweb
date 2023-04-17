<?php
    require_once 'API/Productos.php';

    $searchName = new Productos('marketzone');

    $searchName->search($_GET['search']);
    
    echo $searchID->getResponse();
?>