<?php

/*
 * This file is part of the Distill package.
 *
 * (c) Raul Fraile <raulfraile@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Distill\Format;

use Distill\Method;

class TarBz2 extends AbstractFormat
{
    /**
     * {@inheritdoc}
     */
    public static function getCompressionRatioLevel()
    {
        return FormatInterface::RATIO_LEVEL_HIGH;
    }

    /**
     * {@inheritdoc}
     */
    public static function getExtensions()
    {
        return ['tar.bz2', 'tar.bz', 'tbz2', 'tbz', 'tb2'];
    }

    /**
     * {@inheritdoc}
     */
    public static function getUncompressionMethods()
    {
        return [
            Method\Command\GnuTar::getName(),
            Method\Command\x7zip::getName(),
            Method\Extension\PharData::getName(),
            Method\Extension\Pear\ArchiveTar::getName()
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function getClass()
    {
        return get_class();
    }
}
