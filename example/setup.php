<?php

require __DIR__ . '/../vendor/autoload.php';

use TSantos\Serializer\Metadata\Driver\ArrayDriver;
use TSantos\Serializer\SerializerBuilder;

$builder = new SerializerBuilder();

$serializer = $builder
    ->setMetadataDriver(new ArrayDriver(require __DIR__ . '/../tests/Resources/mapping.php'))
    ->setCacheDir(__DIR__ . '/../tests/cache')
    ->setDebug(true)
    ->build();

return $serializer;
