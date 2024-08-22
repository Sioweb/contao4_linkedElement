<?php

declare(strict_types=1);

namespace Sioweb\LinkedElementBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Sioweb\LinkedElementBundle\SiowebLinkedElementBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(SiowebLinkedElementBundle::class)
                ->setReplace(['sioweblinkedelement'])
                ->setLoadAfter([ContaoCoreBundle::class])
        ];
    }
}
