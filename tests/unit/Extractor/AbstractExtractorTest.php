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

use Codeception\TestCase\Test;

/**
 * Tests for Extractors
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
abstract class AbstractExtractorTest extends Test
{
    /**
     * Extractor object
     *
     * @var ExtractorInterface
     */
    protected $extractor;
}
