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

class Phar extends AbstractFormat
{
    /**
     * {@inheritdoc}
     */
    public static function getCompressionRatioLevel()
    {
        return FormatInterface::RATIO_LEVEL_MIDDLE;
    }

    /**
     * {@inheritdoc}
     */
    public static function getExtensions()
    {
        return ['phar'];
    }

    /**
     * {@inheritdoc}
     */
    public static function getUncompressionMethods()
    {
        return [
            Method\Extension\Phar::getName()
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
