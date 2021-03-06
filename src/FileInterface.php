<?php

/*
 * This file is part of the Distill package.
 *
 * (c) Raul Fraile <raulfraile@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Distill;

use Distill\Format\FormatInterface;

interface FileInterface
{
    /**
     * Converts a file object into an string.
     *
     * @return string
     */
    public function __toString();

    /**
     * Sets the file path.
     * @param string $path File path
     *
     * @return FileInterface
     */
    public function setPath($path);

    /**
     * Gets the file path.
     *
     * @return string File path.
     */
    public function getPath();

    /**
     * Sets the file format.
     * @param FormatInterface $format File format
     *
     * @return FileInterface
     */
    public function setFormat(FormatInterface $format);

    /**
     * Gets the file format.
     *
     * @return FormatInterface File format
     */
    public function getFormat();
}
