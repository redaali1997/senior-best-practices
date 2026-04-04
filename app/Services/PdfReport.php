<?php

namespace App\Services;

use App\Contracts\ReportInterface;

class PdfReport implements ReportInterface
{
    public function generate()
    {
        return 'Pdf report';
    }
}