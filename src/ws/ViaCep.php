<?php

namespace Tigno\PhpA\ws;

class ViaCep
{
    private $urlViaCep = "https://viacep.com.br/ws/";

    /**
     * Undocumented function
     *
     * @param string $zipCode
     * @return array
     */
    public function get(string $zipCode): array
    {
        $get = \file_get_contents($this->urlViaCep . $zipCode . "/json");
        return (array) \json_decode($get);
    }
}
