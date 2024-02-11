<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ServeCustom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chal:ja';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the development server with custom configuration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Custom server started at http://localhost:8000');
        exec('php -S localhost:8000 -t public');
    }

}
