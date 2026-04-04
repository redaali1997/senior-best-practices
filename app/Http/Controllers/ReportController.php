<?php

namespace App\Http\Controllers;

use App\Factories\ReportFactory;
use CompanySettings;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct(private CompanySettings $companySettings)
    {
        //
    }

    public function export(Request $request)
    {
        $format = $request->input('format'); // 'pdf', 'excel', or 'csv'
        $report = ReportFactory::make($format);

        return $report->generate();
    }
}
