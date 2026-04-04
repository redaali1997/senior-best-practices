<?php

namespace App\Factories;

use App\Services\ExcelReport;
use App\Services\PdfReport;
use Exception;

class ReportFactory
{
    const TYPES = [
        'pdf' => PdfReport::class,
        'excel' => ExcelReport::class,
    ];

    public static function make(string $type)
    {
        if (! isset(self::TYPES[$type])) {
            throw new Exception('Report type not found');
        }

        return app()->make(self::TYPES[$type]);
    }
}
