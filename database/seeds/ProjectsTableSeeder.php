<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Project::class, 7)->states('unpublished')->create();
        factory(\App\Models\Project::class, 9)->states('published')->create();
    }
}
