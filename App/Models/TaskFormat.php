<?php

namespace App\Models;

class TaskFormat
{
    public static function taskListFormat(array &$taskList)
    {
        foreach ($taskList as &$task) {
            self::dateFormat($task['Data']);
        }
    }
    public static function dateFormat(&$date)
    {
        $dateTime = new \DateTime($date);
        self::dateEmpty($date);
        if (!empty($date)) {
            $date = $dateTime->format('d/m/Y');
        }
    }
    private static function dateEmpty(&$date)
    {
        if ($date == '0000-00-00') {
            $date = '';
        }
    }
}
