<?php

namespace A2nt\LiveChecks\Checks;

use SilverStripe\EnvironmentCheck\EnvironmentCheck;

class AssetsWritableCheck implements EnvironmentCheck
{
    public function check()
    {
        return TMPFolderWritableCheck::check_folder(PUBLIC_PATH.'/'.ASSETS_DIR);
    }
}
