<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class bnewsEpx extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:bnewsepx';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Breaking news exp date';

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
        $exp_date = date("Y-m-d H:i:s");
        
        DB::table('breaking_news')->where('bnexp_date',$exp_date)->update(['status' => 2]);
        
        echo "Status change successfully! \n";
    }
}
