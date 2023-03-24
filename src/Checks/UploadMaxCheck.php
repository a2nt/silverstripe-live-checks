<?php

namespace A2nt\LiveChecks\Checks;

use SilverStripe\EnvironmentCheck\EnvironmentCheck;

class UploadMaxCheck implements EnvironmentCheck
{
    public function check()
    {
        $maxUpload = ini_get('upload_max_filesize');
        $maxPost = ini_get('post_max_size');

        $size = FreeSpaceCheck::formatBytes(min(
            FreeSpaceCheck::memstring2bytes($maxUpload),
            FreeSpaceCheck::memstring2bytes($maxPost)
        ));

        return [
            EnvironmentCheck::OK,
            $size
        ];
    }
}
