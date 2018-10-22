<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment() === 'production') {
            exit("STOP! It's in production!");
        }

        $tables = [
            'topics',
            'projects',
            'posts',
            'post_topic',
            'users',
            'auth_groups',
            'auth_group_permissions',
            'permissions',
            'auth_group_users',
            'auth_group_user_permissions',
        ];

        $this->command->info("Unguarding models...");

        Model::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Model::reguard();

        $this->call(UsersTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
    }
}
