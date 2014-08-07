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
 * Abstract Generator
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
abstract class AbstractGenerator implements GeneratorInterface
{
    /**
     * Extractors array
     *
     * @var array
     */
    protected $extractors = array();

    /**
     * {@inheritdoc}
     */
    public function addExtractor(ExtractorInterface $extractor)
    {
        if (in_array($extractor, $this->extractors) === false) {
            $this->extractors[] = $extractor;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getExtractors()
    {
        return $this->extractors;
    }

    /**
     * {@inheritdoc}
     */
    public function hasExtractors()
    {
        return empty($this->extractors) === false;
    }

    /**
     * {@inheritdoc}
     */
    public function resetExtractors()
    {
        $extractors = $this->extractors;

        $this->extractors = array();

        return $extractors;
    }
}
