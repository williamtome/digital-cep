<?php

require_once "vendor/autoload.php";

use WilliamTome\DigitalCep\Search;

$busca = new Search;

$resultado = $busca->getAddressFromZipcode("92320620");

print_r($resultado);