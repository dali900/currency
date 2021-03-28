<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CronDailyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CronDaily:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cron job daily command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->call('Currency:getdata');
    }
}
