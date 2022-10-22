<?php

    namespace Tigno\PhpA;

    class Search{
        private $urlViaCep = "https://viacep.com.br/ws/";
        private $urlCepLa = "http://cep.la/";


        public function getAddressFromZipcodeViaCep(string $zipCode): array
        {
            $zipCode = \preg_replace('/[^0-9]/im', '', $zipCode); //->Tudo o que nao for numero vai ser removido

            $get = \file_get_contents($this->urlViaCep . $zipCode . "/json");

            return (array) json_decode($get);

        }

        public function getAddressFromZipcodeCepLa(string $zipCode): array
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