<?php

namespace App\Services\Code\exceptions;


use App\Services\Code\Interfaces\Exceptions\NotFoundCodeServiceExceptionInterface;

class NotFoundCodeServiceException extends CodeServiceException implements NotFoundCodeServiceExceptionInterface
{

}