<?php

use Illuminate\Database\Seeder;
use App\Settings;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Settings::create([
            'site_name' => 'Laravel',
            'contact_number' => '81 090 6229 2009',
            'contact_email' => 'info@gmail.com',
            'address' => 'Bangaloe, India'
        ]);
    }
}
