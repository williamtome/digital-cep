<?php

namespace WilliamTome\DigitalCep;

use WilliamTome\DigitalCep\WS\ViaCep;

class Search
{
    private ViaCep $viaCep;

    public function __construct()
    {
        $this->viaCep = new ViaCep();
    }

    public function getAddressFromZipcode(string $zipCode): array
    {
        $zipCode = $this->clearZipcode($zipCode);

        return $this->viaCep->get($zipCode);
    }

    public function clearZipcode(string $zipCode): ?string
    {
        return preg_replace(
            '/[^0-9]/im',
            '',
            $zipCode
        );
    }
}
