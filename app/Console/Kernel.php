<?php

namespace App\Console;


use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [

        Commands\StatusUpdate::class,
        Commands\PriceUpdateBsc::class,
        Commands\PresaleUpdate::class,
        Commands\CoinUpdatePrice::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('send:statusupdate')->cron('*/15 * * * *');
        $schedule->command('send:priceupdatebsc')->cron('*/15 * * * *');
        $schedule->command('send:presaleupdate')->cron('*/15 * * * *');
        $schedule->command('send:coinupdateprice')->cron('*/15 * * * *');

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
