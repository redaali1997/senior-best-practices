<?php

namespace App\Services;

use App\Contracts\ReportInterface;

class ExcelReport implements ReportInterface
{
    public function generate()
    {
        return 'Excel report';
    }
}
