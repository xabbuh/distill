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

/**
 * A BZIP2 file.
 *
 * A .bz2 stream consists of a 4-byte header, followed by zero or more compressed blocks,
 * immediately followed by an end-of-stream marker containing a 32-bit CRC for the plaintext
 * whole stream processed. The compressed blocks are bit-aligned and no padding occurs.
 *
 * @see https://en.wikipedia.org/wiki/Bzip2
 *
 * @author Raul Fraile <raulfraile@gmail.com>
 */
class Bz2 extends AbstractFormat
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
        return ['bz2', 'bz'];
    }

    /**
     * {@inheritdoc}
     */
    public static function getClass()
    {
        return get_class();
    }
}
