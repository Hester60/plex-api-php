<?php

namespace Hester60\PlexApiPhp\Deserializer;

use Hester60\PlexApiPhp\Exceptions\DeserializeException;

interface DeserializerInterface
{
    /**
     * Deserialize the given data using the provided callback function.
     *
     * This method takes the data and a callback function that will be used to handle
     * the deserialization of the data. The callback function should define how the data
     * should be processed and converted into the desired format.
     *
     * @param mixed $data The data to be deserialized.
     * @param callable $deserializeFunction The function that will handle the deserialization process.
     *
     * @return mixed The deserialized data, returned from the callback function.
     *
     * @throws DeserializeException If an error occurs during deserialization.
     */
    public static function deserialize(mixed $data, callable $deserializeFunction): mixed;
}
