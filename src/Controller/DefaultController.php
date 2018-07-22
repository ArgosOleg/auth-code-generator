<?php

namespace App\Controller;

use App\Services\Code\Interfaces\CodeFactoryInterface;
use App\Services\Code\Interfaces\CodeServiceInterface;
use App\Services\Code\Interfaces\Exceptions\CantGenerateCodeServiceExceptionInterface;
use App\Services\Code\Interfaces\Exceptions\CantInvalidateCodeServiceExceptionInterface;
use App\Services\Code\Interfaces\Exceptions\CantSaveCodeServiceExceptionInterface;
use App\Services\Code\Interfaces\Exceptions\NotFoundCodeServiceExceptionInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{
    /**
     * @var CodeServiceInterface
     */
    private $codeService;
    /**
     * @var CodeFactoryInterface
     */
    private $codeFactory;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger, CodeServiceInterface $codeService, CodeFactoryInterface $codeFactory)
    {
        $this->codeService = $codeService;
        $this->codeFactory = $codeFactory;
        $this->logger = $logger;
    }

    /**
     * @Route('/generate', name="code_generate", methods={POST})
     */
    public function generate()
    {
        try {
            $code = $this->codeService->generate();
            $this->codeService->save($code);
        } catch (CantGenerateCodeServiceExceptionInterface|CantSaveCodeServiceExceptionInterface $e) {
            $this->logger->error($e->getMessage());
            throw new HttpException(500, 'Can\'t generate new code.', $e);
        }

        return new JsonResponse($code->getCode()->getValue());
    }

    /**
     * @Route('/check/{code}', name="code_check")
     */
    public function check($code)
    {
        try {

            $codeValue = $this->codeFactory->createCodeValue($code);
            $code = $this->codeService->get($codeValue);
        } catch (NotFoundCodeServiceExceptionInterface $e) {
            $this->logger->error($e->getMessage());
            throw new HttpException(404, 'Code not found.', $e);
        }

        return new JsonResponse(['isActive' => $code->isActive()]);
    }

    /**
     * @Route('invalidate/{code}', name="code_invalidate", methods={PATCH})
     */
    public function invalidate($code)
    {

        try {
            $codeValue = $this->codeFactory->createCodeValue($code);
            $this->codeService->invalidate($codeValue);
        } catch (NotFoundCodeServiceExceptionInterface $e) {
            $this->logger->error($e->getMessage());
            throw new HttpException(404, 'Code not found.', $e);
        } catch (CantInvalidateCodeServiceExceptionInterface $e) {
            $this->logger->error($e->getMessage());
            throw new HttpException(500, 'Cant invalidate code', $e);
        }
    }
}