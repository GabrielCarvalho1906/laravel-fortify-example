<?php

namespace App\Console;

use App\Console\Commands\CertificatesDecrypt;
use App\Console\Commands\SpiderConfigLoad;
use App\Console\Commands\SpiderConfigView;
use App\Console\Commands\CustomerCommand;
use App\Console\Commands\CreateInactiveOutputs;
use App\Console\Commands\ProcessInputFile;
use App\Console\Commands\ProcessIndicators;
use App\Console\Commands\ProcessIndicatorsBatch;
use App\Console\Commands\ProcessInputFiles;
use App\Console\Commands\ProcessMessages;
use App\Console\Commands\TinkerCommand;
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
        CertificatesDecrypt::class,
        SpiderConfigLoad::class,
        SpiderConfigView::class,
        CustomerCommand::class,
        CreateInactiveOutputs::class,
        ProcessInputFile::class,
        ProcessIndicators::class,
        ProcessIndicatorsBatch::class,
        ProcessInputFiles::class,
        ProcessMessages::class,
        TinkerCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
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
