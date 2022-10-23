<?php

namespace Tigno\PhpA\ws;

class CepLa
{
    private $urlCepLa = "http://cep.la/";
/**
 * Undocumented function
 *
 * @param string $zipCode
 * @return array
 */
    public function get(string $zipCode): array
    {

        $opts = [
            "http" => [
                "method" => "GET",
                "header" => "Accept: application/json"
            ]
        ];
        $context = \stream_context_create($opts);
        $get = \file_get_contents($this->urlCepLa . $zipCode, false, $context);
        return (array) json_decode($get);
    }
}
