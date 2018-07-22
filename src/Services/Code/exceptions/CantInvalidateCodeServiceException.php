<?php

namespace App\Services\Code\exceptions;


use App\Services\Code\Interfaces\Exceptions\CantInvalidateCodeServiceExceptionInterface;

class CantInvalidateCodeServiceException extends CodeServiceException implements CantInvalidateCodeServiceExceptionInterface
{

}