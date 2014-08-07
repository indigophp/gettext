<?php

/*
 * This file is part of the Indigo Gettext package.
 *
 * (c) Indigo Development Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Indigo\Gettext\Generator;

use Indigo\Gettext\Extractor\ExtractorInterface;

/**
 * Generator class
 *
 * Generate files from extractors
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface GeneratorInterface
{
    /**
     * Adds an extractor
     *
     * @param ExtractorInterface $extractor
     */
    public function addExtractor(ExtractorInterface $extractor);

    /**
     * Returns extractors
     *
     * @return array
     */
    public function getExtractors();

    /**
     * Checks whether generator has extractors
     *
     * @return boolean
     */
    public function hasExtractors();

    /**
     * Resets extractors
     *
     * @return array Last known extractors
     */
    public function resetExtractors();

    /**
     * Main generator function
     *
     * @return boolean True on success
     */
    public function generate();
}
