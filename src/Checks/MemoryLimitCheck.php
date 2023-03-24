<?php

namespace A2nt\LiveChecks\Checks;

use SilverStripe\EnvironmentCheck\EnvironmentCheck;

class MemoryLimitCheck implements EnvironmentCheck
{
    public function check()
    {
        return [
            EnvironmentCheck::OK,
            ini_get('memory_limit')
        ];
    }
}
