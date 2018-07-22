<?php

namespace App\Services\Code\Interfaces;

interface CodeInterface
{
    /**
     * MUST return code value
     * @return mixed
     */
    public function getValue();
}