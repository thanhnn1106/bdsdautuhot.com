<?php

use Illuminate\Database\Seeder;
use App\Models\PageInfo;

class PageInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info = [
            'name'         => 'BDSDAUTUHOT.COM',
            'logo'         => 'front/images/logo.png',
            'phone'        => '0931342525',
            'email'        => 'buimai79@gmail.com',
            'address'      => 'buimai79@gmail.com',
            'working_time' => 'buimai79@gmail.com',
            'facebook'     => 'https://www.facebook.com/lorrybui',
            'instagram'    => 'https://www.instagram.com/lorrybui',
            'zalo'         => '0931342525',
            'map'          => 'Chưa có',
            'created_at'   => date(DATETIME_FORMAT)
        ];

        DB::table('page_info')->insert($info);
    }
}
