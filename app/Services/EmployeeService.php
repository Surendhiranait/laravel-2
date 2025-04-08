<?php

namespace App\Services;

use App\Interfaces\EmployeeInterface;

class EmployeeService
{
    protected $employee;

    public function __construct(EmployeeInterface $employee)
    {
        $this->employee = $employee;
    }

    public function getEmployeeDetails($name)
    {
        return $this->employee->loadDetails($name);
    }
}