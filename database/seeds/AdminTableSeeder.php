<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = config('site.user_status.value.active');
        $users = [
            array(
                'user_name'  => 'admin',
                'password'   => bcrypt('123456'),
                'status'     => $status,
                'created_at' => date(DATETIME_FORMAT),
            ),
            array(
                'user_name'  => 'manage',
                'password'   => bcrypt('123456'),
                'status'     => $status,
                'created_at' => date(DATETIME_FORMAT),
            ),
        ];

        foreach ($users as $user) {
            $chkUser = Admin::where('user_name', $user['user_name'])->first();
            if ($chkUser === NULL) {
                DB::table('admin')->insert($user);
            }
        }
    }
}
