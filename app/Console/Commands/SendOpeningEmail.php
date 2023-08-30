<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use  App\Http\Controllers\EmailController;

class SendOpeningEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:openingemails';

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
        $obj = new EmailController();
        $obj->OpeningEmail();
    }
}
