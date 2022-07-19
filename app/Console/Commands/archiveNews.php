<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class archiveNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:archivenews';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create archive news';

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
        DB::table('news')->where('status',2)->update(['status' => 1]);
        
        echo "Status change successfully! \n";
    }
}
