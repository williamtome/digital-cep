<?php

namespace WilliamTome\DigitalCep\WS;

class ViaCep
{
    public const URL = "https://viacep.com.br/ws/";

    public function get(string $zipCode): array
    {
        $data = file_get_contents(self::URL . $zipCode . "/json");

        return (array) json_decode($data);
    }
}
