<?php

class UsingMapTest extends PHPUnit_Framework_TestCase
{
    private function map($items, $callback)
    {
        $result = [];
        foreach ($items as $item) {
            $result[] = $callback($item);
        }

        return $result;
    }

    public function test_get_employee_names()
    {
        $employees = [
            ['name' => 'John', 'department' => 'Sales'],
            ['name' => 'Jane', 'department' => 'Marketing'],
            ['name' => 'Dave', 'department' => 'Marketing'],
            ['name' => 'Dana', 'department' => 'Engineering'],
            ['name' => 'Beth', 'department' => 'Marketing'],
            ['name' => 'Kyle', 'department' => 'Engineering'],
        ];

        /*
         * Add your solution here! Remember, no loops allowed!
         *
         * $employeeNames = $this->map($employees, ...)
         */
        $employeeNames = $this->map($employees, function ($employee) {
            return $employee['name'];
        });
        $this->assertEquals([
            'John',
            'Jane',
            'Dave',
            'Dana',
            'Beth',
            'Kyle',
        ], $employeeNames);
    }
}
