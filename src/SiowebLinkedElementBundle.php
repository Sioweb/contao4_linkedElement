<?php

declare(strict_types=1);

namespace Sioweb\LinkedElementBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Configures the Contao LinkedElement bundle.
 *
 * @author Sascha Weidner <https://www.sioweb.de>
 */
class SiowebLinkedElementBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
