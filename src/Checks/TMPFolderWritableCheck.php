<?php

namespace A2nt\LiveChecks\Checks;

use SilverStripe\EnvironmentCheck\EnvironmentCheck;

class TMPFolderWritableCheck implements EnvironmentCheck
{
    public static function check_folder($path)
    {
        return is_writable($path) ? [
            EnvironmentCheck::OK,
            $path.' is writable'
        ] : [
            EnvironmentCheck::ERROR,
            $path.' is not writable'
        ];
    }

    public function check()
    {
        return self::check_folder(TEMP_PATH);
    }
}
