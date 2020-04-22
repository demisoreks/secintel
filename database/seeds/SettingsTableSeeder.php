<?php

use Illuminate\Database\Seeder;

use App\SecSetting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SecSetting::insert([
            'id' => 1
        ]);
    }
}
