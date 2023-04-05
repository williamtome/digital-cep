<?php

namespace WilliamTome\DigitalCep\WS;

class ViaCep
{
    public const URL = "https://viacep.com.br/ws/";

    public function get(string $zipCode): array
    {
        $url = self::URL . $zipCode . "/json";
        $data = file_get_contents($url);

        return (array) json_decode($data);
    }
}
