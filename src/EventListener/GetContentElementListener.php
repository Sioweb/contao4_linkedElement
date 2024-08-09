<?php

declare(strict_types=1);

namespace Sioweb\LinkedElementBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\ContentElement;
use Contao\ContentModel;
use Contao\FrontendTemplate;

#[AsHook('getContentElement')]
class GetContentElementListener
{
    public function __invoke(ContentModel $contentModel, string $buffer, $element): string
    {
        if ($contentModel->linkedElement)
        {
            $template = new FrontendTemplate('ce_linkedElement');
            $template->setData($contentModel->row());
            $template->element = preg_replace('/<a([^>]*)>([^<]*)\<\/a>/is', '<span$1>$2</span>', $buffer);

            // @todo Use one regex: ( href="[^"]*"| target="[^"]*"| name="[^"]*"| rel="[^"]*")
            $template->element = preg_replace('/<span([^h]*)href[^=]*=[^"]*"[^"]*"([^>]*)>/is', '<span$1$2>', $template->element);
            $template->element = preg_replace('/<span([^h]*)name[^=]*=[^"]*"[^"]*"([^>]*)>/is', '<span$1$2>', $template->element);
            $template->element = preg_replace('/<span([^h]*)target[^=]*=[^"]*"[^"]*"([^>]*)>/is', '<span$1$2>', $template->element);
            $template->element = preg_replace('/<span([^h]*)rel[^=]*=[^"]*"[^"]*"([^>]*)>/is', '<span$1$2>', $template->element);

            $buffer = $template->parse();
        }

        return $buffer;
    }
}
