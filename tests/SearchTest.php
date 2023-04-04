<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use WilliamTome\DigitalCep\Search;

class SearchTest extends TestCase
{
    public function testGetAddressFromZipcode()
    {
        // Arrange
        $zipcode = "01001000";

        // Act
        $search = new Search;
        $result = $search->getAddressFromZipcode($zipcode);

        // Assert
        $this->assertEquals($this->address(), $result);
    }

    private function address()
    {
        return [
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
        ];
    }
}
