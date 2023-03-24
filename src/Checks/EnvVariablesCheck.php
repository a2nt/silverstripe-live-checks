<?php

namespace A2nt\LiveChecks\Checks;

use SilverStripe\EnvironmentCheck\EnvironmentCheck;

class EnvVariablesCheck implements EnvironmentCheck
{
    public function check()
    {
        $data = [
            'BASE_URL: '.(BASE_URL ? BASE_URL : '/'),
            'PUBLIC_DIR: '.PUBLIC_DIR,
            'BASE_PATH: '.BASE_PATH,
        ];

        return [
            EnvironmentCheck::OK,
            implode(' | ', $data)
        ];
    }
}
