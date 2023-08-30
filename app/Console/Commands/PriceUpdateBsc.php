<?php

namespace App\Console\Commands;

use App\Http\Controllers\StatusController;
use Illuminate\Console\Command;

class PriceUpdateBsc extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:priceupdatebsc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command is used for sending bsc price update';

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
     * @return mixed
     */
    public function handle()
    {
        $obj = new StatusController();
        $obj->PriceUpdateBsc();
    }
}
