<?php

    namespace Tigno\PhpA;

    class Search{
        private $url = "https://viacep.com.br/ws/";

        public function getAddressFromZipcode(string $zipCode): array
        {
            $zipCode = \preg_replace('/[^0-9]/im', '', $zipCode); //->Tudo o que nao for numero vai ser removido

            $get = \file_get_contents($this->url . $zipCode . "/json");

            return (array) json_decode($get);

        }

    }