<?php

    require_once "vendor/autoload.php";
    use Tigno\PhpA\Search;

    $busca = new Search;

    $resultado = $busca->getAddressFromZipcode('01001000');

    print_r($resultado);