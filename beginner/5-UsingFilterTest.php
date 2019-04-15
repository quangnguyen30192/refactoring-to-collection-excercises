<?php

class UsingFilterTest extends PHPUnit_Framework_TestCase
{
    private function filter($items, $callback)
    {
        $result = [];
        foreach ($items as $item) {
            if ($callback($item)) {
                $result[] = $item;
            }
        }

        return $result;
    }

    public function test_get_part_time_employees()
    {
        $employees = [
            ['name' => 'John', 'department' => 'Sales', 'employment' => 'Part Time'],
            ['name' => 'Jane', 'department' => 'Marketing', 'employment' => 'Part Time'],
            ['name' => 'Dave', 'department' => 'Marketing', 'employment' => 'Salary'],
            ['name' => 'Dana', 'department' => 'Engineering', 'employment' => 'Full Time'],
            ['name' => 'Beth', 'department' => 'Marketing', 'employment' => 'Part Time'],
            ['name' => 'Kyle', 'department' => 'Engineering', 'employment' => 'Full Time'],
        ];

        /*
         * Add your solution here! Remember, no loops allowed!
         *
         * $partTimers = $this->filter($employees, ...)
         */
        $partTimers = $this->filter($employees, function ($employee) {
            return $employee['employment'] === 'Part Time';
        });

        $this->assertEquals([
            ['name' => 'John', 'department' => 'Sales', 'employment' => 'Part Time'],
            ['name' => 'Jane', 'department' => 'Marketing', 'employment' => 'Part Time'],
            ['name' => 'Beth', 'department' => 'Marketing', 'employment' => 'Part Time'],
        ], $partTimers);
    }
}
