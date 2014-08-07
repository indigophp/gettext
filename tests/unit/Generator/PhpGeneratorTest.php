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

/**
 * Tests for Php Generator
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Gettext\Generator\PhpGenerator
 * @group              Gettext
 * @group              Generator
 */
class PhpGeneratorTest extends AbstractGeneratorTest
{
    public function _before()
    {
        $this->generator = new PhpGenerator;

        $this->generator->addExtractor($this->getExtractorMock());
    }

    /**
     * Returns a new ExtractorInterface
     *
     * @return ExtractorInterface
     */
    public function getExtractorMock()
    {
        $extractor = \Mockery::mock('Indigo\\Gettext\\Extractor\\ExtractorInterface');

        $extractor->shouldReceive('extract')
            ->andReturn(array(
                'example',
                array('otherexample', 'otherexamples'),
            ));

        return $extractor;
    }

    /**
     * @covers ::generate
     * @covers ::getPHP
     */
    public function testGenerate()
    {
        $php = <<<PHP
<?php

gettext('example');
ngettext('otherexample', 'otherexamples', 1);
ngettext('otherexample', 'otherexamples', 2);

PHP;

        $this->assertTrue($this->generator->generate());
        $this->assertEquals($php, $this->generator->getPHP());
    }
}


/**
 * Tests for Php File Generator
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 *
 * @coversDefaultClass Indigo\Gettext\Generator\PhpFileGenerator
 * @group              Gettext
 * @group              Generator
 */
class PhpFileGeneratorTest extends PhpGeneratorTest
{
    /**
     * Temporary filename
     *
     * @var string
     */
    protected $filename;

    public function _before()
    {
        $this->file = tempnam(sys_get_temp_dir(), uniqid());

        $this->generator = new PhpFileGenerator($this->file);

        $this->generator->addExtractor($this->getExtractorMock());
    }

    /**
     * @covers ::__construct
     */
    public function testConstruct()
    {
        $generator = new PhpFileGenerator('test');

        $this->assertEquals('test', $generator->getFile());
    }

    /**
     * @covers ::getFile
     * @covers ::setFile
     */
    public function testFile()
    {
        $this->assertSame($this->generator, $this->generator->setFile(''));
        $this->assertEquals('', $this->generator->getFile());
    }

    /**
     * @covers ::generate
     */
    public function testGenerate()
    {
        parent::testGenerate();

        $this->assertFileExists($this->file);
        $this->assertEquals($this->generator->getPHP(), file_get_contents($this->file));
    }
}
