<?php

namespace App\Services\Code\exceptions;


use App\Services\Code\Interfaces\Exceptions\CantGenerateCodeServiceExceptionInterface;

class CantGenerateCodeServiceException extends CodeServiceException implements CantGenerateCodeServiceExceptionInterface
{

}