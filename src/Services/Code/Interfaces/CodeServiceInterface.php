<?php

namespace App\Services\Code\Interfaces;


interface CodeServiceInterface
{
    /**
     * MUST return new code entity with UNIQUE code value
     * @return CodeEntityInterface
     * @throws \App\Services\Code\Interfaces\Exceptions\CantGenerateCodeServiceExceptionInterface
     */
    public function generate(): CodeEntityInterface;

    /**
     * MUST return code entity by it code value otherwise MUST throw exception not found
     * @param CodeInterface $codeValue
     * @return CodeEntityInterface
     * @throws \App\Services\Code\Interfaces\Exceptions\NotFoundCodeServiceExceptionInterface
     */
    public function get(CodeInterface $codeValue): CodeEntityInterface;

    /**
     * MUST save entity or throw exception if something gone wrong while saving
     * @param CodeEntityInterface $codeEntity
     * @throws \App\Services\Code\Interfaces\Exceptions\CantSaveCodeServiceExceptionInterface
     */
    public function save(CodeEntityInterface $codeEntity): void;

    /**
     * MUST invalidate code or throw exception if something gone wrong while invalidating
     * @param CodeInterface $codeValue
     * @throws \App\Services\Code\Interfaces\Exceptions\CantInvalidateCodeServiceExceptionInterface
     * @throws \App\Services\Code\Interfaces\Exceptions\NotFoundCodeServiceExceptionInterface
     */
    public function invalidate(CodeInterface $codeValue): void;
}