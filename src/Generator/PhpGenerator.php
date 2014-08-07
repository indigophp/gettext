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
 * Php Generator
 *
 * Generates PHP from strings
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
class PhpGenerator extends AbstractGenerator
{
    /**
     * Variable holding result
     *
     * @var string
     */
    protected $php;

    /**
     * {@inheritdoc}
     */
    public function generate()
    {
        $this->php = "<?php\n";

        foreach ($this->extractors as $extractor) {
            foreach ($extractor->extract() as $string) {
                $this->php .= $this->gettext($string);
            }
        }

        $this->php .= "\n";

        return true;
    }

    /**
     * Returns generated content
     *
     * @return string
     */
    public function getPHP()
    {
        return $this->php;
    }

    /**
     * Parses string to PHP
     *
     * @param string $string
     *
     * @return string
     */
    private function gettext($string)
    {
        if (is_array($string)) {
            list($singular, $plural) = $string;
            return <<<PHP

ngettext('$singular', '$plural', 1);
ngettext('$singular', '$plural', 2);
PHP;
        } else {
            return <<<PHP

gettext('$string');
PHP;
        }
    }
}
