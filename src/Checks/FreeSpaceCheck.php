<?php

namespace A2nt\LiveChecks\Checks;

use SilverStripe\EnvironmentCheck\EnvironmentCheck;

class FreeSpaceCheck implements EnvironmentCheck
{
    public function check()
    {
        $size = self::formatBytes(disk_free_space(TEMP_FOLDER));

        return [
            EnvironmentCheck::OK,
            $size
        ];
    }

    public static function memstring2bytes($memString)
    {
        // Remove  non-unit characters from the size
        $unit = preg_replace('/[^bkmgtpezy]/i', '', $memString);
        // Remove non-numeric characters from the size
        $size = preg_replace('/[^0-9\.]/', '', $memString);

        if ($unit) {
            // Find the position of the unit in the ordered string which is the power
            // of magnitude to multiply a kilobyte by
            return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
        }

        return round($size);
    }

    public static function formatBytes($size, $precision = 2)
    {
        $base = log($size, 1024);
        $suffixes = array('', 'K', 'M', 'G', 'T');

        return round(pow(1024, $base - floor($base)), $precision) . $suffixes[(string)floor($base)];
    }
}
