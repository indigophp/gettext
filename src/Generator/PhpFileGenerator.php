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
 * Php File Generator
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class PhpFileGenerator extends PhpGenerator
{
    /**
     * File to generate into
     *
     * @var string
     */
    protected $file;

    /**
     * Creates a new Php File Generator
     *
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Returns the filename
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Sets the filename
     *
     * @param string $file
     *
     * @return this
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function generate()
    {
        if ($generate = parent::generate()) {
            $generate = $generate and file_put_contents($this->file, $this->php);
        }

        return $generate;
    }
}
