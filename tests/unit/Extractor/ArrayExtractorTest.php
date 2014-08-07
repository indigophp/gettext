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
 * Tests for Array Extractor
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Gettext\Extractor\ArrayExtractor
 * @group              Gettext
 * @group              Extractor
 */
class ArrayExtractorTest extends AbstractExtractorTest
{
    public function _before()
    {
        $array = array(
            'example',
            array('otherexample', 'otherexamples'),
        );

        $this->extractor = new ArrayExtractor($array);
    }

    /**
     * @covers ::__construct
     */
    public function testConstruct()
    {
        $array = $this->extractor->getArray();

        $extractor = new ArrayExtractor($array);

        $this->assertEquals($array, $extractor->getArray());
    }

    /**
     * @covers ::getArray
     * @covers ::setArray
     */
    public function testArray()
    {
        $array = array();

        $this->assertSame($this->extractor, $this->extractor->setArray($array));
        $this->assertEquals($array, $this->extractor->getArray());
    }

    /**
     * @covers ::extract
     */
    public function testExtract()
    {
        $this->assertEquals($this->extractor->getArray(), $this->extractor->extract());
    }
}
