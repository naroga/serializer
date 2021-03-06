<?php

namespace TSantos\Serializer;

/**
 * Class SerializationContext
 *
 * @package Serializer
 * @author Tales Santos <tales.augusto.santos@gmail.com>
 */
class SerializationContext
{
    private $groups = ['Default'];
    private $serializeNull = false;

    public static function create(): SerializationContext
    {
        return new self;
    }

    /**
     * @param array $groups
     * @return SerializationContext
     */
    public function setGroups(array $groups): SerializationContext
    {
        $this->groups = $groups;
        return $this;
    }

    public function getGroups(): array
    {
        return $this->groups;
    }

    public function setSerializeNull(bool $enabled)
    {
        $this->serializeNull = $enabled;
        return $this;
    }

    public function shouldSerializeNull(): bool
    {
        return $this->serializeNull;
    }
}
