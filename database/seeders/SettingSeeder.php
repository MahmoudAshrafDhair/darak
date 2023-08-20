<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::query()->create([
            'about_us' => ['ar' => null, 'en' => null],
            'terms_and_conditions' => ['ar' => null, 'en' => null],
            'privacy_police' => ['ar' => null, 'en' => null],
        ]);
    }
}
