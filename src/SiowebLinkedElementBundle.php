<?php

declare(strict_types=1);

namespace Sioweb\LinkedElementBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SiowebLinkedElementBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
