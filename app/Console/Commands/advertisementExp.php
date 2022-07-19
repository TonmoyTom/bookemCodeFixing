<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class advertisementExp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:advertisementexp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Advertiement expire date';

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
        $exp_date = date("Y-m-d");
        
        DB::table('advertisements')->where('status',1)->where('exp_date',$exp_date)->update(['status' => 2]);
        
        echo "Status change successfully! \n";
    }
}
