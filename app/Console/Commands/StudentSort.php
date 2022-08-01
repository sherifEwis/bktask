<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;

class StudentSort extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'studentsort';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(){
	Student::studentSort();
        return 0;
    }
}
