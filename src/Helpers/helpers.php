<?php

namespace Sinnbeck\DomAssertions\Helpers;

use PHPUnit\Framework\Assert;
use Sinnbeck\DomAssertions\Support\DomParser;
use Throwable;

if (! function_exists('Sinnbeck\DomAssertions\Helpers\createParser')) {
    function createParser(string $content): DomParser
    {
        if (! app()->has('dom-assertions.parser')) {
            try {
                app()->instance('dom-assertions.parser', DomParser::new($content));
            } catch (Throwable $exception) {
                Assert::fail($exception->getMessage());
            }
        }

        return app()->make('dom-assertions.parser');
    }
}
