<?php

namespace App\Services\Code\Interfaces;

interface CodeFactoryInterface
{
    /**
     * MUST return new code entity with UNIQUE code value
     * @return CodeEntityInterface
     */
    public function createEntity(): CodeEntityInterface;

    /**
     * MUST return code value object based on raw value
     * @param mixed $value
     * @return CodeInterface
     */
    public function createCodeValue($value): CodeInterface;
}