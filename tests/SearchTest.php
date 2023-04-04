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

    public static function addresses()
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
                '92320620', 
                [
                    'cep' => "92320-620",
                    "logradouro" => "Rua Clóvis Beviláqua",
                    "complemento" => "",
                    "bairro" => "Harmonia",
                    "localidade" => "Canoas",
                    "uf" => "RS",
                    "ibge" => "4304606",
                    "gia" => "",
                    "ddd" => "51",
                    "siafi" => "8589",
                ],
            ],
        ];
    }
}
