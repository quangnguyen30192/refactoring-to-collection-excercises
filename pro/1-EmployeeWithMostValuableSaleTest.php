<?php

class EmployeeWithMostValuableSaleTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $employees = collect([
            [
                'name' => 'John',
                'email' => 'john3@example.com',
                'sales' => [
                    ['customer' => 'The Blue Rabbit Company', 'order_total' => 7444],
                    ['customer' => 'Black Melon', 'order_total' => 1445],
                    ['customer' => 'Foggy Toaster', 'order_total' => 700],
                ],
            ],
            [
                'name' => 'Jane',
                'email' => 'jane8@example.com',
                'sales' => [
                    ['customer' => 'The Grey Apple Company', 'order_total' => 203],
                    ['customer' => 'Yellow Cake', 'order_total' => 8730],
                    ['customer' => 'The Piping Bull Company', 'order_total' => 3337],
                    ['customer' => 'The Cloudy Dog Company', 'order_total' => 5310],
                ],
            ],
            [
                'name' => 'Dave',
                'email' => 'dave1@example.com',
                'sales' => [
                    ['customer' => 'The Acute Toaster Company', 'order_total' => 1091],
                    ['customer' => 'Green Mobile', 'order_total' => 2370],
                ],
            ],
        ]);

        /*
         * Using collection pipeline programming, find the employee who made
         * the most valuable sale.
         *
         * Do not use any loops, if statements, or ternary operators.
         *
         * Good luck!
         *
         * $employeeWithMostValuableSale = $employees->...
         */

        $employeeWithMostValuableSale = $employees->reduce(function ($mostValuableSaleEmployee, $nextEmployee) {
           $nextEmployeeSale = collect($nextEmployee['sales'])->sum('order_total');
            if ($nextEmployeeSale > collect($mostValuableSaleEmployee['sales'])->sum('order_total')) {
                return $nextEmployee;
            }

            return $mostValuableSaleEmployee;
        }, $employees->first());

        $employeeWithMostValuableSale2 = $employees->map(function ($employee) {
            return array_merge($employee, [
                'sum' => collect($employee['sales'])->sum('order_total')
            ]);
        })->sortByDesc('sum')->first();

        $employeeWithMostValuableSale3 = $employees->sortByDesc(function ($employee) {
            return collect($employee['sales'])->sum('order_total');
        })->first();

        $this->assertEquals($employeeWithMostValuableSale3['name'], 'Jane');
    }
}
