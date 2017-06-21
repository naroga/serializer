<?php

namespace Tests\Serializer;

use PHPUnit\Framework\TestCase;
use Serializer\Builder;
use Serializer\Metadata\Driver\ArrayDriver;
use Serializer\Serializer;
use Tests\Serializer\Fixture\Person;

class SerializerTest extends TestCase
{
    /**
     * @var Serializer
     */
    private $serializer;

    protected function setUp()
    {
        $builder = new Builder();

        $builder
            ->setMetadataDriver(new ArrayDriver(require __DIR__ . '/Resources/mapping.php'))
            ->setCacheDir(__DIR__ . '/cache');

        $this->serializer = $builder->build();
    }

    public function testSerializeSimpleObject()
    {
        $person = $this->createPerson();

        $json = $this->serializer->serialize($person, 'json');

        $this->assertEquals(json_encode([
            'id' => 1,
            'nome' => 'Tales',
            'married' => true
        ]), $json);
    }

    private function createPerson()
    {
        $person = new Person();
        $person->setId(1);
        $person->setName('Tales');
        $person->setMarried(true);

        return $person;
    }
}
