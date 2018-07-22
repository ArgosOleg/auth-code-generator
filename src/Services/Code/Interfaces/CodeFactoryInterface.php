<?php

namespace App\Services\Code\Interfaces;

interface CodeFactoryInterface
{
    /**
     * MUST return new code entity with UNIQUE code value
     * @return CodeEntityInterface
     */
    public function create(): CodeEntityInterface;
}