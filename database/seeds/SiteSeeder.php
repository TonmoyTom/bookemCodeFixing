<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;


class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Setting();
        $data->site_name = 'Site Name';
        $data->site_slogan = 'Site Slogan';
        $data->save();
    }
}
