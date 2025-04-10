<?php

namespace App\Repositories;

use App\Models\CivilEmployeeModel; // or MechanicalEmployeeModel if needed
use PDF; // You must have barryvdh/laravel-dompdf installed


class EmployeeReportRepository implements EmployeeReportRepositoryInterface
{
    public function generateReportPath($employeeId): string
    {
        $employee = CivilEmployeeModel::findOrFail($employeeId);

        $pdf = PDF::loadView('emails.report-pdf', ['employee' => $employee]);

        $filePath = 'reports/employee_' . $employee->id . '.pdf';
        \Storage::put($filePath, $pdf->output());

        return storage_path('app/' . $filePath);
    }
}
