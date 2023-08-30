<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use  App\Http\Controllers\EmailController;


class SendFollowUpEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:followupemails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used for sending followup emails';

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
        $obj->FollowupEmail();
    }
}
