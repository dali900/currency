<?php

namespace App\Console\Commands;

use App\Models\Currency;
use App\Services\CurrencyService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CurrencyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Currency:getdata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetching currency data';

    protected $currencyService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->currencyService = new CurrencyService();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /**
         * Get and store the currency daily values
         */
        $this->currencyService->fetchCurrencies();
    }
}
