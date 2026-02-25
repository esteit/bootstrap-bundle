<?php
/**
 * This file is part of BraincraftedBootstrapBundle.
 *
 * (c) 2012-2013 by Florian Eckerstorfer
 */

namespace Braincrafted\Bundle\BootstrapBundle\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * Замена deprecated фильтра spaceless (Twig 3.12+).
 * Удаляет пробельные символы между HTML-тегами.
 */
class HtmlSpacelessExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('customspaceless', [$this, 'customspaceless'], [
                'is_safe' => ['html'],
            ]),
        ];
    }

    public function customspaceless(string $content): string
    {
        return trim(preg_replace('/>\s+</', '><', $content));
    }
}
