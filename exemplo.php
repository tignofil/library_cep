<?php

    require_once "vendor/autoload.php";
    use Tigno\PhpA\Search;

    $busca = new Search;

    $resultado = $busca->getAddressFromZipcodeViaCep('01001000');

    print_r($resultado);