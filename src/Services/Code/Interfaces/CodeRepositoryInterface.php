<?php

namespace App\Services\Code\Interfaces;


interface CodeRepositoryInterface
{
    /**
     * MUST save information for received code
     * @param CodeEntityInterface $code
     * @return bool; return true on success, otherwise
     */
    public function save(CodeEntityInterface $code): bool;

    /**
     * MUST return found entity
     * @param CodeInterface $code
     * @return CodeEntityInterface|null return entity if found otherwise return null
     */
    public function get(CodeInterface $code): ?CodeEntityInterface;
}