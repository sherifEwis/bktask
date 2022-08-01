<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Student;

class studentSortTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_sortCommand()
    {
        $this->artisan('studentsort')->assertSuccessful();
	$columnOrdered = Student::orderBy('order', 'asc')->get();
	$Ordered = Student::orderBy('school_id', 'asc')->orderBy('id', 'asc')->get();
	$this->assertEquals($columnOrdered, $Ordered);
    }
}
