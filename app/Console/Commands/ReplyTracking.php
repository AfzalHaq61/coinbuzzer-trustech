<?php

namespace App\Console\Commands;

use App\Inbox;
use Illuminate\Console\Command;
use  App\Http\Controllers\InboxController;


class ReplyTracking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'track:replytracking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used for reply tracking';

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
        $obj = new InboxController();
        $obj->gmail_inbox();
    }
}
