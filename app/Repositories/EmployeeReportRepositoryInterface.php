<?php

namespace App\Repositories;

interface EmployeeReportRepositoryInterface
{
    public function generateReportPath($employeeId): string;
}
