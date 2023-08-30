<?php

namespace App\Console\Commands;

use App\Http\Controllers\StatusController;
use Illuminate\Console\Command;
use  App\Http\Controllers\EmailController;

class StatusUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:statusupdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command is used for sending opening emails';

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
        $obj->StatusUpdate();
    }
}
