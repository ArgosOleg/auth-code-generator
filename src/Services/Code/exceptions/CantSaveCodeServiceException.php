<?php

namespace App\Services\Code\exceptions;

use App\Services\Code\Interfaces\Exceptions\CantSaveCodeServiceExceptionInterface;

class CantSaveCodeServiceException extends CodeServiceException implements CantSaveCodeServiceExceptionInterface
{

}