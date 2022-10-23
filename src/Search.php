<?php

namespace Tigno\PhpA;

use Tigno\PhpA\ws\CepLa;
use Tigno\PhpA\ws\ViaCep;

class Search
{
    /**
     * Undocumented function
     *
     * @param string $zipCode
     * @return array
     */
    public function getAddressFromZipcodeViaCep(string $zipCode): array
    {
        $zipCode = \preg_replace('/[^0-9]/im', '', $zipCode); //Tudo o que nao for numero vai ser removido
        return $this->getFromServerViaCep($zipCode);
    }

    /**
     * Undocumented function
     *
     * @param string $zipCode
     * @return array
     */
    private function getFromServerViaCep(string $zipCode): array
    {
        $get = new ViaCep();

        return $get->get($zipCode);
    }
    /**
     * Undocumented function
     *
     * @param string $zipCode
     * @return array
     */
    public function getAddressFromZipcodeCepLa(string $zipCode): array
    {
        return $this->getFromServerCepLa($zipCode);
    }

    /**
     * Undocumented function
     *
     * @param string $zipCode
     * @return array
     */
    private function getFromServerCepLa(string $zipCode): array
    {
        $get = new CepLa();

        return $get->get($zipCode);
    }
}
