<?php

namespace App\Services\Code;

use App\Services\Code\exceptions\CantGenerateCodeServiceException;
use App\Services\Code\exceptions\CantInvalidateCodeServiceException;
use App\Services\Code\exceptions\CantSaveCodeServiceException;
use App\Services\Code\exceptions\NotFoundCodeServiceException;
use App\Services\Code\Interfaces\CodeEntityInterface;
use App\Services\Code\Interfaces\CodeFactoryInterface;
use App\Services\Code\Interfaces\CodeInterface;
use App\Services\Code\Interfaces\CodeRepositoryInterface;
use App\Services\Code\Interfaces\CodeServiceInterface;

class CodeService implements CodeServiceInterface
{
    /**
     * @var CodeFactoryInterface
     */
    private $codeFactory;
    /**
     * @var CodeRepositoryInterface
     */
    private $codeRepository;

    public function __construct(CodeFactoryInterface $codeFactory, CodeRepositoryInterface $codeRepository)
    {
        $this->codeFactory = $codeFactory;
        $this->codeRepository = $codeRepository;
    }

    /**
     * @inheritdoc
     */
    public function generate(): CodeEntityInterface
    {
        try {
            return $this->codeFactory->createEntity();
        } catch (\Exception $e) {
            throw new CantGenerateCodeServiceException('Cant generate new code', 0, $e);
        }
    }

    /**
     * @inheritdoc
     */
    public function get(CodeInterface $codeValue): CodeEntityInterface
    {
        $codeEntity = $this->codeRepository->get($codeValue);
        if (!$codeEntity) {
            throw new NotFoundCodeServiceException(sprintf('Code Entity not found, code value: %s', $codeEntity->getCode()->getValue()));
        }
        return $codeEntity;
    }

    /**
     * @inheritdoc
     */
    public function save(CodeEntityInterface $codeEntity): void
    {
        if (!$this->codeRepository->save($codeEntity)) {
            throw new CantSaveCodeServiceException(sprintf('Cant save code entity, code value: %s', $codeEntity->getCode()->getValue()));
        }
    }

    /**
     * @inheritdoc
     */
    public function invalidate(CodeInterface $codeValue): void
    {
        $codeEntity = $this->get($codeValue);

        if (!$codeEntity->invalidate()) {
            throw new CantInvalidateCodeServiceException(sprintf('Cant invalidate code entity, code value: %s', $codeEntity->getCode()->getValue()));
        }
    }
}