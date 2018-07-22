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
     * MUST say is code expired
     * @return bool true if code expired for now, otherwise false (if code not expired)
     */
    public function isExpired(): bool;

    /**
     * MUST set code inactive even if it not expired yet
     * @return bool true on success, otherwise false
     */
    public function invalidate(): bool;

    /**
     * MUST say is code active for now, decision should depend on two factors:
     * - is expired
     * - is invalidated
     * @return bool true if code , otherwise false
     */
    public function isActive();
}