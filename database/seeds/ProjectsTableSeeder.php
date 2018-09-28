<?php

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            array(
                'name'             => 'VinCity',
                'short_name'       => 'VinCity',
                'short_des'        => 'VinCity',
                'slug'             => 'vin-city',
                'is_menu'          => true,
                'cover_photo'      => 'https://media.licdn.com/dms/image/C4D12AQF3psbdS-4gNQ/article-inline_image-shrink_1500_2232/0?e=1539820800&v=beta&t=UmYIPaXJwlecvHgnZI7gNRHFVvp-rvKX9fO9lNADK3I',
                'logo'             => '',
                'investor'         => '',
                'facebook'         => '',
                'instagram'        => '',
                'status'           => 1,
                'is_show_homepage' => true,
                'created_at'       => date(DATETIME_FORMAT),
            ),
            array(
                'name'             => 'Condotel The Arena Cam Ranh',
                'short_name'       => 'Condotel The Arena Cam Ranh',
                'short_des'        => 'Condotel The Arena Cam Ranh',
                'slug'             => 'condotel-the-arena-cam-ranh',
                'is_menu'          => true,
                'cover_photo'      => 'http://thearenacamranh.vn/wp-content/uploads/2017/09/san-khau-ngoi-troi-the-arena-cam-ranh.jpg',
                'logo'             => '',
                'investor'         => '',
                'facebook'         => '',
                'instagram'        => '',
                'status'           => 1,
                'is_show_homepage' => true,
                'created_at'       => date(DATETIME_FORMAT),
            ),
            array(
                'name'             => 'Vinpearl Condotel Hòn Tre',
                'short_name'       => 'Vinpearl Condotel Hòn Tre',
                'short_des'        => 'Vinpearl Condotel Hòn Tre',
                'slug'             => 'vinpearl-condotel-hon-tre',
                'is_menu'          => true,
                'cover_photo'      => 'http://vinpearlempirecondotel.net/wp-content/uploads/2015/12/condotel-sebel-phu-quoc.jpg',
                'logo'             => '',
                'investor'         => '',
                'facebook'         => '',
                'instagram'        => '',
                'status'           => 1,
                'is_show_homepage' => true,
                'created_at'       => date(DATETIME_FORMAT),
            ),
            array(
                'name'             => 'The Villas - Vinhomes Central Park',
                'short_name'       => 'The Villas - Vinhomes Central Park',
                'short_des'        => 'The Villas - Vinhomes Central Park',
                'slug'             => 'the-villas-vinhomes-central-park',
                'is_menu'          => true,
                'cover_photo'      => 'http://vinhomesvillage.com.vn/wp-content/uploads/2017/01/vinhomes-villas-for-sale.jpeg',
                'logo'             => '',
                'investor'         => '',
                'facebook'         => '',
                'instagram'        => '',
                'status'           => 1,
                'is_show_homepage' => true,
                'created_at'       => date(DATETIME_FORMAT),
            ),
        ];

        foreach ($projects as $project) {
            $chkProject = Project::where('slug', $project['slug'])->first();
            if ($chkProject === NULL) {
                DB::table('projects')->insert($project);
            }
        }
    }
}
