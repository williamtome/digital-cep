<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use WilliamTome\DigitalCep\Search;

class SearchTest extends TestCase
{
    private $search;

    public function setUp(): void
    {
        $this->search = new Search();
    }
    
    /**
     * @dataProvider addresses
     */
    public function testGetAddressFromZipcode(string $input, array $expected)
    {
        $result = $this->search->getAddressFromZipcode($input);

        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider zipcodes
     */
    public function testShouldReturnACleanZipcode(string $input, $expected)
    {
        $zipcodeCleaned = $this->search->clearZipcode($input);

        $this->assertEquals($expected, $zipcodeCleaned);
    }

    public static function zipcodes()
    {
        return [
            'CEP corretos' => [
                '92320-620',
                '92320620',
            ],
            'CEP incorretos' => [
                '93@415-5ab00%',
                '93415500',
            ],
        ];
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
