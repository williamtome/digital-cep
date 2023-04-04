<?php

namespace WilliamTome\DigitalCep;

use WilliamTome\DigitalCep\WS\ViaCep;

class Search
{
    public function getAddressFromZipcode(string $zipCode): array
    {
        $zipCode = preg_replace('/[^0-9]/im', '', $zipCode);

        return (new ViaCep())->get($zipCode);
    }
}
