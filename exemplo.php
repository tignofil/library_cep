<?php

    require_once "vendor/autoload.php";
    use Tigno\PhpA\Search;

    $busca = new Search;

    $resultado = $busca->getAddressFromZipcodeCepLa('21765020');

    print_r($resultado);