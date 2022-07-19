<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class cancelPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:cancelpayment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel payment';

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
        DB::table('classifieds')->where('cancel_status',1)->update(['cancel_status' => 0]);
        DB::table('sponsered_ads')->where('cancel_status',1)->update(['cancel_status' => 0]);
        
        echo "Status change successfully! \n";
    }
}
