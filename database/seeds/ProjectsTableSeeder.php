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
                'slug'             => 'vin-city',
                'is_menu'          => true,
                'cover_photo'      => '',
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
                'slug'             => 'condotel-the-arena-cam-ranh',
                'is_menu'          => true,
                'cover_photo'      => '',
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
                'slug'             => 'vinpearl-condotel-hon-tre',
                'is_menu'          => true,
                'cover_photo'      => '',
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
                'slug'             => 'the-villas-vinhomes-central-park',
                'is_menu'          => true,
                'cover_photo'      => '',
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
