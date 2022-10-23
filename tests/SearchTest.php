<?php

use PHPUnit\Framework\TestCase;
use Tigno\PhpA\Search;


class SearchTest extends TestCase
{
    /**
     * Dados de teste Via Cep
     *
     * @dataProvider dadosTeste
     */
    public function testGetAddressFromZipcodeViaCepDefaultUsage(string $input, array $esperado)
    {
        $resultado = new Search;
        $resultado = $resultado->getAddressFromZipcodeViaCep($input);

        // $esperado = [
        //     "cep" => "01001-000",
        //     "logradouro"=> "Praça da Sé",
        //     "complemento"=> "lado ímpar",
        //     "bairro"=> "Sé",
        //     "localidade"=> "São Paulo",
        //     "uf"=> "SP",
        //     "ibge"=> "3550308",
        //     "gia"=> "1004",
        //     "ddd"=> "11",
        //     "siafi"=> "7107"
        // ];

        $this->assertEquals($esperado, $resultado);
    }

    public function dadosTeste()
    {
        return [
            "Endereço Praça da Sé" => [
                "01001000",
                [
                    "cep" => "01001-000",
                    "logradouro"=> "Praça da Sé",
                    "complemento"=> "lado ímpar",
                    "bairro"=> "Sé",
                    "localidade"=> "São Paulo",
                    "uf"=> "SP",
                    "ibge"=> "3550308",
                    "gia"=> "1004",
                    "ddd"=> "11",
                    "siafi"=> "7107"
                ]
            ],
            "Endereço Realengo" => [
                "21765020",
                [
                    "cep" => "21765-020",
                    "logradouro"=> "Rua Dona Olímpia",
                    "complemento"=> "",
                    "bairro"=> "Realengo",
                    "localidade"=> "Rio de Janeiro",
                    "uf"=> "RJ",
                    "ibge"=> "3304557",
                    "gia"=> "",
                    "ddd"=> "21",
                    "siafi"=> "6001"
                ]
            ]
        ];
    }

    /**
     * Dados de teste Via Cep
     *
     * @dataProvider dadosTesteCepLa
     */
    public function testGetAddressFromZipcodeLaCepDefaultUsage(string $input, array $esperado)
    {
        $resultado = new Search;
        $resultado = $resultado->getAddressFromZipcodeCepLa($input);

        // $esperado = [
        //     "cep" => "01001-000",
        //     "logradouro"=> "Praça da Sé",
        //     "complemento"=> "lado ímpar",
        //     "bairro"=> "Sé",
        //     "localidade"=> "São Paulo",
        //     "uf"=> "SP",
        //     "ibge"=> "3550308",
        //     "gia"=> "1004",
        //     "ddd"=> "11",
        //     "siafi"=> "7107"
        // ];

        $this->assertEquals($esperado, $resultado);
    }

    public function dadosTesteCepLa()
    {
        return [
            "Endereço Praça da Sé" => [
                "01001000",
                [
                    "cep" => "01001000",
                    "uf" => "SP",
                    "cidade" => "São Paulo",
                    "bairro" => "Sé",
                    "logradouro" => "Praça da Sé - lado ímpar"
                ]
            ],
            "Endereço Realengo" => [
                "21765020",
                [
                    "cep" => "21765020",
                    "uf" => "RJ",
                    "cidade" => "Rio de Janeiro",
                    "bairro" => "Realengo",
                    "logradouro" => "Rua Dona Olímpia"
                ]
            ]
        ];
    }
    
}