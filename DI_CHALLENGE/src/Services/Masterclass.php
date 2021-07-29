<?php

namespace App\Services;

use App\Services\Capitalizer;
use App\Services\Logger;
use App\Services\Dasher;
use App\Services\Transform;


class Masterclass
{
    private Transform $transformer;
    private Logger $logger;

    /**
     * Masterclass constructor.
     */
    public function __construct(Transform $transformer,
                                Logger $logger)
    {
        $this->transformer = $transformer;
        $this->logger = $logger;
    }

    public function ChangeAndLog($message)
    {
        $this->logger->log($this->transformer->transform($message));
        return $this->transformer->transform($message);
    }
}