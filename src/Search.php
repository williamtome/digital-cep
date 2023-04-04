<?php

namespace WilliamTome\DigitalCep;

class Search {
    public const URL = "https://viacep.com.br/ws/";

    public function getAddressFromZipcode(string $zipCode): array
    {
        $zipCode = preg_replace('/[^0-9]/im', '', $zipCode);

        $get = file_get_contents(self::URL . $zipCode . "/json");

        return (array) json_decode($get);
    }
}
