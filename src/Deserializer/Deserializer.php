<?php

namespace Hester60\PlexApiPhp\Deserializer;

class Deserializer implements DeserializerInterface
{
    public static function deserialize(mixed $data, callable $deserializeFunction): mixed
    {
        return $deserializeFunction($data);
    }
}
