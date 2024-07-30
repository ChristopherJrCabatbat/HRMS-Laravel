<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Employee;

class ResetEmployeeStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset-employee-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Update the status of all employees with 'Paid' status to 'Unpaid'
        Employee::where('status', 'Paid')->update(['status' => 'Unpaid']);

        $this->info('Employee statuses have been reset to Unpaid.');

        return 0;
    }
}
