<?php

namespace Database\Seeders;

use App\Models\CloudStorage;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CloudStorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CloudStorage::insert([
            'name'=>'Google Drive',
            'image'=>'https://ssl.gstatic.com/images/branding/product/2x/hh_drive_96dp.png',
            'created_at'=>Carbon::now('Asia/Pontianak'),
        ]);
        CloudStorage::insert([
            'name'=>'Zippyshare',
            'image'=>'https://www.saashub.com/images/app/service_logos/89/b5a765a37dfc/large.png?1570855216',
            'created_at'=>Carbon::now('Asia/Pontianak'),
        ]);
        CloudStorage::insert([
            'name'=>'Mega',
            'image'=>'https://seeklogo.com/images/M/mega-icon-logo-75FF6A408B-seeklogo.com.png',
            'created_at'=>Carbon::now('Asia/Pontianak'),
        ]);
    }
}
