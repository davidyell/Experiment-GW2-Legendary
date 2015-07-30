<?php

/**
 * @package MySlugger.php
 *
 * @author David Yell <neon1024@gmail.com>
 * @when 26/06/15
 *
 */

namespace App\Lib\Slugger;

use Cake\Utility\Inflector;
use Muffin\Slug\SluggerInterface;

class MySlugger implements SluggerInterface {

    /**
     * Return a URL safe version of a string.
     *
     * @param string $string Original string.
     * @param string $separator Separator.
     * @return string
     */
    public static function slug($string, $separator = '-')
    {
        return Inflector::slug(strtolower($string), $separator);
    }
}