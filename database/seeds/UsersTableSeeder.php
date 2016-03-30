<?php
/**
 * Users Table Seeder
 *
 * @author  Michael <resourcemode@yahoo.com>
 */

use Illuminate\Database\Seeder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_users')->truncate();

        $role = [
            'name' => 'Administrator',
            'slug' => 'administrator',
            'permissions' => [
                'admin' => true,
            ]
        ];

        $adminRole = Sentinel::getRoleRepository()->createModel()->fill($role)->save();

        $subscribersRole = [
            'name' => 'Subscribers',
            'slug' => 'subscribers',
        ];

        Sentinel::getRoleRepository()->createModel()->fill($subscribersRole)->save();

        $admin = [
            'email'    => 'admin@accedo.com',
            'password' => 'password',
        ];

        $users = [
            [
                'email'    => 'test1@accedo.com',
                'password' => 'password',
            ],
            [
                'email'    => 'test2@accedo.com',
                'password' => 'password',
            ],
            [
                'email'    => 'test3@accedo.com',
                'password' => 'password',
            ],
        ];

        $adminUser = Sentinel::registerAndActivate($admin);
        $adminUser->roles()->attach($adminRole);

        foreach ($users as $user) {
            Sentinel::registerAndActivate($user);
        }

    }
}
