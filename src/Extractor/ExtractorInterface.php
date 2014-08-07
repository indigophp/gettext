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
 * Extractor Interface
 *
 * @author Márk Sági-Kazár <mark.sagikazar@gmail.com>
 */
interface ExtractorInterface
{
    /**
     * Extracts strings
     *
     * @return array
     */
    public function extract();
}
