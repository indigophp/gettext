<?php

/*
 * This file is part of the Indigo Gettext package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Gettext\Extractor;

/**
 * Array Extractor
 *
 * Extract strings from an input array
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class ArrayExtractor implements ExtractorInterface
{
    /**
     * String array
     *
     * @var array
     */
    protected $array = array();

    /**
     * Creates a new ArrayExtractor
     *
     * @param array $array
     */
    public function __construct(array $array)
    {
        $this->array = $array;
    }

    /**
     * Returns the array
     *
     * @return array
     */
    public function getArray()
    {
        return $this->array;
    }

    /**
     * Sets the array
     *
     * @param array $array
     *
     * @return this
     */
    public function setArray(array $array)
    {
        $this->array = $array;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function extract()
    {
        return $this->array;
    }
}
