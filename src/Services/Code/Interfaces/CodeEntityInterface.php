<?php

namespace App\Services\Code\Interfaces;


interface CodeEntityInterface
{
    /**
     * MUST return code value object
     * @return mixed
     */
    public function getCode(): CodeInterface;

    /**
     * MUST return time when code was created
     * @return mixed
     */
    public function getCreationTime();

    /**
     * MUST return time when code
     * @return mixed
     */
    public function getExpirationTime();

    /**
     * MUST say is code valid for now
     * @return mixed
     */
    public function isExpired();
}