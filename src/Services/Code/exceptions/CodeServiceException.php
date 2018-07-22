<?php

namespace App\Services\Code\exceptions;

use App\Services\Code\Interfaces\Exceptions\CodeServiceExceptionInterface;

abstract class CodeServiceException extends \Exception implements CodeServiceExceptionInterface
{

}