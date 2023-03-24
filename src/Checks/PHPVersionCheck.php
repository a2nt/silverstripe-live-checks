<?php

namespace A2nt\LiveChecks\Checks;

use SilverStripe\EnvironmentCheck\EnvironmentCheck;

class PHPVersionCheck implements EnvironmentCheck
{
    public function check()
    {
        return [
            EnvironmentCheck::OK,
            phpversion()
        ];
    }
}
