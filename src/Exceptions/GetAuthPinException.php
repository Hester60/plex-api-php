<?php

namespace Hester60\PlexApiPhp\Exceptions;

use Exception;
use Throwable;

final class GetAuthPinException extends Exception implements PlexApiExceptionInterface
{
    /**
     * @param int $errorCode
     * @param string|null $message
     * @param Throwable|null $previous
     */
    public function __construct(protected int $errorCode, protected $message = null, Throwable $previous = null)
    {
        if (empty($message)) {
            $message = "An error occurred while fetching the authentication PIN.";
        }

        parent::__construct($message, $this->errorCode, $previous);
    }
}
