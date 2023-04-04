<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use WilliamTome\DigitalCep\Search;

class SearchTest extends TestCase
{
    /**
     * @dataProvider addresses
     */
    public function testGetAddressFromZipcode(string $input, array $expected)
    {
        // Act
        $search = new Search;
        $result = $search->getAddressFromZipcode($input);

        // Assert
        $this->assertEquals($expected, $result);
    }

    public function addresses()
    {
        return [
            'Endereço Praça da Sé' => [
                '01001000', 
                [
                    'cep' => "01001-000",
                    "logradouro" => "Praça da Sé",
                    "complemento" => "lado ímpar",
                    "bairro" => "Sé",
                    "localidade" => "São Paulo",
                    "uf" => "SP",
                    "ibge" => "3550308",
                    "gia" => "1004",
                    "ddd" => "11",
                    "siafi" => "7107",
                ],
            ],
            'Endereço Qualquer' => [
                '43325534', 
                [
                    'cep' => "43325-534",
                    "logradouro" => "Praça da Sé",
                    "complemento" => "lado ímpar",
                    "bairro" => "Sé",
                    "localidade" => "São Paulo",
                    "uf" => "SP",
                    "ibge" => "3550308",
                    "gia" => "1004",
                    "ddd" => "11",
                    "siafi" => "7107",
                ],
            ],
        ];
    }
}
