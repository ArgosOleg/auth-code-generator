<?php

namespace App\Services\Code\Interfaces;


interface CodeServiceInterface
{
    /**
     * MUST return new code entity with UNIQUE code value
     * @return CodeEntityInterface
     */
    public function generate(): CodeEntityInterface;

    /**
     * MUST return code entity by it code value otherwise MUST throw exception not found
     * @param CodeInterface $code
     * @return CodeEntityInterface
     * @throws \App\Services\Code\Interfaces\Exceptions\NotFoundCodeServiceExceptionInterface
     */
    public function get(CodeInterface $code): CodeEntityInterface;

    /**
     * MUST save entity or throw exception if something gone wrong while saving
     * @param CodeEntityInterface $codeEntity
     * @throws \App\Services\Code\Interfaces\Exceptions\CantSaveCodeServiceException
     */
    public function save(CodeEntityInterface $codeEntity): void;
}