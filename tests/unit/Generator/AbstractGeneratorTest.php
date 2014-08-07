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

use Codeception\TestCase\Test;

/**
 * Tests for Generators
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
abstract class AbstractGeneratorTest extends Test
{
    /**
     * Generator object
     *
     * @var GeneratorInterface
     */
    protected $generator;
}
