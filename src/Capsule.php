<?php

namespace Capsule;

use Capsule\Scenario\Recorder;
use Capsule\File\Translator;
use Capsule\File\Xml\Generator;
use Capsule\File\Xml\Parser;
use Capsule\Scenario\Storage\FileStorage;

/**
 * Class Capsule
 * @package Capsule
 */
class Capsule
{
    /**
     * @param string $path
     * @return Recorder
     */
    public static function createRecorder($path = '')
    {
        $storage = new FileStorage();
        $storage->setPath($path);
        $storage->setExtension('xml');

        $translator = new Translator();
        $translator->setGenerator(new Generator());
        $translator->setParser(new Parser());

        $recorder = new Recorder();
        $recorder->setStorage($storage);
        $recorder->setTranslator($translator);

        return $recorder;
    }
}
